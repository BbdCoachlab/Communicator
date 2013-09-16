<?php
function uploadImage($image)
{
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["file"]["type"] == "image/gif") 
        || ($_FILES["file"]["type"] == "image/jpeg") 
        || ($_FILES["file"]["type"] == "image/jpg") 
        || ($_FILES["file"]["type"] == "image/pjpeg") 
        || ($_FILES["file"]["type"] == "image/x-png") 
        || ($_FILES["file"]["type"] == "image/png")) 
        && ($_FILES["file"]["size"] < 30000) 
        && in_array($extension, $allowedExts)) 
    {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } 
        else 
        {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 40000) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else { 
                $ev = new uploadImg();
                $imageDir = uniqid() . ".jpg";
                //  $directory = str_replace("\\", "\\", $imageDir); 
                $old = $_FILES["file"]["name"];
                echo $old;
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" .$old);
                rename("./upload/$old","./upload/$imageDir");
                $ev->newImg($coming, $people, $diet, "/upload/".$imageDir);
                // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
        }
    } else {
        echo "Invalid file";
    }
}
?>

    //$allowedExts = array("gif", "jpeg", "jpg", "png");
    //$temp = explode(".", $_FILES["image"]["name"]);
    //$extension = end($temp);
    //var_dump($_FILES["image"]["type"]);
    //if ((($_FILES["image"]["type"] == "image/gif") 
    //    || ($_FILES["image"]["type"] == "image/jpeg") 
    //    || ($_FILES["image"]["type"] == "image/jpg") 
    //    || ($_FILES["image"]["type"] == "image/pjpeg") 
    //    || ($_FILES["image"]["type"] == "image/x-png") 
    //    || ($_FILES["image"]["type"] == "image/png")) 
    //    && ($_FILES["image"]["size"] < 30000) 
    //    && in_array($extension, $allowedExts)) 
    //{
    //    if ($_FILES["image"]["error"] > 0) {
    //        echo "Return Code: " . $_FILES["image"]["error"] . "<br>";
    //    } 
    //    else 
    //    {
    //        echo "Upload: " . $_FILES["image"]["name"] . "<br>";
    //        echo "Type: " . $_FILES["image"]["type"] . "<br>";
    //        echo "Size: " . ($_FILES["image"]["size"] / 40000) . " kB<br>";
    //        echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br>";

    //        if (file_exists("upload/" . $_FILES["image"]["name"])) {
    //            echo $_FILES["image"]["name"] . " already exists. ";
    //        } else { 
    //            $ev = new uploadImg();
    //            $imageDir = uniqid() . ".jpg";
    //            //  $directory = str_replace("\\", "\\", $imageDir); 
    //            $old = $_FILES["image"]["name"];
    //            echo $old;
    //            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" .$old);
    //            rename("./upload/$old","./upload/$imageDir");
    //            $ev->newImg($coming, $people, $diet, "/upload/".$imageDir);
    //            // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    //        }
    //    }
    //} else {
    //    echo "Invalid file";
    //} 