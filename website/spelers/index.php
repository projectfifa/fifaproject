<?php 
// ------------------------------------ STARTUP

session_start();
$_SESSION['page']="players"; 
require('../assets/dbconnect.php');
require('../assets/showList.php');
require('../assets/header.php');

// ------------------------------------ Target page

if (isset($_GET['pageId'])) {
    // -------------------------------- Targeted
    echo '<div class="errorlog">Targeted</div>';
    

    
} else { 
    // -------------------------------- Index
    echo '<div class="errorlog">index</div>';

}
require('../assets/footer.php');