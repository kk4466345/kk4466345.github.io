<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
 
    // ognin starts here

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(!($_GET['name'])) {
	header("location: welcome.php");
	exit;
} else {
	$username=$_GET[name];
	$me= htmlspecialchars($_SESSION["username"]); 




if(!mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("5fT23ZsLmB",mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi"));

$query="SELECT message,sender,created_at FROM message where (sender='$me' and resiver='$username') or (sender='$username' and resiver='$me') order by created_at"; //query to find result of chtting between user and me
$result=mysql_query($query,mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi")) or die(mysql_error());


if($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$m=$_POST['message'];
	if(!($m == "")) {
		$q="insert into message (sender,resiver,message) values ('$me','$username','$m')";
		mysql_select_db("canteen"); 
		$r=mysql_query($q,mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi")) or die(mysql_error());
	}

}


}
// $query2=select
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>messenger</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }

		.footer {
		   position: fixed;
		   bottom: 40px;
		   width: 100%;
/*		   background-color: ;*/
		 /*  color: white;*/
		 height: 10px;
		   text-align: center;
		}

    </style>
</head>
<body>

    <!-- <div class="page-header"> -->
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-10"><h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1></div>
                <div class="col-md-2">
                     <div class="row">
                        <div class="col-6">
                            <div class="sidebar-content"> <a href="reset-password.php" class="btn btn-warning">Reset Password</a></div>
                        </div>
                        <div class="col-6">
                            <div class="sidebar-content"> <a href="logout.php" class="btn btn-danger">Sign Out</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>   
       	<p>
  <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>chat</h1>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>chating</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                  while($rows=mysql_fetch_assoc($result)){
                ?> 
                  <tr>
                    <td><?php echo $rows['sender']; ?><?php echo ":"; ?><?php echo $rows['message']; ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="footer">
  <form method="POST" style="background-color: blue;">
  <input style="width:80%; height: 50px;" type="text" name="message" placeholder="write your message here">
  <input type="submit" name="submit" value="Send">
</form> 
</div>
</div>
  		
</body>
</html>