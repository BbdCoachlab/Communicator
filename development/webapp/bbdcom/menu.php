
<!DOCTYPE html>
  <html lang="en">
    <head>
      <title>bbd communicator</title>
      <link rel="shortcut icon" href="images/bbd-symbol.png" />
      <link rel="stylesheet" href="style/bootstrap.css" media="screen" />      
    </head>
	
    <body>
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <a href="dashboard.php" class="navbar-brand">bbd communicator</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="birthday.php">Birthday Messages</a></li>
              <li><a href="awards.php">Awards</a></li>
              <li><a href="events.php">Events</a></li>
		    </ul>
			
            <ul class="nav navbar-nav pull-right">
              <li id="logout"><a href="scripts/logout.php" >Log out</a></li>            
            </ul>
          </div>
        </div>
      </div>
    </body>
  </html>