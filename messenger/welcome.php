<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
 
    // ognin starts here

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



if(!mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi"))
    {
        die("could not connect".mysql_error());
    }
    mysql_select_db("5fT23ZsLmB",mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi"));

$query="SELECT username FROM users";
$result=mysql_query($query,mysql_connect("remotemysql.com","5fT23ZsLmB","236O3mdWvi")) or die(mysql_error());
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
<!--     </div> -->
<!--     <p>
 -->        <!-- <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> -->
<!--     </p> -->
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h1>connected people</h1>
        </div>
        <div class="col-sm-4">
            <h1>all contect</h1>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>Username</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                  while($rows=mysql_fetch_assoc($result)){
                ?> 
                  <tr>  
                  	<?php
                  	if(!($rows['username'] == htmlspecialchars($_SESSION["username"]) )) {


                  	?>
                    <td><a href="chat.php?name=<?php echo $rows['username']; ?>"><?php echo $rows['username']; ?></a>
                    </td>
                    <?php
                    } 
                    ?>
                  </tr>
                  <?php
                    }
                  ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>