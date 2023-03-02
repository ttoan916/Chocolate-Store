<?php
session_start();
if( $_SERVER['REQUEST_METHOD']=='POST'){
    header("Location:../../pages/payment.php");
    exit();
}else{
    header("Location:../../pages/cart.php");
    exit();
}