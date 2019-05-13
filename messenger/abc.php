<?php
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
	}



	if(($_GET["message"])) {
		if(!mysql_connect("localhost","kkmeena","kkmeena"))
		    {
		        die("could not connect".mysql_error());
		    }
		    mysql_select_db("canteen",mysql_connect("localhost","kkmeena","kkmeena"));

		$query="insert into message "; //query to find result of chtting between user and me


		$result=mysql_query($query,mysql_connect("localhost","kkmeena","kkmeena")) or die(mysql_error());
		header("loation:login.php?name=")
	}
?>