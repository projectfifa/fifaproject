<?php 
session_start();
$_SESSION['page']="players";
require(realpath(__DIR__) . '/templates/header.php'); 
require('dbconnect.php');
require('showList.php');
?>

        <div class="showListHeader"> Title </div>
        <div class="showListContent">
            <div class="row-list-columnheader">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
            <div class="row-list">
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
                <div> item1 </div>
                <div> item2 </div>
                <div> item3 </div>
            </div>
        </div>
        <div class="showListFooter"></div>
<?php



?>

<?php require(realpath(__DIR__) . '/templates/footer.php');
