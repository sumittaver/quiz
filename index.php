<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>
<?php 
session_start();
if (isset($_SESSION['authorised'])){
		echo "<script>window.open('home.php','_self');</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--head.php is head tag code-->
<?php include("includes/head.php"); ?> 
</head>

<body>
<div class="se-pre-con"></div>
    
<div class="container">

    <div style="padding: 10px 0px 20px 0px;">
        <a href="index.php"><img src="images/logo.png" alt="gamerworld.xyz" width="100%" /></a>
    </div>
    
    <div>
        <form action="function/function.php" method="post" enctype="multipart/form-data">
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" class="input-lg col-lg-1 green-border form-control round-b-r round-t-r background-none" id="usr" placeholder="Enter User Name" name="id" required autofocus />
                <br /><br />
            </div>
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-credit-card"></span>
                </span>
                <input type="password" class="input-lg col-lg-1 green-border form-control  round-b-r round-t-r background-none" id="pwd" placeholder="Enter Password" name="pass" required />
                <br /><br />
            </div>
            <div>
                <input type="submit" class="btn-lg border-none btn-default btn-block green whitesmoke" value="Login" name="usrlogin" />
                <a href="register.php" class="btn-block"><input type="button"  class="btn-lg btn-default  border-none btn-block green whitesmoke" value="Create Account" name="" /></a>
                <a href="register.php" class="btn-block"><input type="button" class="btn-lg border-none btn-default btn-block green whitesmoke" value="Play Without Login!" name="guest" /></a><br>
                <a href="#" class=""><b>Forgot Password</b></a>
                <!--<label style="float:right;"><input type="checkbox"> Remember me</label>-->
            </div>
        </form>
        
    </div>
    <div class="signature">
        <p>Copyright &#169;2015<br />Develop & design by <a href="http://facebook.com/sumittaver" >Sumit Taver</a></p>
    </div>
</div>
</body>
</html>