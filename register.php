<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>

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
        <a href="index.php"><img src="images/logo.png" alt="TaglineQuiz.com" width="100%" /></a>
        <!--<h1>Tagline Quiz</h1><sma>Some tagline goes here..</sma>-->
    </div>
    
    <div>
        <form action="function/function.php" method="post">
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" class="input-lg col-lg-1 green-border form-control round-b-r round-t-r background-none" id="usr" onkeyup="status_u();" placeholder="Enter User Name" name="id" required pattern="[a-zA-Z0-9]{5,}" title="* Minimum five letters required! \n * Special charecter not allowed!" autocomplete="off"/>
                <br /><br />
            </div>
            <span id="status_u" style="margin: auto;color:red;"></span>
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
                <input type="text" class="input-lg col-lg-1 green-border form-control round-b-r round-t-r background-none" id="mail" onkeyup="status_e();" placeholder="Enter E-mail ID" name="email" required pattern="(.*)\@(.*)\.(\d|\w)+" title="* Email is not valid!"  autocomplete="off"/>
                <br /><br />
            </div>
            <span id="status_e" style="margin: auto;color:red;"></span>
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" class="input-lg col-lg-1 green-border form-control  round-b-r round-t-r background-none" id="pwd" placeholder="Enter Password" name="pass" required pattern="[a-zA-Z0-9]{5,}" title="* Minimum five letters required! \n * Special charecter not allowed!" onkeyup="pass_chk();return false;" autocomplete="off" />
                <br />
            </div>
            <div class="input-group input-group-lg margin-10">
                <span class="input-group-addon green border-none">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" class="input-lg col-lg-1 green-border form-control  round-b-r round-t-r background-none" id="pwd_c" placeholder="Confirm Password" name="pass_c" required  onkeyup="pass_chk();return false;" autocomplete="off" />
                <br />
            </div>
            <span id="paschk" style="margin: auto;display: none;color:red;">Password dosen't match!!</span>
            <div >
              <button type="submit" class="btn btn-primary btn-lg border-none btn-default btn-block green whitesmoke" id="ac_c"  name="new_member">Create Account</button>
              <!--<button type="button" class="btn btn-primary btn-lg border-none btn-default btn-block green whitesmoke" onclick="history.go(-1);">Back</button>-->
              <button type="button" class="btn btn-primary btn-lg border-none btn-default btn-block green whitesmoke" onclick="location.href='http://gamerworld.xyz/index.php';">Back</button>
            </div>
            
        </form>
        
    </div>
    <div class="signature">
        <p>Copyright &#169;2017<br />Develop & design by <a href="http://facebook.com/sumittaver" >Sumit Taver</a></p>
    </div>
</div>
    
<script>
<!--Checking username and password-->
function status_u(){
            $("#status_u").html('<img src="images/Preloader_1.gif" align="absmiddle">&nbsp;Checking availability...');
            var n_user = $("#usr").val();
            $.post("valid.php",{newName:n_user},function (data){
            $("#status_u").html(data);
            });
        
}

function status_e(){
            $("#status_e").html('<img src="images/Preloader_1.gif" align="absmiddle">&nbsp;Checking availability...');
            var n_mail = $("#mail").val();
            $.post("valid.php",{newEmail:n_mail},function (data){
            $("#status_e").html(data);
            });
        }  
<!--Password match-->
function pass_chk(){
    var pas1 = $("#pwd").val();
    var pas2 = $("#pwd_c").val();
    if (pas1 == pas2){
        $("#paschk").css("display","none");
        //$("#ac_c").css("display","none");
    }
    else{
        $("#paschk").css("display","table");
    }
}
</script>
</body>
</html>