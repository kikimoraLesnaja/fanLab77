<?php 
class Field{

var $idp;      // Number type of object - 
var $name;     //"Name" of object - also it is name of picture for displaying
var $massiv;   // array of Filed's landscape
var $artefact; // array of Artefacts

var $date_reg;
var $date_end;
var $wid;// Winner's id

var $ownerId; 	// integer- Player - Owner id from Table users
var $bombers;	// ARRAY ob Bombers objects! 0-Bomber already is Owner
var $view;		// STRING contents   MyTag type objects   

	function __construct($idp, $owner=null,  $name='', $date_reg='0000-00-00' ){
		$this->idp=$idp;
		$this->name=$name;
		$this->date_reg=$date_reg;
		$this->ownerId=$owner->playerId;
		$this->bombers[0]=$owner;
		
		//$this->makeView();
	}

	function generatorField($owner,  $name=''){
		global $db;
		//$massiv=genArray(10,10,2);
		$massiv=genArrayWeight(10,10,array(0,1,2),array(3,2,1));
		clearAngles($massiv);
		$m=serialArray_new($massiv);

		//$artefact=genArray(10,10,3,4);
		$artefact=genArrayWeight(10,10,array(0,3,4),array(4,1,1));
		clearAngles($artefact);
		$a=serialArray_new($artefact);

		$ownerId=$owner->playerId;

		$b=$owner->bombs;
		$sql="INSERT INTO ".DB_PREFIX."_pole (id0, name, bombs0, massiv, artefact, date_reg) VALUES 
				($ownerId,  '$name', $b, '$m', '$a', NOW())";
		$db->query($sql);
		$idp=$db->insert_id();
		
		$sql2="SELECT date_reg FROM ".DB_PREFIX."_pole WHERE idp=".$idp;
		$db->query($sql2);
		$res=$db->ind_array();
		$d=$res[0][0];


		$f=new Field($idp, $owner, $name, $d);
		$f->massiv=$massiv;
		$f->artefact=$artefact;

		return $f;
		
	}

	function makeView(){
 	$this->view='';
	for($i=0; $i<10; $i++){
		for($k=0; $k<10; $k++){
			if($this->massiv[$i][$k] == 0)
				$t=new Thing( $this->artefact[$i][$k], $i, $k );
			else  
				$t=new Thing( $this->massiv[$i][$k], $i, $k );
			$this->view.= $t->getView();
			}
		}	
	}
		
	function getView(){
		$this->makeView();
		return $this->view;	   

	}
	
	function putToBase(){

		}
	function getFromBase($idp){
		global $db;
		$sql="SELECT * FROM ".DB_PREFIX."_pole WHERE idp=$idp";

		$db->query($sql);
//echo  "sql - $sql, num=".$db->num_rows();
		$r=$db->assoc_array();
		$a=$r[0];
//print_r($a);
		//$this->ownerId=$a['id0'];

		$owner=new Bomber(1000);
		$owner->setPlayerId($a['id0']);
		$owner->setPlayerNick($a['name']);
		$owners[0]=$owner;

		$f=new Field($idp, $owner, $a['name'], $a['date_reg']);
		$f->massiv=unSerialArray($a['massiv']);
		$f->artefact=unSerialArray($a['artefact']);
		return $f;
		}

}


?>
