<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $sername=mysqli_real_escape_string($con,$_POST['sername']);
    $email=$_SESSION['email'];
    //echo $email;
    $password_from_database_query="select * from user where user_email='$email'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
  /*   echo $row['user_name'];
    echo $row['user_sername'];
    echo $name;
    echo $sername; */
    if($email==$row['user_email']){
        $update_password_query="update user set user_name ='$name' where user_email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        $update_password_query1="update user set user_sername ='$sername' where user_email='$email'";
        $update_password_result1=mysqli_query($con,$update_password_query1) or die(mysqli_error($con));
        
        ?>
         <script>
            window.alert("Updated your name and sername");
        </script>
        <meta http-equiv="refresh" content="3;url=logout.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="0;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>