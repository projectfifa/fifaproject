<?php
class showList {

	public function __construct($nameInput, $listInput) {
		$name = $nameInput;
		$list = $listInput;

	  echo '<div class="showListHeader">'; echo $name; echo'</div>
        	<div class="showListContent">';
        		foreach ($listInput as $key) {
        			echo '<div class="row-list">'.$key.'</div>';
        		}
       			    echo '<div class="showListFooter"></div>';

	}
}
?>