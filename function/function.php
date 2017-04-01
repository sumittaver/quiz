<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>
<?php
session_start();
//include("../includes/key.php"); 

//================== Database Connection====================

$host="localhost"; // Host name 
$dbUser ="root"; // user name
$dbPass ="root"; // password
$db_name="gamerworld"; // Database name 
define('BASE_PATH','http://localhost:8888/index.php');

//define('BASE_PATH','http://quiz360.tk/');
// $host="mysql.hostinger.in"; // Host name
// $dbUser ="u605645769_quiz"; // user name
// $dbPass ="logical"; // password
// $db_name="u605645769_quiz"; // Database name

$con = mysqli_connect("$host","$dbUser","$dbPass","$db_name");

if (isset($_POST['usrlogin'])){
    $name = $_POST['id'];
    $pass = $_POST['pass'];
    global $con;
    $query = mysqli_query($con,"select * from user where na='$name' and pa='$pass'");
    if (mysqli_num_rows($query)>0){
        $_SESSION['authorised'] = $name;
        //echo "variable value ".$name; echo "| session value ".$_SESSION["authorised"];
        echo "<script>alert('Wellcome back $name'); window.open('../home.php','_self');</script>";
    }else{
        echo "<script>alert('User name or Password is wrong.');window.open('../index.php','_self');</script>";
    }
}

if (isset($_POST['new_member'])){
    $username = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    global $con;
    $query = mysqli_query ($con,"insert into user (na,em,pa) values ('$username','$email','$password')") or die("Unable to create Account!!");
    if (mysqli_num_rows($query)>0){
        echo "<script>alert('Account created successfully, Please login now.'); window.open('../index.php','_self');</script>";
    }
    else{
        echo "Details are not valid.";
    }
}

function gk_lvl(){
 	global $con;
 	$query = mysqli_query($con, "select * from categories") or die("Unable fetch data!");
 	while ($tabledata = mysqli_fetch_array($query)){
 		$catid = $tabledata['id'];
 		$cat = $tabledata['category_name'];
 		echo "<a href='quizhome.php?category=".$catid."'><li class='list-group-item glyphicon glyphicon-triangle-right' id='".$catid."' name='".$catid."'>".$cat."</li></a>";
 	}
 }
 ?>