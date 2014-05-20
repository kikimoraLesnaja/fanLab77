<?php 

class MySelect extends MyTag{
var $labels;
var $values;
var $valueSelected;

function addOps($lab, $val=null, $valSel=0){

 	$this->labels=$lab;
	$this->values=$val;
	$this->valueSelected=$valSel;

	$this->content='';
		
			for($i=0; $i<count($this->labels); $i++){
				if($this->values[$i]!=null){
				   $val="value='".$this->values[$i]."' ";
				   if($this->values[$i]==$valSel) $sel='selected'; else $sel='';
				}
				else $val='';
				
				$a[]="<option $val $sel>".$this->labels[$i]."</option>";
				}

	$this->content=implode($a,"");
 	$this->addContent($this->content);
	}
 
}

?>