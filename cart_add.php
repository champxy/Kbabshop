<?php
    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $amount=$_GET['num'];
    $user_id=$_SESSION['tel'];
    $checklist = "SELECT * FROM product WHERE product_id = '$item_id'";
    $resultcheck = mysqli_query($con,$checklist) or die(mysqli_error($con));
    $row=mysqli_fetch_assoc($resultcheck);
   if($amount < $row['product_amount']){
    $add_to_cart_query="insert into user_item(product_id,user_tel,status,amount) values ('$item_id','$user_id','Added to cart','$amount')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));

    $confirm_query1="update product set product_amount=product_amount-$amount where product_id='$item_id'";
    $confirm_query_result1=mysqli_query($con,$confirm_query1) or die(mysqli_error($con));
    echo '<script>alert("added to cart success")</script>';
    echo '<script>location.replace("products.php")</script>';
    
}else{
    echo '<script>alert("Not enough products")</script>';
    echo '<script>location.replace("products.php")</script>';
    
}   
?>