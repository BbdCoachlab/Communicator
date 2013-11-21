<?php
//connecting to the server and database
function connectToDB(){
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Amazing\AppData\Local\Microsoft\VisualStudio\SSDT\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $con = sqlsrv_connect($serverName, $connOptions);
    if ($con === false){
    $host = '88d0517d-ff44-411e-ad58-a2770062be1f.mysql.sequelizer.com';
	$username = 'pvlvyljdbbigeubw';
	$password = 'zcMLLzKGuoRvAKhPTSsRtHa7JG4ZiA5CqL6PbEPko2DTTbQz5LDADtGZbNbeDSy3';
	$dbname = 'db88d0517dff44411ead58a2770062be1f';
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (mysqli_connect_errno($con)){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    return $con;

}
?>