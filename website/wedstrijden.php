<?php 
session_start();
$_SESSION['page']="games";
require(realpath(__DIR__) . '/templates/header.php'); 

?>

    

<?php require(realpath(__DIR__) . '/templates/footer.php');
