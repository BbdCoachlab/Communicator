<!-- include the menu bar !-->
<?php include('menu.php'); ?>

<!DOCTYPE html>
  <html lang="en">
	
    <body>
	

	
	
      <div class="container">
	    <!-- making the heading !-->
        <div class="page-header" id="banner">
          <div class="row">
            <div class="col-lg-6">
              <h1>awards</h1>            
            </div>
          </div>
        </div>
		
		<div class="row">
          <div class="col-lg-12">
            <div class="well">
              <form class="bs-example form-horizontal" action="scripts/send_awards.php" method="post"> 
                <fieldset>    
				
                  <div class="form-group">
                    <label for="subject" class="col-lg-2 control-label">Subject</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" name= "message" id="message" placeholder="Message"></textarea>                      
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="image" class="col-lg-2 control-label">Upload Image</label>
                    <div class="col-lg-10">
                      <input type="file"  id="image">
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">                      
                      <button type="submit" class="btn btn-primary">Submit</button> 
					  <button class="btn btn-default">Cancel</button> 
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
      </div>;
		
	  </div>
    </body>
  </html>