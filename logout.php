<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<?php ini_set('display_startup_errors', TRUE); ?>
<?php
include("includes/key.php");
// remove all session variables
session_destroy();

header("location: index.php");
?>