<?php
   require 'connection.php';
   session_start();
  if(!empty($_GET['id'])){
    $sql = 'DELETE FROM user WHERE user_tel="'.$_GET['id'].'"';
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location:userviews.php");
    }else{
        echo 'เกิดข้อผิดพลาดลบบ่ได้';
    }
}
?>
?>