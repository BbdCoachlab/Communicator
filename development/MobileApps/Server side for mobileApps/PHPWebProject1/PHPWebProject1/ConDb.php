<?php

class conectDB
{
    /* Specify the server and connection string attributes. */
   
    public  function Opencon()
    {
        $serverName = '(localdb)\Projects';
        $connectionInfo = array('AttachDBFileName'=>'C:\Users\bbdnet1176\AppData\Local\Microsoft\VisualStudio\SSDT\v11.0\CommunicatorDB\CommunicatorDB.mdf', 'Database'=>'CommunicatorDB');

        /* Connect using Windows Authentication. */
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        if(!$conn)
        {
            echo "Unable to connect.</br>";
            die( print_r( sqlsrv_errors(), true));
        }
       // echo("Connected!");
        return $conn;
    }
}

?>