<?php
    require 'connection.php';
    session_start();
    $ALLIN=$_GET['id'];
    $ALLIN2 =  explode(",", $ALLIN);
    $item_id = $ALLIN2[0];
    $productz = $ALLIN2[1];
    $amount = $ALLIN2[2];
    $user_id=$_SESSION['tel'];
    $remove_cart="SELECT user_item.id ,product.product_id,product.product_name,product.price,user_item.amount FROM product,user_item WHERE product.product_id = user_item.product_id AND user_item.user_tel ='$user_id'";
    $remove_cart_result=mysqli_query($con,$remove_cart) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($remove_cart_result)){
        $pro = $row ['product_id'];
   }
   $delete_query="delete from user_item where product_id='$productz' and id='$item_id'";
   $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
   $confirm_query1="update product set product_amount=product_amount+$amount where product_id='$productz';";
   $confirm_query_result1=mysqli_query($con,$confirm_query1) or die(mysqli_error($con));
    header('location: cart.php'); 
?>