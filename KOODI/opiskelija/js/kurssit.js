//Perusopinnot-ID
var id = 'b76cc5db-1798-481b-914d-eb0c13066935';
//Ydinopinnot-ID
var id2 = '5006fbed-005d-4f1b-8088-540b1b297742';
//Valinnaiset-ID - ELSE, no extra id needed
var id3 =  ' 09df6ec4-c465-4669-93d3-b1dd297bbee5'
var i = 0;

lukukausi = ["Syksy 1", "Kevat 1", "Syksy 2", "Kevat 2", "Syksy 3", "Kevat 3", "Syksy 4", "Kevat 4"]

function init() {
    //getting kurssit data
    $.getJSON("kurssit.json", coursesOut);
}

function coursesOut(data) {
    //page output
    //var allCourses = JSON.parse(data);
    //console.log(data);
    var outPer='';
    var outPak='';
    var outVal='';



    //Giving ID to course Div's
    var courseID = 0;
    //Generating course block out of json files

    for (var key in data.courses) {

      //console.log(data.courses[key]);
      if (data.courses[key].category_uuid == id ) {
        //Making same thing, but for different parts. Want to keep them separated
        //Perusopinnot
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outPer += '<div class="perusopinnot" id="'+ courseID + '">';
      //  outPer += '<p>' + 'perusopinnot' + '</p>';
        outPer += '<p>' + data.courses[key].name + '</p>';
        outPer += '<p>' + data.courses[key].points+ '</p>';
        outPer += '<select id="select'+ courseID + '">';
        for (var i = 0; i < lukukausi.length; i++) {
          outPer +=  '<option value="' + lukukausi[i] + '">' + lukukausi[i] + '</option>';
        }
        outPer += '</select>';
        outPer += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
        outPer += '</div>';
      }
      else if (data.courses[key].category_uuid == id2 ) {
      //Ydinopinnot
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outPak += '<div class="ydinopinnot"  id="'+ courseID + '">';
        //outPak += '<p>' + 'ydinopinnot' + '</p>';
        outPak += '<p>' + data.courses[key].name + '</p>';
        outPak += '<p>' + data.courses[key].points + '</p>';
        outPak += '<select id="select'+ courseID + '">';
        for (var i = 0; i < lukukausi.length; i++) {
          outPak +=  '<option value="' + lukukausi[i] + '">' + lukukausi[i] + '</option>';
        }
        outPak += '</select>';
        outPak += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
        outPak += '</div>';
      }
      //Valinnaiset
      else {
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outVal += '<div class="valinnaiset"  id="'+ courseID + '">';
        //   outVal += '<p>' + 'valinnaiset' + '</p>';
        outVal += '<p>' + data.courses[key].name + '</p>';
        outVal += '<p>' + data.courses[key].points + '</p>';
        outVal += '<select id="select'+ courseID +'">';
        for (var i = 0; i < lukukausi.length; i++) {
          outVal +=  '<option value="' + lukukausi[i] + '">' + lukukausi[i] + '</option>';
        }
        outVal += '</select>';
        outVal += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
        outVal += '</div>';
      }
    };
    //Adding data to page
    $('.mandatory').html(outPer);
    $('.optional').html(outPak);
    $('.modules').html(outVal);
    //Adding to cart
    $('.add-to-cart').on('click', addToCart);
};
//variables for course cart
  var coursesToAdd = ",";
//Global names/points/etc
  var courseName= [];
  var coursePoints = [];
  var courseID = [];
  var courseType = [];
  var pointsTotal = 0;
  var courseCart = [];
  courseCart[0] = "something else :D";
  var courseTotal = 0;
  var idKey;
