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
      var valuez = parseInt([key]);
      valuez += 1;
      outPer += '<div class="perusopinnot">';
      outPer += '<form method="post" action="" class="jcart">';
      outPer += '<fieldset>';
      outPer += '<input type="hidden" name="my-item-id" value="'+valuez+'" />';
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
      outPer +=   '<input type="submit" name="my-add-button" value="add to cart" class="button" />';
      outPer += '</fieldset>';
      outPer += '</form>';
      outPer += '</div>';



    /*  outPer += '<div class="perusopinnot" id="dance">';
      outPer += '<p>' + 'perusopinnot' + '</p>';
      outPer += '<p>' + data.courses[key].name + '</p>';
      outPer += '<p>' + data.courses[key].points+ '</p>';
      outPer += '<button class="add-to-cart" data-id="'+ [key]+'">'+ "Add To Cart" + '</button>';
      outPer += '</div>';*/


      }
      else if (data.courses[key].category_uuid == id2 ) {
        var valuez = parseInt([key]);
        valuez += 1;
        outPak += '<div class="pakolliset">';
        outPak += '<form method="post" action="" class="jcart">';
        outPak += '<fieldset>';
        outPak += '<input type="hidden" name="my-item-id" value="'+valuez+'" />';
        outPak += '<input type="hidden" name="my-item-name" value="'+ data.courses[key].name +'" />';
        outPak += '<input type="hidden" name="my-item-price" value="'+ data.courses[key].points +'" />';
        outPak += '<input type="hidden" name="my-item-url" value="" />';
        outPak +=  '<ul>';
        outPak += ' <li><strong>"'+data.courses[key].name+'"</strong></li>';
        outPak +=  '<li>'+ data.courses[key].points +'</li>';
        outPak += ' <li>';
        outPak +=  '<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" readonly/></label>';
        outPak +=  '</li>';
        outPak +=  '</ul>';
        outPak +=   '<input type="submit" name="my-add-button" value="add to cart" class="button" />';
        outPak += '</fieldset>';
        outPak += '</form>';
        outPak += '</div>';

      /*  outPak += '<div class="pakolliset">';
        outPak += '<p>' + 'pakolliset' + '</p>';
        outPak += '<p>' + data.courses[key].name + '</p>';
        outPak += '<p>' + data.courses[key].points+ '</p>';
        outPak += '<button class="add-to-cart" data-id="'+ [key]+'">'+ "Add To Cart" + '</button>';
        outPak += '</div>'; */
      }
      else {
        var valuez = parseInt([key]);
        valuez += 1;
        outVal += '<div class="valinnaiset">';
        outVal += '<form method="post" action="" class="jcart">';
        outVal += '<fieldset>';
        outVal += '<input type="hidden" name="my-item-id" value="'+valuez+'" />';
        outVal += '<input type="hidden" name="my-item-name" value="'+ data.courses[key].name +'" />';
        outVal += '<input type="hidden" name="my-item-price" value="'+ data.courses[key].points +'" />';
        outVal += '<input type="hidden" name="my-item-url" value="" />';
        outVal +=  '<ul>';
        outVal += ' <li><strong>"'+data.courses[key].name+'"</strong></li>';
        outVal +=  '<li>'+ data.courses[key].points +'</li>';
        outVal += ' <li>';
        outVal +=  '<label>Qty: <input type="text" name="my-item-qty" value="1" size="3" readonly/></label>';
        outVal +=  '</li>';
        outVal +=  '</ul>';
        outVal +=   '<input type="submit" name="my-add-button" value="add to cart" class="button" />';
        outVal += '</fieldset>';
        outVal += '</form>';
        outVal += '</div>';


    /*   outVal += '<div class="valinnaiset">';
        outVal += '<p>' + 'valinnaiset' + '</p>';
        outVal += '<p>' + data.courses[key].name + '</p>';
        outVal += '<p>' + data.courses[key].points + '</p>';
        outVal += '<button class="add-to-cart" data-id="'+[key]+'">'+ "Add To Cart" + '</button>';
        outVal += '</div>';*/
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
