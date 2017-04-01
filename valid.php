<?php include("function/function.php"); ?> 
<?php
if(isset($_POST['newName'])){
    global $con;
    $name = $_POST['newName'];
    $sql = mysqli_query($con,"select * from user where na='$name'") or die("Failed");
    if(mysqli_num_rows($sql) >0){
        echo '<div style="color:red;">This user name already taken!</div>';
    }
    
}

if(isset($_POST['newEmail'])){
    global $con;
    $email = $_POST['newEmail'];
    $sql = mysqli_query($con,"select * from user where em='$email'") or die("Failed");
    if(mysqli_num_rows($sql) >0){
        echo '<div style="color:red;">This email is already registered!</div>';
    }
    else
    {
    echo '<div style="color:green;">This email is Available..</div>';
    }
}
?>