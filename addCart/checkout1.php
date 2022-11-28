<?php
session_start();
//session_unset();
unset($_SESSION['cart']);
//session_destroy();
echo " <script>window.open('../users_area/checkout.php','_self')</script>" ;
?>