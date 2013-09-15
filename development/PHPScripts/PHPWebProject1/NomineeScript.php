<?php
function addNominee($User_id_user, $category){
    
    //connecting to the server and database
    $conn = connectToDB();
    //Inserting a nominee into the database
    $insertQuery = "INSERT INTO Nominee (User_id_user, ?) 
                    VALUES (?,1);";
    $insertStatement = sqlsrv_query($conn,$insertQuery, array($category, $User_id_user));
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
?>