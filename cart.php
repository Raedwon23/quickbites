<?php

session_start();

 $item_quantity = 0;
    $item_price = 0;
	$total_price2 = 0;
	$total_price1 = 0;
	
	$itemarr=array();
	
require_once "ShoppingCart.php";

$member_id = 2; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {
                
                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);
                
                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);
                }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($member_id);
            break;
    }
}



?>
<HTML>
<HEAD>
<style>
@viewport {
width:device-width;
zoom:1;
}
img {
-ms-interpolation-mode: bicubic; 
border: 0; 
height: auto; 
max-width: 100%; 
vertical-align: middle;
}

    
        </style>
<title>Quick Bites</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link   rel="stylesheet" href="style1.css" />
<script src="jquery-3.2.1.min.js"></script>
<script>
function increment_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
}

function decrement_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
}

function save_to_db(cart_id, new_quantity, newPrice) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
	var priceElement = $("#cart-price-"+cart_id);
    $.ajax({
		url : "update_cart_quantity.php",
		data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
		type : 'post',
		success : function(response) {
			$(inputQuantityElement).val(new_quantity);
            $(priceElement).text("$"+newPrice);
            var totalQuantity = 0;
            $("input[id*='input-quantity-']").each(function() {
                var cart_quantity = $(this).val();
                totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
            });
            $("#total-quantity").text(totalQuantity);
            var totalItemPrice = 0;
            $("div[id*='cart-price-']").each(function() {
                var cart_price = $(this).text().replace("$","");
                totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
            });
            $("#total-price").text(totalItemPrice);
		}
	});
}



</script>

</HEAD>
<BODY onload="action=empty">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	
	      <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Quick<br><small>Bites......</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        
	      </button>
	      
	     
		 
		  </div>
	  </nav>

<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
	$total_price2 = 0;
	$total_price1 = 0;
	$a=0;
	$b=0;
	$c=0;

    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
			
			$item_name = $item["name"];
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
			 $total_price2=($item_price*.2);
			 $total_price1=($total_price2+$item_price);
			 
			 
       $itemarr[$c]=($item["name"]."<br/>");
	 // echo $itemarr[$c];
		$c++;
			
	
       $itemqty[$b]=($item["quantity"]."<br>");
	 // echo $itemqty[$b];
		$b++;
		
			
       $itemppp[$a]=($item["price"]* $item["quantity"]."<br/>");
	  //echo $itemppp[$a];
		$a++;			
        }
    }
}

	
?>

<form action="info.php" method ="post" >
<input type="hidden" name="items" id="items" value=" <?php echo implode(" ",$itemarr); ?>">
<input type="hidden" name="qtyy" id="qtyy" value=" <?php echo implode(" ",$itemqty); ?>">
<input type="hidden" name="qty" id="qty" value="<?php echo $item_quantity; ?>">
<input type="hidden" name="price" id="price" value=" <?php echo implode(" ",$itemppp); ?>">





<input type="hidden" name="sub" id="sub" value="<?php echo $total_price1; ?>">


<input type="submit" style="background-color:#F5C136; width:110px;height:40px;  margin-left:68%"  id="btnEmpty" value ="Confirm"/>


</form>
	
	

    <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label"><font color=black size=5px><b>Shopping Cart</b></font> </div>

            <a id="btnEmpty" href="cart.php?action=empty"><img src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status" >
               <div><font color=black size=2px><b>Total Quantity:</b></font><span id="total-quantity"><?php echo "<font color=black size=3px><b>&nbsp;<mark>$item_quantity</mark></b></font>";?></span></div><br>
                <div><font color=black size=2px><b>Item's Price      : </b></font> <span id="total-price"><?php echo "<font color=black size=3px><b>&nbsp;<mark>$item_price</mark></b></font>"; ?></span></div><br>
				<div><font color=black size=2px><b>GST            :</b></font> <span id="total-price"><?php echo "<font color=black size=3px><b>&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;<mark>$total_price2</mark></b></font>"; ?></span></div><br>
				<div><font color=black size=2px><b>Subtotal  :</b></font> <span id="total-price"><?php echo "<font color=black size=3px><b>&nbsp;&nbsp;<mark>$total_price1</mark></b></font>"; ?></span></div>

            </div>                    
        </div>
		
		
		
		
		
<?php
if (! empty($cartItem)) {
    ?>
	
	
<br>	
<div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title"><font color=black ><b>Title</b></font></div>
                <div style="margin-left:-30px;" class="cart-info"><font color=black ><b>Quantity</b></font></div>
                <div style="margin-left:10px;" class="cart-info price"><font color=black ><b>Price</b></font></div>
            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
		
				<div class="cart-item-container">
                <div style="color:white;" class="cart-info title" name="items">
                    <?php echo $item["name"]; ?>
                </div>

                <div style="width:95px;margin-left:-50px;border:none;" class="cart-info quantity">
                    <input class="input-quantity"
                        value="<?php echo $item["quantity"]; ?>">
                </div>

                <div style="color:white;" class="cart-info price" id="cart-price-<?php echo $item["cart_id"]; ?>">
                        <?php echo "Rs.". ($item["price"] * $item["quantity"]); ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="cart.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>
				<?php
    }
    ?>
</div>
  <?php
}
?>
</div>
<?php require_once "product-list.php"; ?>
 

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>From a small stall in the middle of the market to being the best place to dine in our city.We did it in less than 2 Years ,with your love and supportwe were able to achieve it.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Healthy Food</a></li>
                <li><a href="#" class="py-2 d-block">Fast Delivery</a></li>
                <li><a href="#" class="py-2 d-block">Original Recipes</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Dhaniya Bazaar,
Ferozpur City 1520002</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">
+91 9877949982</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  
</BODY>
</HTML>