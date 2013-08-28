<?php session_start(); ?>
<!DOCTYPE html>
<<<<<<< HEAD
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
                        <h1><img src="images/bbd-symbol.png" alt="bbd-logo" width="50" height="50" style="position: relative; top: -9px; ">bbd communicator</h1>
                        <p class="lead">internal communication tool</p>
                    </div>
                </div>
            </div>                   
            <div class="row">
                <div class="col-lg-9">            
                    <div class="jumbotron">
                        <h1>Efficient Communication</h1>
                        <p>The bbd communicator makes it possible for efficient internal 
                            communications.
                        </p>              
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="well">
                        <form class="bs-example form-horizontal">
                            <fieldset>    
                                <legend>Login with Yammer</legend>	
                                <input type="button" class="btn btn-primary btn-lg" onClick="window.location = 'https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=http://localhost/bbdcom/scripts/login.php';" value="Login"> 
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
                    <!--<div class="alert alert-dismissable alert-danger">
                        <button id="test" type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                    </div>-->
                </div>
            </div>
        </div>        
=======
  <html lang="en">
    <head>
      <title>bbd communicator</title>
      <link rel="shortcut icon" href="images/bbd-symbol.png" >
      <link rel="stylesheet" href="style/bootstrap.css" media="screen">
    </head>
	
    <body>
	  <div class="container">
        <div class="page-header" id="banner">
          <div class="row">
            <div class="col-lg-6">
              <h1><img src="images/bbd-symbol.png" alt="bbd-logo" width="50" height="50" style="position: relative; top: -9px; ">bbd communicator</h1>
              <p class="lead">internal communication tool</p>
            </div>
          </div>
        </div>
		
	  <div class="row">
          <div class="col-lg-12">
            <div class="well">
              <form class="bs-example form-horizontal" action="dashboard.php">
                <fieldset>    
				 <legend>Login with Yammer</legend>				 
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">                      
                      <button type="submit" class="btn btn-primary">Login</button> 					  
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
>>>>>>> upstream/master
    </body>
</html>
