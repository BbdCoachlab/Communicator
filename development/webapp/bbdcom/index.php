<!DOCTYPE html>

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
                        <h1><img src="images/bbd-symbol.png" alt="bbd-logo" width="50" height="50" style="position: relative; top: -9px; ">BBD Communicator</h1>
                        <p class="lead">Internal Communication Tool</p>

                    </div>
                </div>
            </div>                   
            <div class="row">
                <div class="col-lg-9">            
                    <div class="jumbotron">
                        <h1>Efficient Communication</h1>
                        <p>The BBD Communicator makes it possible for efficient internal 
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
            </div>
        </div>


    </body>
</html>
