<!-- include the menu bar !-->
<?php 
    include('menu.php'); 
    include('scripts/check_logged_in.php');
?>

<!DOCTYPE html>
<head>   <!-- The dashboard gives a summary of the different functions of the BBD Communicator. 
			  This code is to display the buttons to navigate to the Birthdays, nominations and events. -->
    <html lang="en">
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

            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="jumbotron"style=" background-image:url(images/bday2.jpg);
                             border:1px solid grey; 
                             background-size: cover;
                             background-repeat: no-repeat;">
                            <h2>Birthdays</h2>
                            <p>Send Birthday notifications </p>
                            <p><a class="btn btn-primary" href="birthday.php">Send Message</a></p>
                        </div>            
                    </div>

                    <div class="col-lg-4">            
                        <div class="jumbotron"style=" background-image:url(images/award2.jpg);
                             border:1px solid grey;
                             background-size: cover;
                             background-repeat: no-repeat; ">
                            <h2>Awards</h2>
                            <p>Remind employees to nominate</p>
                            <p><a class="btn btn-primary " href="awards.php">Send Message</a></p>
                        </div>         
                    </div>

                    <div class="col-lg-4">            
                        <div class="jumbotron"style=" background-image:url(images/event2.jpg);border:1px solid grey;
                             background-size: cover;
                             background-repeat: no-repeat;">

                            <h2>Events</h2>
                            <p>Notify employees of events</p>
                            <p><a class="btn btn-primary" href="events.php">Send Message</a></p>
                        </div>
                    </div>          
                </div>
            </div>
        </div>        
    </body>
    <?php include('scripts/check_message_success.php'); ?>
</html>
