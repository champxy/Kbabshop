<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
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
            <br>
            <div class="container">
                <div class="row">
                    <div class="">
                        <form method="post" action="setting_script.php">
                            <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Change</h3>
                            </div>
                            <div class="panel-body">
                                <p>You can change name and sername only</p>
                                <form method="post" action="login_submit.php">
                                      <div class="form-group">
                                <input type="text" class="form-control" name="tel" placeholder="" value="<?php echo $_SESSION['tel'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="" value="<?php echo $_SESSION['email'] ?>" readonly>
                            </div>
                            <div class="form-group">
                             <div class="col-xs-6"><input type="text" class="form-control" name="name" placeholder="" value="<?php echo $_SESSION['name'] ?>" > 

                            </div>
                            <div class="col-xs-5"><input type="text" class="form-control" name="sername" placeholder="" value="<?php echo $_SESSION['sername'] ?>" > 

                            </div>
                            </div> <br><br><br><br>
                                    <div class="form-group">
                                        <input type="submit" value="Change" class="btn btn-primary ">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center> 
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
