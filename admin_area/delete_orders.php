<?php
if(isset($_GET['delete_orders'])){
    $delete_order = $_GET['delete_orders'];
    // echo $ delete_category ;
    $delete_query = "Delete from `user_orders` where order_id = $delete_order";
    $result = mysqli_query($con,$delete_query);

    if ($result) {
        echo " <script> alert ( 'Order has been Deleted successfully') </script>";
        echo " <script> window.open ('./index.php?list_orders' , '_self')</script>";
    }
}
?>