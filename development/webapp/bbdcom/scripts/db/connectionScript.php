<?php
//connecting to the server and database
function connectToDB(){
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Amazing\AppData\Local\Microsoft\VisualStudio\SSDT\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $con = sqlsrv_connect($serverName, $connOptions);
    if ($con === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    return $con;

}
?>