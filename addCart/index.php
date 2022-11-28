<?php 
	include "config.php";
  include('../functions/common_function.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet"> 
     <!--bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--  font awsome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
 
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<!--navbar-->
<div class="container-fluid p-0">
     <!--first child --> 
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.jpg" alt="" style="width:5%;height:5%;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        
      <?php
if(isset($_SESSION['username'])){
echo"<li class='nav-item'>
<a class='nav-link' href='../users_area/profile.php'>My Account</a></li>";
}else{
echo"<li class='nav-item'>
<a class='nav-link' href='../users_area/user_registration.php'> Register </a></li>";
}
?>
 
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
      
  </div>
  <br><br>

  

<!-- Original -->
  
<div class="container">
  <div class="row">
			<h1>WISH LIST</h1><hr>
			<?php
      $get_ip_add = getIPAddress();
      $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result=$con->query($cart_query);
      while($rows=mysqli_fetch_array($result)){
      $product_id=$rows['product_id'];

      //Original
			$sql="Select * from `products` where product_id='$product_id'";
			$res=$con->query($sql);
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
			echo  '
   <div class="col-sm-4 col-lg-3 col-md-3 text-center">
    
     <img src="../admin_area/product_images/'. $row['product_image1'] .'" alt="" class="img-responsive" >
     <p><strong><a href="#">'. $row['product_title'] .'</a></strong></p>
     <h4 class="text-danger"> Rs.'. $row['product_price'] .'</h4>
	<p><a href="view.php?id='. $row['product_id'] .'" class="btn btn-success">View Details</a></p>

   </div>
   ';
				}
			}
    }
			?>
  </div>
</div>

</body>
</html>
