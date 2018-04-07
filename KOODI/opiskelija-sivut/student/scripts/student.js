var courseCart = {};


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
    //Perusopinnot-ID
    var id = 'b76cc5db-1798-481b-914d-eb0c13066935';
    //Ydinopinnot-ID
    var id2 = '5006fbed-005d-4f1b-8088-540b1b297742';
    //Valinnaiset-ID - ELSE
    //Generating course block out of json files
    for (var key in data.courses) {
      //console.log(data.courses[key]);
      if (data.courses[key].category_uuid == id ) {

      outPer += '<form method="post" action="" class="jcart">';
      outPer += '<fieldset>'
      outPer += '<input type="hidden" name="my-item-id" value="'+[key]+'" />';
      outPer += '<input type="hidden" name="my-item-name" value="'+ data.courses[key].name +'" />';
      outPer += '<input type="hidden" name="my-item-price" value="'+ data.courses[key].points +'" />';
      outPer += '<input type="hidden" name="my-item-url" value="" />';
      outPer +=  '<ul>';
      outPer += ' <li><strong>"'+data.courses[key].name+'"</strong></li>';
      outPer +=  '<li>'+ data.courses[key].points +'</li>';
      outPer += ' <li>';
      outPer +=  '<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" readonly/></label>';
      outPer +=  '</li>';
      outPer +=  '</ul>';
      outPer +=   '<input type="submit" name="my-add-button" value="add to cart" class="button" />'
      /*outPer += '<div class="perusopinnot" id="dance">';
      outPer += '<p>' + 'perusopinnot' + '</p>';
      outPer += '<p>' + data.courses[key].name + '</p>';
      outPer += '<p>' + data.courses[key].points+ '</p>';
      outPer += '<button class="add-to-cart" data-id="'+ [key]+'">'+ "Add To Cart" + '</button>';
      outPer += '</div>';*/
      outPer += '</fieldset>'
      outPer += '</form>';



    /*  outPer += '<div class="perusopinnot" id="dance">';
      outPer += '<p>' + 'perusopinnot' + '</p>';
      outPer += '<p>' + data.courses[key].name + '</p>';
      outPer += '<p>' + data.courses[key].points+ '</p>';
      outPer += '<button class="add-to-cart" data-id="'+ [key]+'">'+ "Add To Cart" + '</button>';
      outPer += '</div>';*/


      }
      else if (data.courses[key].category_uuid == id2 ) {
        outPak += '<div class="pakolliset">';
        outPak += '<p>' + 'pakolliset' + '</p>';
        outPak += '<p>' + data.courses[key].name + '</p>';
        outPak += '<p>' + data.courses[key].points+ '</p>';
        outPak += '<button class="add-to-cart" data-id="'+ [key]+'">'+ "Add To Cart" + '</button>';
        outPak += '</div>';
      }
      else {
        outVal += '<div class="valinnaiset">';
        outVal += '<p>' + 'valinnaiset' + '</p>';
        outVal += '<p>' + data.courses[key].name + '</p>';
        outVal += '<p>' + data.courses[key].points + '</p>';
        outVal += '<button class="add-to-cart" data-id="'+[key]+'">'+ "Add To Cart" + '</button>';
        outVal += '</div>';
      }


    };

    $('.mandatory').html(outPer);
    $('.optional').html(outPak);
    $('.modules').html(outVal);
    $('.add-to-cart').on('click', addToCart);


}

//var courseCart = {};

//Adding course to Cart
function addToCart(data){
    var ultraKey = $(this).attr('data-id');
    $.getJSON( "kurssit.json", function( data ) {
          console.log(data.courses[ultraKey]);
          if (courseCart[ultraKey] == undefined) {
            courseCart[ultraKey] = 1;
          }
          else {
            alert("this course already added");
          }
          console.log(courseCart);
          showCourseCart();
    });


}
// Display added courses
function showCourseCart() {
  var output="";
  for (var key in courseCart ) {
      output += key + ' --- ' + courseCart[key] + '<br>';
  }
  $('.courseCart').html(output);
}

$(document).ready(function() {
    init();
});

































/*$.getJSON( "kurssit.json", function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
    items.push( "<li id='" + key + "'>" + val + "</li>" );
  });

  $.each(data.courses, function(index, course){
      $(".allCourses").append(


        "<li>"
        +course.uuid+"<br> "+course.name + "<br>" + course.points + "<br>" + course.category_uuid +
         "</li>" + "<br>"


      );
    });

    $( "<ul/>", {
      "class": "my-new-list",
      html: items.join( "" )
    }).appendTo( "body" );

});




*/



/*
$(document).ready(function(){
  $.ajax ({
    url: "courses.json",
    cache:false
  }).done(function(data){
    console.log("done");
    showCourselist(data);
  }).fail(function() {
    console.log("error");
  }).always(function(){
    console.log("complete");
  });
});

function showCourselist(data){
  var obj = jQuery.parseJSON(kurssit.json);
  alert(obj.name);
}

$.each( data, function( key, val ) {
  items.push( "<li id='" + key + "'>" + val + "</li>" );
});

$.each(data.courses, function(index, course){
    $(".allCourses").append("<li>"+course.name+" "+course.optionality + "</li>");
  });


*/

/*  $.each(data.courses, function(index, course){
    $(".allCourses").append("<li>"+course.name+" "+course.optionality + "</li>");
  }); */





/*$(document).ready(function(){
      $("#clickbtn").on("click",function(){
        $.getJSON("test.json", function(json){
          alert("Hello! I am an alert box!!");
          var html = "";

          json.forEach(function(val){
          var keys = Object.keys(val);
          html += "<div class ='course'>";
          keys.forEach(function(key){
          html += "<strong>" + key + "</strong>: " + val[key] + "<br>";
         });
         html += "</div><br>";
         });

         $(".allCourses").html(html);

        });
      });
});


*/
