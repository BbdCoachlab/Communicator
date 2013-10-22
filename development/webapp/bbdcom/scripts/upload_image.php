<?php
// The code handles uploading images in limiting image size and giving image format.
function uploadImage($image)
{
    
    if ($image["size"] > 2097152)
  {    
  	return null;
  }
  
    
  if(!isValidType($image))
  {
      return null;
  }
  
  $target_path = getTargetPath($image);
  
  if(is_null($target_path))
  {
      return null;
  }
  
  if (!move_uploaded_file($image["tmp_name"], $target_path))
  {
  	return null;
  }
  
  return $target_path;
}


function isValidType($file)
 {
 	$valid_types = array("image/png","image/jpg","image/jpeg","image/jpe","image/gif");
    if (in_array($file["type"], $valid_types))
    {
        return true;
    }
    return false;
 }

function getTargetPath($file)
{
  $count = 0;
  $target_path = $_SERVER['DOCUMENT_ROOT'] . $directory_self ."\bbdcom\uploads\\".$file["name"];
  
  for ($i = 0; $i < 3; $i++)
  {      
      if(!file_exists($target_path))
    {
          return $target_path;
    }
      else     
      {
          $target_path = $_SERVER['DOCUMENT_ROOT'] . $directory_self ."\bbdcom\uploads/".mt_rand().$file["name"];
      }
  }
  
  return null;
}
 
?>
