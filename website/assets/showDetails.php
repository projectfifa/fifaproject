<?php
class showDetails {

public function __construct($type, $listInput) {

	echo '<div class="showDetails">';
    switch ($type) {
    	case "team":

    	var_dump($type);
    	echo '<div class="detailsHeader"><div class="fontHeader">Details:</div></div>
    		  <div class="containerPadding"><div class="flexRow"><img src="../assets/img/pouls/'.$listInput['0']['id'].'.png" alt="Logo">
    		  <div class="fontp">'.$listInput['0']['team_name'].'</div></div>
    		  <div class="teamScore fontp">'.$listInput['0']['goals_with'].$listInput['0']['goals_against'].$listInput['0']['goal_difference'].'</div></div>
    		  <div class="detailsFooter fontS">'.$listInput['0']['created_at'].'</div>';


    		break;
    	
    	default:
    		echo "error";
    		break;
    }


    echo '</div>';
}
}