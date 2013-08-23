<?php include('menu.php'); ?>

<!DOCTYPE html>

<html lang="en">

    <body>
        <div class="container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="col-lg-6">
                        <h1><img src="images/bbd-symbol.png" alt="bbd-logo" width="50" height="50" style="position: relative; top: -9px; ">BBD Communicator</h1>
                        <p class="lead">Internal Communication Tool</p>
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
                            <h1>Birthdays</h1>
                            <p>Send Birthday notifications </p>
                            <p><a class="btn btn-primary" href="birthday.php">Send Message</a></p>
                        </div>            
                    </div>

                    <div class="col-lg-4">            
                        <div class="jumbotron"style=" background-image:url(images/award2.jpg);
                             border:1px solid grey;
                             background-size: cover;
                             background-repeat: no-repeat; ">
                            <h1>Awards</h1>
                            <p>Remind employees to nominate</p>
                            <p><a class="btn btn-primary " href="awards.php">Send Message</a></p>
                        </div>         
                    </div>

                    <div class="col-lg-4">            
                        <div class="jumbotron"style=" background-image:url(images/event2.jpg);border:1px solid grey;
                             background-size: cover;
                             background-repeat: no-repeat;">

                            <h1>Events</h1>
                            <p>Notify employees of events</p>
                            <p><a class="btn btn-primary" href="events.php">Send Message</a></p>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </body>
</html>
