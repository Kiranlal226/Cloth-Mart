<?php include('../includes/connect.php');
include('../functions/common_function.php'); 
@session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
        <!--bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<style>
    img{
        width:40%;
        margin:auto;
        display:block;
    }
</style>        
<body>

<!--php code to access user id -->
<?php
$username = $_SESSION['username'];
$user_image = "Select * from `user_table` where username ='$username' ";
$user_image = mysqli_query($con , $user_image);
$row_image = mysqli_fetch_array($user_image);
$user_image = $row_image['username'];

$user_ip =getIPAddress() ;
$get_user = "Select * from `user_table` where user_ip='$user_ip' and username='$user_image' " ;
$result = mysqli_query($con,$get_user) ;
$run_query = mysqli_fetch_assoc($result);
$user_id = $run_query['user_id'];
?>

    <div class = "container">
        <h2 class = "text-center text-info">Payment options</h2>
        <div class = "row d-flex justify-content-center align-items-center my-5">
            <div class = "col-md-6" >
                <a href="https://www.paypal.com" target="_blank"> <img src = " ../images/upi.png" alt=""></a>
            </div>
            <div class = "col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2>Pay Later</h2></a>
            </div>
        </div>
    </div>
</body>
</html>        

        