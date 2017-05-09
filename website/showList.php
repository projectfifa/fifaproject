<?php
class showList {

	public function __construct($nameInput, $listInput) {
		$header = $nameInput;
		$list = $listInput;
		$arrayKeys = array_keys($list[0]);
		$columnCnt = count($list[0]);


		// Header
		echo '<div class="showListHeader">'; echo $header; echo'</div>				
		      <div class="showListContent">';

		echo '<div class="row-list">';
		for ($i=1; $i < $columnCnt; $i++) { 
 				echo '<div>'.$arrayKeys[$i].'</div>';
 			}
 			echo '</div>';

		// Rows
		foreach ($list as $row) {
 			echo '<div class="row-list">';

 			for ($i=1; $i < $columnCnt; $i++) { 
 				echo '<div>'.$row[$arrayKeys[$i]].'</div>';
 			}
 			echo '</div>';
		}

		// Footer
		echo '</div>
		      <div class="showListFooter"></div>';



		
		
	}
}
?>