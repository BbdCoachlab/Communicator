<?php
// This code checks for user login and perform action according to user information if provided.
    require('db/connectionScript.php');
    require('db/UserScript.php');
    require('db/NotificationScript.php');
    require('db/DepartmentScript.php');
    require('db/NomineeScript.php');
    require('db/Note_DepartmentScript.php');
    require('db/Department_UserScript.php');
    require('db/Department_Note_UserScript.php');
try {
    session_start();
    if (isset($_GET['error'])) {
        //if we have an error we redirect to index page
        $_SESSION['login_message']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Login error:</strong> Please try again.'
                                    .'</div>';
        header('Location: /bbdcom/index.php');
       
    }

    if (!isset($_GET['code'])) {
        //if yammer did not give a response code
        $_SESSION['login_message']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Login error:</strong> No response from yammer. Please try again.'
                                    .'</div>';
        header('Location: /bbdcom/index.php');
    }

//now we get the users information
    $code = $_GET['code'];
    $url = "https://www.yammer.com/oauth2/access_token.json?client_id=nEjhbfN94g3w2nAYczxEw&client_secret=lRzKMLwXRtQWvVik4wp7TxwTsqWsLvxD8dEIsT1xryU&code=$code";
    $ch = curl_init();

    /*     * FOR WITS PROXY* */   
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'students\450623:cns.2013');
      curl_setopt($ch, CURLOPT_PROXY, 'proxyss.wits.ac.za');
      curl_setopt($ch, CURLOPT_PROXYPORT, 80);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 

    /*     * NO PROXY FOR BBD WIFI* */
   
    //curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);     
     

    $result = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($result, true);

//extract user information
    $name = $json["user"]["first_name"];
    $surname = $json["user"]["last_name"];
    $dob = $json["user"]["birth_date"];
    $email = $json["user"]["contact"]["email_addresses"][0]["address"];
    $department = $json["user"]["department"];
    $user_id = $json["access_token"]["user_id"];
    $image = $json["user"]["mugshot_url"];
    $network = strtolower($json["network"]["name"]);

//check if the user is in the bbd network
    if (strcmp($network, "bbd.co.za") != 0) {
        $_SESSION['login_message']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Login failed:</strong> You are not authorised to use this tool.'
                                    .'</div>';
        header('Location: /bbdcom/index.php');
    }

    $is_hr = strcasecmp(strtolower($department), "hr");
//check is the user is in the hr or coms department
    if ($is_hr != 0) {
         $_SESSION['login_message']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Login failed:</strong> You are not authorised to use this tool.'
                                    .'</div>';
        header('Location: /bbdcom/index.php');        
    }
    
    $_SESSION['logged_in'] = true;
    
    $isUser = isUser($user_id);
    if($isUser){
        //update the user
        echo "is user";
    }else{
        //add user
        $returned = addUser($user_id, $name, $surname, $email, $image, $dob, $department);
        //echo $returned;
    }
    header('Location: /bbdcom/dashboard.php');
   /*echo "Name: $name<br>";
    echo "Surname: $surname<br>";
    echo "Email: $email<br>";
    echo "Birth date: $dob<br>";
    echo "Department: $department<br>";
    echo "User ID: $user_id<br>";
    echo "Image: $image";*/
    
    
} catch (Exception $e){
    $_SESSION['login_message']='<div class="alert alert-dismissable alert-danger">'
                                    .'<button id="test" type="button" class="close" data-dismiss="alert">&times;</button>'
                                    .'<strong>Login error:</strong> Please try again.'
                                    .'</div>';
    header('Location: /bbdcom/index.php');   
}
?>
