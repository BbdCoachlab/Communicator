<!--<?php session_start(); ?>-->
<!DOCTYPE html>
<html lang="en">
    <head>      
        <meta charset="UTF-8">
        <title>bbd communicator</title>
        <link rel="shortcut icon" href="images/bbd-symbol.png" >
        <link rel="stylesheet" href="style/bootstrap.css" media="screen"> 
        <script src="js/jquery.js"></script>
        <script src="js/style_script.js"></script>
  </head>

    <body>   
        <div class="container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Communicator</h1>
                        
                    </div>
                </div>
            </div>                   
            <div class="row">
                <div class="col-lg-9">            
                    <div class="jumbotron">
                        <h2>Efficient Communication</h2>
                        <p>The bbd communicator makes it possible for efficient internal 
                            communications.
                        </p>              
                    </div>
                </div>
                     <div class="col-lg-3"> 
                        <div class="jumbotron"style = "background-image:url(images/yammerPic.jpg);
                     background-repeat:no-repeat;
                     background-size:cover;">
                             <h4>Login With Yammer</h4>
                            <fieldset>    
                             <input type="button" class="btn btn-primary btn-lg"  onClick="window.location = 'https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=http://localhost:53331/bbdcom/scripts/login.php';" value="Login"> 
                            </fieldset>
                        </form>
                        </div>
                        </div>
                 
                <div class="col-lg-3">
                   <?php 
                        if(isset($_SESSION['login_message'])){
                            echo $_SESSION['login_message'];
                            unset($_SESSION['login_message']);
                        }
                    ?>
                </div>
            </div>           
        </div>   
    
    </body>
</html>
