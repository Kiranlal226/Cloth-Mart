<!-- connect file-->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--css link-->
    <link rel="stylesheet" href="../style.css">
    
    
    <style>
        
        .admin_image{
            width: 100px;
            object-fit: contain;
        }
        
        .footer{
            position: absolute;
            bottom: 0;
        }

        body{
            overflow-x:hidden;
            background-image: url(../images/cloth.jpg);
            background-repeat: no-repeat;
            background-size: cover; 
        }

        .product_img{
            width:100px;
            object-fit:contain; 
        }
    </style>
    
    
</head>
<body>
   <!--navbar-->
   <div class="container-fluid p-0">
       <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <div class="container-fluid">
              <img src="../images/logo.jpg" alt="" style="width:5%;height:5%";>

<!-- Top out of stock notofication -->
<?php
  if(isset($_SESSION['username'])){
    $get_products = "Select * from `products`";
    $result=mysqli_query($con,$get_products);
    while($row=mysqli_fetch_assoc($result)){
    $quantity=$row['quantity'];
    if($quantity<20){
        echo "<h4> <font color=red>Some Products are out of stock</font> </h4>"; 
        break;   
    }
    
        //echo "Some Products are out of stock";
       // echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
    

?>
              <nav class="navbar navbar-expand-lg">
                  <ul class="navbar-nav">
                      <li class="nav-item">

                      
                          <!--<a href="" class="nav-link" >Welcome Guest</a>-->
                          <?php
                if(!isset($_SESSION['username'])){
                echo "<li class = 'nav-item'>
                <a class='nav-link' href='#'> Welcome Guest </a>
                </li>" ;
                }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'> Welcome ".$_SESSION ['username']."</a>
                </li>" ;
                }if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='admin_login.php'> Login </a>
                </li>" ;
                } else {
                echo "<li class = 'nav-item' >
                <a class='nav-link' href='logout.php'> Logout </a>
                </li> " ;
                }
                ?>


                      </li>
                  </ul>
              </nav>
          </div>         
       </nav>
<!--second child-->
   <div class="bg-light">
       <h3 class="text-center p-2">Manage Details</h3>
   </div>

<!--third child-->
   <div class="row">
       <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
           <div class="p-4">
            <!--   <a href="#"><img src="kiranlal.jpg" alt="" class="admin_image"></a>
               <p class="text-light text-center"><?php// echo $_SESSION['username'] ?></p> -->
           </div>  
               <div class="button text-center m-4">
               <button class="my-3"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
               <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
               <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
               <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
               <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
               <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
               <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
               <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
               <button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
               </div>
       </div>
   </div>                   
</div>
      
    <!--fourth child-->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }

        
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }

        if(isset($_GET['view_products'])){
            include('view_products.php');
        }

        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }

        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }

        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }

        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }

        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }

        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }

        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }

        if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
        }

        if(isset($_GET['list_users'])){
            include('list_users.php');
        }

        if(isset($_GET['delete_users'])){
            include('delete_users.php');
        }


        ?>
    </div>          
        
          
   <!--last child -->
  <!-- <div class="bg-info p-3 text-center footer">
       <p>All rights reserved @- Designed by Kiran Lal-2022</p>
   </div>
  <div>
  <?php
    include("../includes/footer.php")
    ?>
  </div>   -->  
   
                         
    <!-- boostrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>                     
</body> 
</html> 

<?php
 if(isset($_GET['view_products'])){
    $get_products = "Select * from `products`";
    $result=mysqli_query($con,$get_products);
    while($row=mysqli_fetch_assoc($result)){
    $quantity=$row['quantity'];
    if($quantity<20){
        echo "<script>alert('Some Products are out of stock')</script>";
        break;
       // echo "<script>window.open('index.php?view_products','_self')</script>";
    }

    }
 }
?>



