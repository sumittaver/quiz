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
	<div class="container_home container questfont question col-xs-12 col-sm-8 col-md-8">
	<?php $catid = $_GET["category"];?>
			<p style="font-size: 22px;">Welcome in Gamer World, enjoy the Quiz</p>
			<hr>

		<form  style="font-size: 20px;" class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php
					global $con;
					$res = mysqli_query ($con,"select * from questions where category_id='$catid' ORDER BY RAND() LIMIT 10") or die ( mysqli_error () );
					$rows = mysqli_num_rows ( $res );
					$progress = "";
					$i = 1;
					while ( $result = mysqli_fetch_array ( $res ) ) {
					if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    
                    	<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%; ">
							<span class="sr-only"><?php echo $progress; ?>% Complete</span>
							</div>
						</div>
                    
					<p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.&nbsp;<?php echo $result['question_name'];?></p>
						
					<table class="table table-bordered">
					<tbody>
					    <tr>
					      <th scope="row">(A).</th>
					      <td><?php echo $result['answer1'];?></td>
					      <td><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>'name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(B).</th>
					      <td><?php echo $result['answer2'];?></td>
					      <td><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(C).</th>
					      <td><?php echo $result['answer3'];?></td>
					      <td><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(D).</th>
					      <td><?php echo $result['answer4'];?></td>
					      <td><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					  </tbody>
					</table>
				<input type="radio" checked='checked' style='display: none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' />		
						
					<nav aria-label="...">
					  <ul id='next<?php echo $i;?>' class="pager">
					    <li id='next<?php echo $i;?>' class='next'><a href="#">Next</a></li>
					  </ul>
					</nav>					
				</div>     

                <?php }elseif($i<1 || $i<$rows){?>

                <div id='question<?php echo $i;?>' class='cont'>
                       
                       	<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%;">
							<span class="sr-only"><?php echo $progress; ?>% Complete</span>
							</div>
						</div>
                       
					<p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.&nbsp;<?php echo $result['question_name'];?></p>

					<table class="table table-bordered">
					<tbody>
					    <tr>
					      <th scope="row">(A).</th>
					      <td><?php echo $result['answer1'];?></td>
					      <td><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>'name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(B).</th>
					      <td><?php echo $result['answer2'];?></td>
					      <td><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(C).</th>
					      <td><?php echo $result['answer3'];?></td>
					      <td><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(D).</th>
					      <td><?php echo $result['answer4'];?></td>
					      <td><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					  </tbody>
					</table>
				<input type="radio" checked='checked' style='display: none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' />
						
					<nav aria-label="...">
					  <ul class="pager">
					    <li id='pre<?php echo $i;?>' class='previous'><a href="#">Previous</a></li>
					    <li id='next<?php echo $i;?>' class='next'><a href="#">Next</a></li>
					  </ul>
					</nav>						
				</div>

                <?php }elseif($i==$rows){?>
                <div id='question<?php echo $i;?>' class='cont'>
                    
                       	<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%;">
							<span class="sr-only"><?php echo $progress; ?>% Complete</span>
							</div>
						</div>
                    
					<p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.&nbsp;<?php echo $result['question_name'];?></p>

					<table class="table table-bordered">
					<tbody>
					    <tr>
					      <th scope="row">(A).</th>
					      <td><?php echo $result['answer1'];?></td>
					      <td><input type="radio" value="1" id='radio1_<?php echo $result['id'];?>'name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(B).</th>
					      <td><?php echo $result['answer2'];?></td>
					      <td><input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(C).</th>
					      <td><?php echo $result['answer3'];?></td>
					      <td><input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					    <tr>
					      <th scope="row">(D).</th>
					      <td><?php echo $result['answer4'];?></td>
					      <td><input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' /></td>
					    </tr>
					  </tbody>
					</table>
				<input type="radio" checked='checked' style='display: none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>' />

					<nav aria-label="...">
					  <ul class="pager">
					    <li id='pre<?php echo $i;?>' class='previous'><a href="#">Previous</a></li>
					    <li onclick="login.submit();" id='next<?php echo $i;?>' class='next'><a href="#">Finish</a></li>
					  </ul>
					</nav>
				</div>
					<?php } 
					$i++;
					$progress = $i*10;
					} ?>

			</form>
	</div>
	
<?php
if(isset($_POST[1])){
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }

   }
   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
?>	
<!-- Next and Previous button functionality -->
<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');
		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });
		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });
</script>
</body>
</html>