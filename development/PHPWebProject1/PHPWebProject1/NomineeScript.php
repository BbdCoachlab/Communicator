<?php
function addNominee($User_id_user, $category){
    
    //connecting to the server and database
    $serverName = '(localdb)\Projects';
    $connOptions = array('AttachDBFileName'=>'C:\Users\Bandile\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf','Database'=>'CommunicatorDB');
    $conn = sqlsrv_connect($serverName, $connOptions);
    if ($conn === false){
        die("Connection to Database failed: Make sure the server and database addresses are correct");
    }
    
    //Inserting a nominee into the database
    $insertQuery = "INSERT INTO Nominee (User_id_user,".$category.") VALUES ('".$User_id_user."',1);";
    $insertStatement = sqlsrv_query($conn,$insertQuery);
    if($insertStatement===false){
        echo "Nominee insertion failed";
        die(print_r(sqlsrv_errors(), true));
    }
    
    //free statement and close connection
    sqlsrv_free_stmt($insertStatement);
    sqlsrv_close($conn);
}
//return nominee values
//return category leaders
//return top range
?>