//Adding course to Cart
function addToCart(data){
    courseTotal += 1;
    //Taking data id attribute value and assigning it to key
    idKey = $(this).attr('data-id');
    //Substract -1 from key so searching from json data works correctly
    key = idKey - 1;
    //Getting Json data again so we can work with it
    $.getJSON( "kurssit.json", function( data ) {

                var selectedKausi = $("#select"+idKey+" :selected").text();
                var addingCourse = {
                courseId : idKey,
                courseName : data.courses[key].name,
                coursePoints : data.courses[key].points,
                lukukausi : selectedKausi
                };
                courseCart.push(addingCourse);
                console.log(courseCart);

      /*    for (var jsonKey in data.courses) {
            courseCart[jsonKey] = data.courses[jsonKey];
          }
          console.log(data.courses[key]);
        */
          if (courseCart[key] == undefined) {
            coursesToAdd += idKey + ",";
            courseCart[key] = 1;

          }
          /*else {
            //alert("this course already added");
            courseTotal -= 1;
          }*/
          courseName.push(data.courses[key].name);
          coursePoints.push(data.courses[key].points);
          courseID.push(idKey);


          pointsTotal += data.courses[key].points;
          if (data.courses[key].category_uuid == id) {
            courseType.push("perusopinnot");
          }
          else if (data.courses[key].category_uuid == id2) {
            courseType.push("ydinopinnot");
          }
          else {
              courseType.push("valinnaiset");
          }

          for (var i in courseID) {
            //console.log( courseName[i] + ": Nimi <br>" + courseID[i] + ": ID <br>" + coursePoints[i] + ": Pisteet <br>" + courseTotal + ": Kursseja Yhteensä <br> " + pointsTotal + "Pisteitä yhteensä ");
          }


          showCourseCart();
          removeDIV(idKey);
    });


}
// Display added courses
function showCourseCart() {
  var output= {};
  for (var key in courseCart ) {
    if(courseCart[key].courseId != undefined) {
      output += '<tr><td><button class="removeCourse" data-value="'+courseCart[key].courseId+'">'+courseCart[key].courseId+'</button></td>'
      + '<td> ' + courseCart[key].courseName  + '</td>'
      + '<td> ' + courseCart[key].coursePoints +'</td> <td> '+ courseCart[key].lukukausi + ' </td></tr> ';
      //console.log('Added ID = ' + courseName[key]  + ' --- ' + coursePoints[key] +'<br>')
    }
  }
  $('.totalPoints').html("Yhteensä kursseja: " + courseTotal + "<br>Pisteet yhteensä: " +pointsTotal);
  $('#table').html(output);
  //RemoveCourse
  $('.removeCourse').on('click', removeCourse);
}

function setValue() {
  var ids;
  var lukukaudet
  for(var i in courseCart) {
    if (courseCart[i].courseId != undefined){
    ids += courseCart[i].courseId + ",";
    lukukaudet += courseCart[i].lukukausi + ",";
    }
  }
  var idsRep = ids.replace(/undefined/gi,"");
  var lukukaudetRep =lukukaudet.replace(/undefined/gi,"");

  var idsRep =idsRep.replace(/NaN/gi,"");
  //idsRep = '"'+idsRep + '"';
  //alert (idsRep);
  var lukukaudetRep =lukukaudetRep.replace(/NaN/gi,"");
    //alert (lukukaudetRep);
    if (idsRep.length == 0) {
      alert ("no course added at the moment!")
    }
    else {
      document.dataToPhp.pickedCourses.value = idsRep;
      document.dataToPhp.pickedLukukaudet.value = lukukaudetRep;
      document.forms["dataToPhp"].submit();
    }


}
function removeDIV(val){
  var element = document.getElementById(val).style.visibility = "hidden";
  var element = document.getElementById(val).style.position = "fixed";
  /*element.outerHTML = "";
  delete element;*/
}

function restoreDIV(val){
  var element = document.getElementById(val).style.visibility = "visible";
  var element = document.getElementById(val).style.position = "static";
}

function removeCourse(){
  remKey = $(this).attr('data-value');
  console.log(remKey);
  //courseCart.splice(remKey,1);
    deleteByValue(remKey);
    //alert(courseCart[1].coursePoints);
    restoreDIV(remKey);
    showCourseCart();

    console.log(courseCart);


}
function deleteByValue(val) {
  for(var i in courseCart) {
      if(courseCart[i].courseId == val) {
          pointsTotal -= courseCart[i].coursePoints;
          courseTotal -= 1;
          delete courseCart[i];
      }
  }
}

$(document).ready(function() {
    init();
});
