<?
include('adminControlka.php');

switch($act){
	case 'del':
	$tableShow="You want delete row with id=$id in table $table ? &nbsp;  &nbsp; <a href='?page=panel&table=$table&id=$id&act=delyes'>YES</a> &nbsp;  &nbsp; &nbsp; 
	<a href='?page=panel&id=$id&act=delno'>NO</a>"; break;
	
	case 'delyes': 
	 if($table=='users') $ID='id'; else $ID='idp';
		$db->delete(DB_PREFIX.$table, $ID, $id); 
		$tableShow="Row with id $id in table $table was deleted";
		
	break;
	
	default: 
	
	if($table=='users'){
	$db->query("SELECT id, name, lastname, nick, email, date_reg, tel FROM ".DB_PREFIX."$table ORDER BY id");
	$cap=array('ID', 'Name', 'Lastname', 'Nick', 'Email', 'Date_reg', 'Phone', 'Delete');
	}
	
	if($table=='persons'){
	$sql="SELECT idp, id,  name, h.en, sex, avatar, start_date, health, end_date, ida, power, h.idh FROM ".DB_PREFIX."persons as p, ".DB_PREFIX."heroes as h 
	WHERE p.idh=h.idh ORDER BY id, idp";
	
	$db->query($sql);
	$cap=array('IDP', 'ID', 'Name', 'Hero', 'Sex', 'Avatar', 'Start_date', 'Health', 'End_date', 'Armor', 'Power', 'Delete');
	}


	$data=$db->ind_array();

	if($table=='persons') modifPersons($data);
	modif($data);
	$tableShow=array_into_table($data, $cap, $table);

}


//******************************************************************************************//
function modif(&$a){
global $table;
$n=count($a[0]);

for($i=0; $i<count($a); $i++){
	$v=$a[$i][0];
	$vv="<a href='?page=panel&table=$table&id=$v'>$v</a>";
	$a[$i][0]=$vv;
	
	$a[$i][$n]="<a href='?page=panel&table=$table&id=$v&act=del'> X </a>";
	}
  

}

function modifPersons(&$a){
global $table;
$n=count($a[0]);

for($i=0; $i<count($a); $i++){
	$v=$a[$i][5];
	$vv="<img src='../$v'>";
	$a[$i][5]=$vv;
	$idh=array_pop($a[$i]);
	$a[$i][9]="<img src='../view/img/arms/$idh"."_".$a[$i][9].".png'>";
	}
  

}

?>