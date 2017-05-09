<?php 
session_start();
$_SESSION['page']="teams";
require(realpath(__DIR__) . '/templates/header.php'); 

?>

<?php require(realpath(__DIR__) . '/templates/footer.php');
