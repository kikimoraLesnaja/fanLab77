<?php 
class MyTag{
var $tagName;
var $id;
var $name;
var $class;
var $style;
var $src;
var $content;

var $view;

	function __construct($tagName, $id='', $name='', $class='', $style='', $src='', $content=''){
		$this->tagName=$tagName;
		$this->id=$id;
		$this->name=$name;
		$this->class=$class;
		$this->style=$style;

		$this->src=$src;
              
		$this->content=$content;

		$this->makeView();
	}
	function makeView(){
		$this->view='<'.$this->tagName;
		if($this->id != null) $this->view.=" id='".$this->id."'";
		if($this->name != null) $this->view.=" name='".$this->name."'";
		if($this->class != null) $this->view.=" class='".$this->class."'";
		if($this->style != null) $this->view.=" style='".$this->style."'";

//echo "src 2=".$this->src;
		if($this->src != null) $this->view.=" src='".$this->src."'";
		$this->view.=">";

 		if($this->content != null) $this->view.=$this->content;
		//echo $this->tagName;
		
		if($this->tagName != 'img')
		$this->view.='</'.$this->tagName.'>';
	}
		
	function show(){
		if($this->view!=null)
			echo $this->view;
	}
	function addContent($c){
	
	$this->content=$c;
	$pos=strpos($this->view, '>');
        $a=substr($this->view, 0, $pos+1);
	$b=strstr($this->view, '</');
	
	$this->view=$a . $c . $b;

	}
	function getView($make=1){
		if($make) $this->makeView();
		return $this->view;	   

	}
}


?>
