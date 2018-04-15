//Perusopinnot-ID
var id = 'b76cc5db-1798-481b-914d-eb0c13066935';
//Ydinopinnot-ID
var id2 = '5006fbed-005d-4f1b-8088-540b1b297742';
//Valinnaiset-ID - ELSE, no extra id needed
var id3 =  ' 09df6ec4-c465-4669-93d3-b1dd297bbee5'
var i = 0;
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
        //Making same thing, but for different parts. Want to keep them separated.
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outPer += '<div class="perusopinnot" id="'+ courseID + '">';
        outPer += '<p>' + 'perusopinnot' + '</p>';
        outPer += '<p>' + data.courses[key].name + '</p>';
        outPer += '<p>' + data.courses[key].points+ '</p>';
        outPer += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
        outPer += '</div>';
      }
      else if (data.courses[key].category_uuid == id2 ) {
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outPak += '<div class="ydinopinnot"  id="'+ courseID + '">';
        outPak += '<p>' + 'ydinopinnot' + '</p>';
        outPak += '<p>' + data.courses[key].name + '</p>';
        outPak += '<p>' + data.courses[key].points + '</p>';
        outPak += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
        outPak += '</div>';
      }
      else {
        var dataID = parseInt([key]) + 1;
        courseID += 1;
        outVal += '<div class="valinnaiset"  id="'+ courseID + '">';
           outVal += '<p>' + 'valinnaiset' + '</p>';
           outVal += '<p>' + data.courses[key].name + '</p>';
           outVal += '<p>' + data.courses[key].points + '</p>';
           outVal += '<button class="add-to-cart" data-id="'+ dataID +'">'+ "Add Course" + '</button>';
           outVal += '</div>';
      }
    };
    //Adding data to page
    $('.mandatory').html(outPer);
    $('.optional').html(outPak);
    $('.modules').html(outVal);
    $('.add-to-cart').on('click', addToCart);
};
//variables for course cart
  var courseCart = {};
  var coursesToAdd = ",";
//Global names/points/etc
  var courseName= [];
  var coursePoints = [];
  var courseType = [];
  var courseID = [];
  var courseTotal = 0;
  var pointsTotal = 0;
  var course = {}
  var idKey;
//Adding course to Cart
function addToCart(data){
    //Taking data id attribute value and assigning it to key
    idKey = $(this).attr('data-id');
    //Substract -1 from key so searching from json data works correctly
    key = idKey - 1;
    //Getting Json data again so we can work with it
    $.getJSON( "kurssit.json", function( data ) {

      /*    for (var jsonKey in data.courses) {
            courseCart[jsonKey] = data.courses[jsonKey];
          }
          console.log(data.courses[key]);
        */
          if (courseCart[key] == undefined) {
            coursesToAdd += idKey + ",";
            console.log(coursesToAdd);
            courseCart[key] = 1;

          }
          else {
            alert("this course already added");
            courseTotal -= 1;
          }
          courseTotal += 1;
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
            console.log( courseName[i] + ": Nimi <br>" + courseID[i] + ": ID <br>" + coursePoints[i] + ": Pisteet <br>" + courseTotal + ": Kursseja Yhteensä <br> " + pointsTotal + "Pisteitä yhteensä ");
          }
          showCourseCart();
          removeDIV();


    });


}
// Display added courses
function showCourseCart() {
  var output= {};
  for (var key in courseID ) {
    if(courseName[key] != undefined) {
      output += '<tr><td> ' + courseID[key]  + '</td>'
      + '<td> ' + courseName[key]  + '</td>'
      + '<td> ' + coursePoints[key] +'</td> </tr>';
      //console.log('Added ID = ' + courseName[key]  + ' --- ' + coursePoints[key] +'<br>')
    }
  }
  $('.totalPoints').html("Yhteensä kursseja: " + courseTotal + "<br>Pisteet yhteensä " +pointsTotal);
  $('.table').html(output);
}

function setValue() {
  var json = JSON.stringify(coursesToAdd);
    if (json.length == 2) {
      alert ("no course added at the moment!")
    }
    else {
      document.dataToPhp.pickedCourses.value = json;
      document.forms["dataToPhp"].submit();
    }

}
function removeDIV(){
  var element = document.getElementById(idKey).style.visibility = "hidden";
  var element = document.getElementById(idKey).style.position = "absolute";
  /*element.outerHTML = "";
  delete element;*/
}

$(document).ready(function() {
    init();
});
