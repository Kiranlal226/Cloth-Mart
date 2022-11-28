<!-- connect file-->
<?php
include('../includes/connect.php'); 
session_start();  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
   
   <link rel="stylesheet" href="style.css">

   <style>
    body{
      overflow-x:hidden;
    }
   </style>
   
    
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
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
      
  </div>
  
  

     
  <!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
     <ul class="navbar-nav me-auto">

     <?php
if (!isset($_SESSION['username'])){
echo "<li class = 'nav-item'>
<a class='nav-link' href='#'> Welcome Guest </a>
</li>" ;
}else{
echo "<li class='nav-item'>
<a class='nav-link' href='#'> Welcome ".$_SESSION ['username']."</a>
</li>" ;
}if(!isset($_SESSION['username'])){
echo "<li class='nav-item'>
<a class='nav-link' href='./user_login.php'> Login </a>
</li>" ;
} else {
echo "<li class = 'nav-item' >
<a class='nav-link' href='./logout.php'> Logout </a>
</li> " ;
}
 ?>

     </ul>
  </nav>
  
     
<!--Company Name-->     
      <div class="bg-light">
      <h2 class="text-center">Kiran's Store</h2>
    </div>   
   
   
<!-- second child -->
    <div class="bg-light">
        <h4 class="text-center">DON'T WORRY ABOUT WHAT YOU WEAR TODAY, YOUR SMILE GOES WITH ANY CLOTHES</h4>
    </div> 
     
<!-- third child -->
     <div class="row px-1">
         <div class="col-md-12">
             <!--Products-->
             <div class="row">
              
              <?php
                 if(!isset($_SESSION['username'])){
                     include('user_login.php');
                 }else{
                     include('./payment.php');
                 }
               ?>

        <!--row end-->
         </div>
    <!--col end-->         
     </div>      
      
   
   <!--last child -->
 <!-- include footer -->
   <?php
    include("../includes/footer.php")
    ?>     
    </div>
    
   
    <!-- boostrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>         
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
    </html>
