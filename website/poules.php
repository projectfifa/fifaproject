<?php 
session_start();
$_SESSION['page']="poules";
require(realpath(__DIR__) . '/templates/header.php'); 

?>

<?php require(realpath(__DIR__) . '/templates/footer.php');
