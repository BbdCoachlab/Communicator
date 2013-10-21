<!-- include the menu bar !-->
<?php 
include('scripts/check_logged_in.php');
include('menu.php');                           
?>

<!DOCTYPE html>
  <head>
    <script src="js/jquery.js"></script>
    <script src="js/jquery_validation.js"></script>
    <script src="js/basic_form_validation.js"></script> 
    <script src="js/style_script.js"></script>
  </head>
  <html lang="en">	
    <body>	    
      <div class="container">      
	    <!-- making the heading !-->
        <div class="page-header" id="banner">
          <div class="row">
            <div class="col-lg-6">
              <h1>birthdays</h1>            
            </div>
          </div>
        </div>
		<div class="row">
          <div class="col-lg-12">
            <div class="well">
              <form class="bs-example form-horizontal" action="scripts/send_basic_message.php" method="post" id="basic_form" enctype="multipart/form-data">
                <fieldset>    
				  <div class="form-group">
                    <label for="department_list" class="col-lg-2 control-label">Send to:</label>
                    <div class="col-lg-10">
                        <?php include('scripts/department_list.php')?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="subject" class="col-lg-2 control-label">Subject</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"  name="subject" id="subject" placeholder="Subject">                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"></textarea>                      
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="image" class="col-lg-2 control-label">Upload Image</label>
                    <div class="col-lg-10">
                      <input type="file"  id="image" name="image" accept="image/*">
                    </div>
                  </div>
				  
				  <input type="hidden" id="message_type" name="message_type" value="birthday" />
				  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">                      
                      <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Submit</button> 
					  <button type="reset" class="btn btn-default" id="btn_cancel" name="btn_cancel">Cancel</button> 
                    </div>
                  </div>                  
                </fieldset>
              </form>
            </div>
          </div>
          </div>		
	    </div>
      </div>
     <?php include('scripts/check_message_success.php'); ?>
    </body>
  </html>