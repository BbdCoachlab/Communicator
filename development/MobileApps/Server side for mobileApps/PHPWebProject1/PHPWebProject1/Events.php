<?php
// Get events from database
$even = new Events();
$even ->event();

class Events
{

public function event()
{

    $db = new conectDB();
    $con =  $db->Opencon();
    // echo("one");
    // events table is still to be added to the database.
    $EventsQuery = "SELECT * FROM dbo.events;";
    $result = sqlsrv_query($con, $EventsQuery);
    
    if(!$result)
    {
        echo("Query failed");
    }
    else
    {
        // echo("ok");
        while($note = sqlsrv_fetch_array($result))
        {
            
            $json = json_encode($note);
            echo($json);
            //  $json = json_encode($result);
            //echo($result."Itumeleneng");
            
        }
    }
    sqlsrv_close($con);


}
}

?>