<?php
    session_start();
    require 'connection.php';
    require 'check_if_added.php';

    $count = "SELECT * FROM product";
    $result = mysqli_query($con,$count) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.jpg" />
        <title>Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body> 
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Store!</h1>
                    <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
            <?php
             echo $_SESSION['tel'];
            ?>
            <div class="container">
                <div class="row">
                    <?php  
                    $result = mysqli_query($con,$count) or die(mysqli_error($con));
                    $no_of_user_products= mysqli_num_rows($result);
                       while($row=mysqli_fetch_array($result)){
                        
                    ?>



                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="<?php echo $row['pic'] ?>" width="600"  alt="kai">
                            </a>
                            <center>
                            <form action="cart_add.php" method="GET"> 
                                <div class="caption"> 
                                    <h3><?php echo $row['product_name']; ?></h3>
                                    <p>Price: <?php echo $row['price']; ?> บาท</p>
                                    <?php
                                        if($row['product_amount']>0){
                                            echo  '<h5 class="text-left text-success">เหลือ :' .$row['product_amount'].' ชิ้น</h5>'; 
                                        }else{
                                            echo  '<h2 class="text-left text-danger">OUT OF STOCK</h2>';
                                        }
                                    ?> 
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="num" id="num" placeholder="จำนวน"  pattern=".{6,}">
                                        <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                                    </div> 
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($row['product_id'])){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <input type="submit" class="btn btn-block btn-primary" value="Add to cart" class="btn btn-block btr-primary"></input>
                                                <?php 
                                            }
                                        }
                                        ?>

                        </form></div>
                            </center>
                        </div>
                    </div>
                      
                                        <?php } ?>
                </div>
                
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center> 
               </center>
               </div>
           </footer>
        </div>
                                 
    </body>
</html>
