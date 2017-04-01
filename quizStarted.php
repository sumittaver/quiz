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
		<!-- Breadcrumb -->
		<ol class="breadcrumb">
			<li><a href="home.php">Home</a></li>
			<li>Quiz</li>
		</ol>
	</div>
	<!-- Header end -->
	<!-- Container Start -->
	<div class="container_home container question col-xs-12 col-sm-8 col-md-8">





			<p>Welcome in Gamer World, enjoy the Quiz</p>
			<hr>
			<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php
					$res = mysql_query ( "select * from questions where category_id='$category' ORDER BY RAND()" ) or die ( mysql_error () );
					$rows = mysql_num_rows ( $res );
					$i = 1;
					while ( $result = mysql_fetch_array ( $res ) ) {
					?>
                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
					<p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question_name'];?></p>
					<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer1'];?>
                   <br /> <input type="radio" value="2"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer2'];?>
                    <br /> <input type="radio" value="3"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer3'];?>
                    <br /> <input type="radio" value="4"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer4'];?>
                    <br /> <input type="radio" checked='checked'
						style='display: none' value="5"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /> <br />
					<button id='next<?php echo $i;?>' class='next btn btn-success'
						type='button'>Next</button>
				</div>     

                     <?php }elseif($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
					<p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
					<input type="radio" value="1"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer1'];?>
                    <br /> <input type="radio" value="2"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer2'];?>
                    <br /> <input type="radio" value="3"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer3'];?>
                    <br /> <input type="radio" value="4"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer4'];?>
                    <br /> <input type="radio" checked='checked'
						style='display: none' value="5"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /> <br />
					<button id='pre<?php echo $i;?>' class='previous btn btn-success'
						type='button'>Previous</button>
					<button id='next<?php echo $i;?>' class='next btn btn-success'
						type='button'>Next</button>
				</div>

                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
					<p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
					<input type="radio" value="1"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer1'];?>
                    <br /> <input type="radio" value="2"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer2'];?>
                    <br /> <input type="radio" value="3"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer3'];?>
                    <br /> <input type="radio" value="4"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /><?php echo $result['answer4'];?>
                    <br /> <input type="radio" checked='checked'
						style='display: none' value="5"
						id='radio1_<?php echo $result['id'];?>'
						name='<?php echo $result['id'];?>' /> <br />

					<button id='pre<?php echo $i;?>' class='previous btn btn-success'
						type='button'>Previous</button>
					<button id='next<?php echo $i;?>' class='next btn btn-success'
						type='submit'>Finish</button>
				</div>
					<?php } $i++;} ?>

				</form>




	</div>
</body>
</html>