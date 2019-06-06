<?php
// Credit to wfmn17 for the original code and to Bart for the fixed solution
// https://stackoverflow.com/questions/16511334/php-login-registration-data-stored-in-txt
if(isset($_POST["username"]) && isset($_POST["password"])){
    $file = fopen('login.txt', 'r');
    $loginOK=false;
    $newAcc=true;
    while(!feof($file)){
        $line = fgets($file);
        //echo "{$user}, {$pass}";
        list($user, $pass) = explode(':', $line);
        if(trim($user) == $_POST['username']){
            $newAcc=false;
            if(trim($pass) == $_POST['password']){
                $loginOK=true;
                break;
            }
        }
    }

    fclose($file);


session_start();

    // create new account, go the page
    if($newAcc){
        $file = fopen('login.txt', 'a');
        fwrite($file, "\n{$_POST["username"]}:{$_POST["password"]}");
        fclose($file);
        $name = $_POST['username'];
        $_SESSION["user"]=$name;
        unset($_SESSION['message']);
        header('Location: newAccount.php'); 
    // sign in with good account
    } else if($loginOK){
        $name = $_POST['username'];
        $_SESSION["user"]=$name;
        unset($_SESSION['message']);
        header('Location: a4q3.php');
    // new session for display error message
    }else{
        $_SESSION['message'] = "invalid login";
        header('Location: login.php'); 
    }
    
    
} else {
    include 'login.php';
}
?>