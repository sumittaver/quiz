<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>
<?php include("includes/key.php"); ?>
<?php
// Check if session is not registered, redirect back to main page.
if (!$_SESSION['authorised']){
		echo "<script>alert('Session Expired please login again.');window.open('index.php','_self');</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--head.php is head tag code-->
<?php include("includes/head.php"); ?>
<?php include("function/function.php"); ?>  
</head>
<body>
<div class="se-pre-con"></div>
    
<!-- Header Start -->
<div class="head" >
    <a href="index.php"><img src="images/logo-inner.png" alt="TaglineQuiz.com" width="100%" /></a>
    <span style="float:right;margin-right: 10px;">Wellcome <?php $username = $_SESSION['authorised']; echo $username; ?><a href="logout.php"> &nbsp;Logout</a></span> 
<!-- Breadcrumb -->
	<ol class="breadcrumb">
	  <li><a href="home.php">Home</a></li>
	  <li>Quiz</li>
	</ol>
</div>
<!-- Header end -->
<!-- Container Start -->
<div class="container_home">
	<?php
		$right_answer=0;
		$wrong_answer=0;
		$unanswered=0;
	
		$keys=array_keys($_POST);
		$order=join(",",$keys);
		global $con;
		$response=mysqli_query($con,"select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysqli_error());
	
		while($result=mysqli_fetch_array($response)){
			if($result['answer']==$_POST[$result['id']]){
				$right_answer++;
			}else if($_POST[$result['id']]==5){
				$unanswered++;
			}
			else{
				$wrong_answer++;
			}
		}
		$name=$_SESSION['authorised'];
		mysqli_query($con,"update user set score='$right_answer' where na='$name'");
	?>		
			<div class="panel panel-default col-xs-12 col-sm-3 col-lg-3">
			  <div class="panel-heading" style="margin-top: 17px;">
			    <h3 class="panel-title"><center>Quiz Result!</center></h3>
			  </div>
			  <div class="panel-body">
			    <ul class="list-group">
				  <li class="list-group-item"><span class="badge" style="padding: 3px 15px;font-size: 20px;"><?php echo $right_answer;?></span>Total no. of right answers : </li>
				  <li class="list-group-item"><span class="badge" style="padding: 3px 15px;font-size: 20px;"><?php echo $wrong_answer;?></span>Total no. of wrong answers : </li>
				  <li class="list-group-item"><span class="badge" style="padding: 3px 15px;font-size: 20px;"><?php echo $unanswered;?></span>Total no. of Unanswered Questions : </li>
				</ul>
			  </div>
			</div>
		<a href="<?php echo BASE_PATH;?>" class='btn btn-success'>Start new Quiz!!!</a>  

</div>
</body>
</html>