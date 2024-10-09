<?php
    require 'connection.php';
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $sername=mysqli_real_escape_string($con,$_POST['sername']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $tel =mysqli_real_escape_string($con,$_POST['tel']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $validInt = filter_var($tel, FILTER_VALIDATE_INT);
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['tel'])));
    if(strlen($tel)<9){
        ?>
        <script>
            window.alert("Please fill in 10 characters.");
        </script>
        <meta http-equiv="refresh" content="0;url=signup.php" />
        <?php
    }else{
        $duplicate_user_query="select user_tel from user where user_email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    $duplicate_user_query1="select user_tel from user where user_tel='$tel'";
    $duplicate_user_result1=mysqli_query($con,$duplicate_user_query1) or die(mysqli_error($con));
    $rows_fetcheded=mysqli_num_rows($duplicate_user_result1);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }elseif($rows_fetcheded>0){
        ?>
        <script>
            window.alert("Telephone number already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }
    else{
        $user_registration_query="insert into user (user_tel,user_email,user_name,user_sername,status) values ('$tel','$email','$name','$sername','0')";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        ?>
        <script>
            window.alert("User successfully registered");
        </script>
        <meta http-equiv="refresh" content="1;url=logout.php" />
        <?php
        $_SESSION['email']=$email;
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['id']=mysqli_insert_id($con); 
        //header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=logout.php" />
        <?php
    }
    }
    
    
?>