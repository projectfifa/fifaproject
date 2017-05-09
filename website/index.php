<?php 
session_start();
$_SESSION['page']="index";
require(realpath(__DIR__) . '/templates/header.php'); 

?>
    require('showList.php');





    // ------------ VOORBEELD (gaat nog weg)
?> 
        <div class="showListHeader">Teams:</div>
        <div class="showListContent">
            <div class="row-list">a1</div>
            <div class="row-list">b2</div>
            <div class="row-list">c3</div>
            <div class="row-list">a4</div>
        </div>
        <div class="showListFooter"></div>
<?php






    $geefmee = array('1' => "a", '2' => "b");

    $showList = new showList("test", $geefmee);
    require(realpath(__DIR__) . '/templates/footer.php');
?>
