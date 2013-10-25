<?php
//connecting to the server and database
function connectToDB(){
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $con = sqlsrv_connect($serverName, $connOptions);
    if ($con === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    return $con;

}
?>