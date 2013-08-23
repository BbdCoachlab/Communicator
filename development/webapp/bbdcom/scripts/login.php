<?php
if (isset($_GET['error'])) {
    //if we have an error we redirect to index page
    header('Location: /bbdcom/index.php');
} 
else {
    //check if yammer sent a rsponse code
    if (isset($_GET['code'])) {                        
        /* This code is used only if you are uing a proxy server
        
        $proxy = 'bbdnet.bbd.co.za';
        $port = '8080';
        $user = 'bbdnet\bbdnet1175'; 
        $password = 'eureka7';
        $auth = "$user:$password";
                   
        $my_context = array(
            'http' => array(
                'proxy' => "tcp://$proxy:$port",  
                'request_fulluri' => true,
                'header' => "Proxy-Authorization: Basic $auth"
            )
        );        
        stream_context_set_default($my_context);
        */
        
        //retrieve json data from yammer
        $code = $_GET['code'];
        $response = file_get_contents("https://www.yammer.com/oauth2/access_token.json?client_id=nEjhbfN94g3w2nAYczxEw&client_secret=lRzKMLwXRtQWvVik4wp7TxwTsqWsLvxD8dEIsT1xryU&code=$code");        
        $json = json_decode($response,true);
        
        //extract user information
        $name = $json["user"]["first_name"];
        $surname = $json["user"]["last_name"];
        $dob = $json["user"]["birth_date"];
        $department = $json["user"]["department"];        
        $image = $json["user"]["mugshot_url"];
        
        echo "Name: $name<br>";
        echo "surname: $surname<br>";
        echo "Birth date: $dob<br>";
        echo "Department: $department<br>";       
        echo "Image: $image";
    }
    else{
        //if yammer does not respond we redirect to index page.
        header('Location: /bbdcom/index.php'); 
    }
}
?>
