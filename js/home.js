$(document).ready(function() {

  //Add to cart functionality
  $(".add-to-cart").click(function(){
    $itemId = $(this).data("id");
    $.post( "ajax-cart.php", { action: "add",id: $itemId})
      .done(function( data ) {
        console.log(data);
        if (data === "exists") {
          alert("Item already exists in cart! Please visit the cart to edit quantity!");
        } else if (data === "true") {
          alert("Item added to the cart successfully! ");
        } else {
          alert( "Could not add item to the cart, failed! ");
        }
      });
  });
//Delete from cart functionality
  $(".delete-from-item").click(function(){
    $("#overlay").css("display", "block");
    $thisRow = $(this).parents("tr");
    console.log("printing parent row");
    console.log($thisRow);
    $itemId = $(this).parents("tr").data("id");
    $.post( "ajax-cart.php", { action: "delete",id: $itemId})
      .done(function( data ) {
        $("#overlay").css("display", "none");
        data = JSON.parse(data);
        console.log(data.status);
        if (data.status === "success") {
          if (data.cart.totalItems == 0) {
            $( ".cart-container").html( "<div class='cart-empty'><h1>Your cart is empty!</h1></div>");
          }else {
            updateCartInfor(data.cart);
          }
          $thisRow.remove();
          // alert("Item deleted from the cart successfully! "+ data);
        } else {
          alert( "Item could not be deleted from the cart, failed! "+ data);
        }
      });
  });
//Change the item quantity from cart
$price =0;
$('select[name="quantity"').on('change', function() {
    $("#overlay").css("display", "block");
    $thisRow = $(this).parents("tr");
    console.log("printing parent row");
    console.log($thisRow);
    $itemId = $(this).parents("tr").data("id");
    $price = parseInt($(this).parents("tr").data("price"));
    $quantity =this.value;
    $.post( "ajax-cart.php", { action: "update",id: $itemId, quantity:$quantity})
      .done(function( data ) {
        $("#overlay").css("display", "none");
        data = JSON.parse(data);
        console.log(data.status);
        if (data.status === "success") {
          updateCartInfor(data.cart);
          // $price =parseInt($(':nth-child(4)', $(this)).html());
          console.log("price:"+$price);          
          $( ".price-"+$itemId).html($price * $quantity);
          console.log($price * $quantity);
          // $thisRow.remove();
          // alert("Item quantity updated successfully! "+ data);
        } else {
          alert( "Item could not be deleted from the cart, failed! "+ data);
        }
      });
});
function updateCartInfor($cart) {
  console.log($cart);
  $( "#total-items").html( $cart.totalItems );
  $(".total-cost").html("&#x20B9;"+$cart.totalCost);
  $("#items-total-cost").html("&#x20B9;"+parseFloat($cart.totalCost - $cart.totalGst).toFixed(2));
  $("#total-gst").html("&#x20B9;"+$cart.totalGst);
  // body...
}
  //Place order functionality
  $("#place-order").click(function(){

    $.post( "ajax-cart.php", { action: "place_order"})
      .done(function( data ) {
        data = JSON.parse(data);
        console.log(data.status);
        if (data.status === "nologin") {
          alert("Please login to place order!");
        } else if(data.status === "success") {
          $( ".cart-container").html( "<div class='cart-empty'><h1>Your order has been placed successfully!</h1></div>");
        } else {
          alert("OOPS! something went wrong!");
        }

      });
  });

//Highlighting the current category
//GET parameter
  // console.log("getting get parameter");
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