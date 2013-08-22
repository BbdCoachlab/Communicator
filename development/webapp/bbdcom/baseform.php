<?php
echo '<div class="row">
          <div class="col-lg-12">
            <div class="well">
              <form class="bs-example form-horizontal">
                <fieldset>    
				
                  <div class="form-group">
                    <label for="subject" class="col-lg-2 control-label">Subject</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="message" placeholder="Message"></textarea>                      
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
      </div>';
	  
?>	  