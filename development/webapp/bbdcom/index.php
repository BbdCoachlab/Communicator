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
        <!-- Start WOWSlider.com HEAD section -->
	    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	   <script type="text/javascript" src="engine1/jquery.js"></script>
	   <!-- End WOWSlider.com HEAD section -->
       
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
                             <input type="button" class="btn btn-primary btn-lg"  onClick="window.location = 'https://www.yammer.com/dialog/oauth?client_id=nEjhbfN94g3w2nAYczxEw&redirect_uri=http://localhost/bbdcom/scripts/login.php';" value="Login"> 
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
       	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/comms.jpg" alt="comms" title="comms" id="wows1_0"/></li>
<li><img src="data1/images/env.jpg" alt="env" title="env" id="wows1_1"/></li>
<li><img src="data1/images/envelop.jpg" alt="envelop" title="envelop" id="wows1_2"/></li>
<li><img src="data1/images/event2.jpg" alt="event2" title="event2" id="wows1_3"/></li>
<li><img src="data1/images/posts.jpg" alt="posts" title="posts" id="wows1_4"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="comms"><img src="data1/tooltips/comms.jpg" alt="comms"/>1</a>
<a href="#" title="env"><img src="data1/tooltips/env.jpg" alt="env"/>2</a>
<a href="#" title="envelop"><img src="data1/tooltips/envelop.jpg" alt="envelop"/>3</a>
<a href="#" title="event2"><img src="data1/tooltips/event2.jpg" alt="event2"/>4</a>
<a href="#" title="posts"><img src="data1/tooltips/posts.jpg" alt="posts"/>5</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">Joomla Slider</a> by WOWSlider.com v4.6</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
       

    
</div>
    </body>
</html>
