<?php

$coming = $_POST['come'];
$people = $_POST['number'];
$diet = $_POST['diet'];
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 30000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
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

class uploadImg {

    public function newImg($coming, $people, $diet, $directory) {
        require_once 'connectDB.php';
        // connecting to database
        $this->db = new DB_Connect();
        $conn = $this->db->connect();
        $sql = "INSERT INTO test(two,three,four,five)VALUES('" . $coming . "','" . $people . "','" . $diet . "','" . $directory . "')";
        $query = mysql_query($sql, $conn);
        if (!$query) {
            die('falied uploading pic and writing to the database' . mysql_error());
        } else {
            echo 'success';
        }
    }

}

?>