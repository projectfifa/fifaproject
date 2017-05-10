<?php 
session_start();
$_SESSION['page']="index";
require('showList.php');
require(realpath(__DIR__) . '/templates/header.php');



    //$showList = new showList("test", $geefmee);
    require(realpath(__DIR__) . '/templates/footer.php');
?>
