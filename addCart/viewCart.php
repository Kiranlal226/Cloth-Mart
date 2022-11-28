<?php 
	include "config.php";
	include('../functions/common_function.php'); 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Php Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
<div class="container">
  <div class="row">
			<h1>Cart Items</h1><hr>
			<a href='index.php'><b>Wish List</b></a>
			<table class='table'>	
				<tr>
					<th>Item Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Total</th>
					<th>Remove</th>
				</tr>
				<?php 
				if(isset($_GET["del"]))
				{
					foreach($_SESSION["cart"] as $keys=>$values)
					{
							if($values["pid"]==$_GET["del"])
							{
								$delete_cart="delete from `cart_details` where product_id={$values['pid']}";
								$result_product=$con->query($delete_cart);


								$select_query="Select * from `products` where product_id={$values['pid']}";
								$result_query=mysqli_query($con,$select_query);
								while($row=mysqli_fetch_assoc($result_query)){
								$quantity=$row['quantity'];
								$newquantity= $quantity+$values['qty'];
								$update_product="update `products` set quantity=$newquantity where product_id={$values['pid']}";
								$result_products_quantity2=mysqli_query($con,$update_product);

								unset($_SESSION["cart"][$keys]);
								}
								
							}
					}
				}
					if(!empty($_SESSION["cart"]))
					{
							
							$total=0;
							foreach($_SESSION["cart"] as $keys=>$values)
							{
								$amt=$values["qty"]*$values["price"];
									$total+=$amt;

								//My code
								$select_query="Select * from `products` where product_id={$values['pid']}";
								$result_query=mysqli_query($con,$select_query);
								while($row=mysqli_fetch_assoc($result_query)){
								$quantity=$row['quantity'];
								
								


								if($quantity>$values['qty']){
								$update_cart="update `cart_details` set quantity={$values['qty']} where product_id={$values['pid']}";
								$result_products_quantity=$con->query($update_cart);

							
								$newquantity= $quantity-$values['qty'];
								// echo $quantity;
								// echo $values['qty'];
								// echo $newquantity;
								$update_product="update `products` set quantity=$newquantity where product_id={$values['pid']}";
								$result_products_quantity2=mysqli_query($con,$update_product);
								 }
								}
						
								
							
								
								
									//Original
									echo "
											<tr>
												<td>{$values["pname"]}</td>
												<td>{$values["qty"]}</td>
												<td>{$values["price"]}</td>
												<td>{$amt}</td>
												<td><a href='viewCart.php?del={$values["pid"]}' name='remove_cart'>Remove</a></td>
											</tr>
									";
									
							}
								echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td>{$total}</td>
											</tr>";							
							
					}
				?>
				
				<tr>
				<th><button><a href='../index.php'  name='home'>HOME</button></a></th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<?php
					echo"
					<th><button><a href='checkout1.php'  name='checkout'>Checkout</button></a></th>";
					?>
				</tr>

			</table>
			
  </div>
</div>


</body>
</html>
