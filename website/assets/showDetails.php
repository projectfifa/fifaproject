<?php
class showDetails {

    public function __construct($type, $listInput) {
    
        $arrayKeys = array_keys($listInput[0]);

        switch ($type) {
            
            case "players":
                $colorClass = "playersClr";
                break;
            case "team":
                $colorClass = "teamsClr";
                break;
            case "poules":
                $colorClass = "poulsClr";
                break;

            default:
                $colorClass = "poulesClr";
                break;
        }


    	echo '<div class="showDetails '.$colorClass.'">';

        switch ($type) {
            case "poules":
    
echo           '<div class="detailsHeader">
                    <div>Details:</div>
                </div>
                <div class="detailsContent">
                    <div class="flexRowCenter">
                        <svg width="80" height="80" data-jdenticon-hash="'.hash("md5", $listInput['0']['poule_name'] * 5).'"></svg>
                        <div class="flexCol">
                            <div class="fontHeader">'.$listInput['0'][$arrayKeys[1]].'</div> 
                        </div>                      
                    </div>
                </div>
                <div class="detailsFooter fontS">'.$listInput['0']['created_at'].'</div>';

                break;


            case "players":
    
echo           '<div class="detailsHeader">
                    <div>Details:</div>
                </div>
                <div class="detailsContent">
                    <div class="flexRowCenter">
                        <svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $listInput['0']['student_id']).'"></svg>
                        <div class="flexCol">
                            <div class="fontHeader">'.$listInput['0'][$arrayKeys[1]].'</div>
                            <div class="fontHeader">'.$listInput['0'][$arrayKeys[2]].'</div>  
                        </div>                      
                    </div>

                    <div class="flexCol detailsList">
                        <div class="flexRowCenter fontp">Goals pouls: '.$listInput['0']['goals_poules'].'</div>
                        <div class="flexRowCenter fontp">Goals total: '.$listInput['0']['goals_total'].'</div>
                    </div>
                </div>
                <div class="detailsFooter fontS">'.$listInput['0']['created_at'].'</div>';
    
    
                break;

        	case "team":
    
          echo '<div class="detailsHeader">
                    <div>Details:</div>
                </div>
        		<div class="detailsContent">
                    <div class="flexRowCenter">
                        <svg width="50" height="50" data-jdenticon-hash="'.hash("md5", $listInput['0']['team_name']).'"></svg>
        		        <div class="fontHeader">'.$listInput['0'][$arrayKeys[2]].'</div>                        
                    </div>

                    <div class="flexCol detailsList">
        		        <div class="flexRowCenter fontp">
                            <div>'.$listInput['0']['goals_with'].'</div>
                            <div>/</div>
                            <div>'.$listInput['0']['goals_against'].'</div>
                        </div>
                        <div class="flexRowCenter fontp">'.$listInput['0']['goal_difference'].'</div>
                    </div>
                </div>
        		<div class="detailsFooter fontS">'.$listInput['0']['created_at'].'</div>';
    
    
        		break;
        	
        	default:
        		echo "error";
        		break;
        }
    
    
        echo '</div>';
    }
}