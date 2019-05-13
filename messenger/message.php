<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
 
    // ognin starts here

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if(!mysql_connect("localhost","kkmeena","kkmeena"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("canteen",mysql_connect("localhost","kkmeena","kkmeena"));


   // echo htmlspecialchars($_SESSION["username"]);


    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty

	    if(empty(trim($_POST["kk"]))){
	        $username_err = "Please enter username.";
	    } else{
	        $otheruser = trim($_POST["kk"]);
	        echo $otheruser;
	        $kk=htmlspecialchars($_SESSION["username"])
	    }
	}

?>