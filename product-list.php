<html>
<head>
<style>


</style>
<link   rel="stylesheet" href="style1.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


<div style="width:100%;" id="product-grid">

    <div class="txt-heading">
        <div class="txt-heading-label">Products</div>
    </div>
	<h3>Chinese</h3>
    <?php
	$cnt=1;
    $query = "SELECT * FROM tbl_product";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) { 
		$cnt=$cnt+1;
		if($cnt==10)
		    echo "<font color=white size=4px ><br><br><b>INDIAN </b><br><br></font>";
        if($cnt==18)
	        echo "<font color=white size=4px ><br><br><b>CONTINENTAL </b> <br><br></font>";
			if($cnt==26)
	        echo "<font color=white size=4px ><br><br><b>Soups</b> <br><br></font>";
			if($cnt==34)
	        echo "<font color=white size=4px ><br><br><b>Mocktails</b> <br><br></font>";
			if($cnt==39)
	        echo "<font color=white size=4px ><br><br><b>Soft Drinks</b> <br><br></font>";
			if($cnt==44)
	        echo "<font color=white size=4px ><br><br><b>Milk Shakes</b> <br><br></font>";
			
			if($cnt==49)
	        echo "<font color=white size=4px ><br><br><b>Ice Cream</b> <br><br></font>";
			if($cnt==54)
	        echo "<font color=white size=4px ><br><br><b>Sweets</b> <br><br></font>";
			if($cnt==59)
	        echo "<font color=white size=4px ><br><br><b>Pasterie's</b> <br><br></font>";
			
			?>
		
        <div style="height:151px; width:150px;padding:0px;" class="product-item">
        <form method="post"
            action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div class="product-image">
                <img style="width:151px;margin-right:9px;" src="<?php echo $product_array[$key]["image"]; ?>">
                <div  style="width:151px;" class="product-title" >
                    <?php echo $product_array[$key]["name"]; ?>
                </div>
            </div>
            <div  class="product-footer">
                <div style="margin-top:-7px;" class="float-right">
                    <input type="text" style="width:30px;height:27px;"name="quantity" value="1"
                        size="2" class="input-cart-quantity" /><input type="image"
                        src="add-to-cart.png" class="btnAddAction" />
                </div>
                <div style="margin-top:-5px;"class="product-price float-left" id="product-price-<?php echo $product_array[$key]["code"]; ?>"><?php echo "Rs.".$product_array[$key]["price"]; ?></div>                
            </div>
        </form>
    </div>	
    <?php
        }
    }
    ?>	
</div>
</body>
</html>