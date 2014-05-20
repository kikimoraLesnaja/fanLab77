<?php 

class MyList extends MyTag{
var $labels;
var $links;
function addLis($lab, $lin=null, $target=null){


 	$this->labels=$lab;
	$this->links=$lin;

	$this->content='';
		if($this->links!=null){
			for($i=0;$i<count($this->labels);$i++){
				if($this->links[$i]!=null)
					$l=$this->links[$i];
					else $l="#";
					if($target) $tar="target='$target'"; else $tar='';
				$b[]="<a href='$l' $tar>".$this->labels[$i]."</a>";
			}
		
		}
		else $b=$this->labels;

		foreach($b as $v){
		$a[]="\n<li>$v</li>";
		}
	$this->content=implode($a,"");
 	$this->addContent($this->content);
	}

 
}

?>
