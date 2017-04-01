<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>
<?php include("includes/key.php"); ?>
<?php
// Check if session is not registered, redirect back to main page.
if (! $_SESSION ['authorised']) {
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
	<div class="head">
		<a href="index.php"><img src="images/logo-inner.png"
			alt="TaglineQuiz.com" width="100%" /></a> <span
			style="float: right; margin-right: 10px;">Wellcome <?php $username = $_SESSION['authorised']; echo $username; ?><a
			href="logout.php"> &nbsp;Logout</a></span>
		<!-- 	<ol class="breadcrumb"> -->
		<!-- 	  <li><a href="home.php">Home</a></li> -->
		<!-- 	  <li><a href="#">Library</a></li> -->
		<!-- 	  <li class="active">Data</li> -->
		<!-- 	</ol>	 -->
	</div>
	<!-- Header end -->

	<!-- Container Start -->
	<div class="container_home">
		<div class="panel panel-default">
			<div class="panel-body" style="background-color: #008f8f;">
				<h2>Choose the Quiz!</h2>
			</div>
		</div>
	<!-- Accordion Start -->	
	<div class="panel-group" id="accordion">
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="glyphicon glyphicon-triangle-right">&nbsp;Gernal Knowledge</a>
      </h4>
    </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        	<ul class="list-group">
        		<?php gk_lvl(); ?>
  			</ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="glyphicon glyphicon-triangle-right">&nbsp;Logo Quiz</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
        	<ul class="list-group">
  				<?php gk_lvl(); ?>
			</ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="glyphicon glyphicon-triangle-right">&nbsp;Computer Science</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<ul class="list-group">
				<?php gk_lvl(); ?>
			</ul>
        </div>
      </div>
    </div>
  </div>

	</div>
	<!-- Container End -->
	<div>
		<!-- Footer start -->
		<div class="signature">
			<p>
				Copyright &#169;2015<br />Develop & design by <a
					href="http://facebook.com/sumittaver">Sumit Taver</a>
			</p>
		</div>
		<!-- Footer End -->
	</div>
</body>
</html>