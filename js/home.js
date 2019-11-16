$(document).ready(function() {

  //Add to cart functionality
  $(".add-to-cart").click(function(){
    $itemId = $(this).data("id");
    $.post( "ajax-cart.php", { id: $itemId})
      .done(function( data ) {
        console.log(data);
        if (data === "exists") {
          alert("Item already exists in cart! Please visit the cart to edit quantity!"+ data);
        } else if (data === "true") {
          alert("Item added to the cart successfully! "+ data);
        } else {
          alert( "Could not add item to the cart, failed! "+ data);
        }
      });
  });


//Highlighting the current category
//GET parameter
  console.log("getting get parameter");
$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }

});
// Getting URL var by its nam
var byName = $.getUrlVar('category');
$("#"+byName+"-link").addClass("current-tab");

});