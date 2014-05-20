<?php

function tr($key, $case=0){

global $db, $lang, $dataSource;

if($dataSource=='FILE') return ftr($key, $case);

$sel="SELECT $lang FROM ".DB_PREFIX."words WHERE kw='$key'";

$db->query($sel);

$res=$db->ind_array();

$word=$res[0][0];

if($case==1) $word=strtoupper($word);

return $word;

}

function ftr($key, $case=0){

global  $lang;
$fp=fopen('model/words.txt', 'r');


$la=strtoupper($lang);
$a=fgetcsv($fp, 1000, '#');

for($i=0; $i<count($a); $i++){
	if($a[$i]==$la) {
				$langPos=$i;
				break;
			}
	}
	
while($a=fgetcsv($fp, 1000, '#')){
		for($i=0; $i<count($a); $i++){
			if($a[$i]==$key){
				return $a[$langPos];
			}
		}
	}
	return '...';
}

//************************************************************************************************//
function convertToBase($cont, $admin=0){

$cont=htmlspecialchars($cont, ENT_QUOTES);

return $cont;

}

//************************************************************************************************//

function convertFromBase($cont, $admin=0){

$cont=html_entity_decode($cont, ENT_QUOTES);

if(!$admin) $cont=str_replace("\n", "<br>", $cont);

return $cont;

}





function strToDateTime($s){


$aDate=explode(' ', $s);

$d=preg_replace("|\b(\d+)\-(\d+)\-(\d+)\b|", "\\3-\\2-\\1", $aDate[0]);

$out=array($d, $aDate[1]);



return $out;

}





function dateTimeToStr($a){



if(is_array($a)){

$a[0]=trim($a[0]);

$a[1]=trim($a[1]);

$a[0]=preg_replace("|\b(\d+)\-(\d+)\-(\d+)\b|", "\\3-\\2-\\1", $a[0]);

$out=implode(' ', $a);

}

else $out=preg_replace("|\b(\d+)\-(\d+)\-(\d+)\b|", "\\3-\\2-\\1", $a);



//echo "out - $out , ";



return $out;

}



function getImg($folder, $imgNr ){

$types=array('jpg', 'jpeg', 'png', 'gif', 'bmp');

foreach($types as $t){

 $src="$folder/$imgNr.$t";


 //echo "src- $src, ";

  if(file_exists($src)){
   

	if($imgNr==0) $al= "align='texttop' "; else $al='';
	

  	$img="<img src='$src' $al>";

	  return $img;

	}

  else $img='';

	}

	return '';



}

function serialArray($a, $s1=';', $s2='#'){
		if(!is_array($a)) return null;
			foreach ($a as $value){
			$r[]=implode($s1, $value); 
		}
		return implode($s2, $r);
		}

	function unserialArray($s, $s1=';', $s2='#'){
	/*  This function must get string that described in previous function
	and return index 2-x 
	*/
	$end=array();
		$a=explode($s2, $s);
			foreach($a as $value)
			$end[]=explode($s1, $value);
		return $end;
	}

//********* ARRAY GENERAYION: $n- rows count, $n - columns count, $x - $y - range of values *******//
		function genArray($n, $m, $x, $y=null){ 
		for($i=0; $i<$n; $i++){
			for($k=0; $k<$m; $k++){
			if($y==null) $ar1[]=rand(0, $x);
				else $ar1[]=rand($x, $y);
		}
			$arret[]=$ar1;
			unset($ar1);
			}
		return $arret;
		}
		
/*------ ARRAY ANGLES CLEARING ------*/	

	function clearAngles(&$m){
		$m[0][0]=0;
		$m[0][1]=0;
		$m[1][0]=0;
		$m[1][1]=0;

		$s=count($m)-1;
		$k=count($m[0])-1;
		
		$m[$s][0]=0;
		$m[$s][1]=0;
		$m[$s-1][0]=0;
		$m[$s-1][1]=0;

	
		$m[0][$k]=0;
		$m[0][$k-1]=0;
		$m[1][$k]=0;
		$m[1][$k-1]=0;


		$m[$s][$k]=0;
		$m[$s-1][$k-1]=0;
		$m[$s][$k-1]=0;
		$m[$s-1][$k]=0;
		}
		
/*------  Array Modificaion  ------*/
	function genArrayWeight($n, $m, $a, $w){ //$n array rows count, $m -colums rows count,
// $a -array with diapazon, W - ARRAY OF WEIGHTS OF VALUES
		//echo "count-".count($a) .', '. count($w);
		if(count($a) != count($w)) return null;
		$s=$w[0];
		$p[0]=0;
		//echo "p0-$p[0], ";
		for($i=1; $i<count($w); $i++){
			$s+=$w[$i];
			$p[$i]=$p[$i-1]+$w[$i-1];
			}
		$p[$i]=$p[$i-1]+$w[$i-1];
		//print_r($p);
		for($i=0; $i<$n; $i++){
			for($k=0; $k<$m; $k++){
				$r=rand(1, $s);
				//echo "r-$r, ";
				for($j=0; $j<(count($p)-1);$j++){
					if($r>$p[$j] && $r<=$p[$j+1] ) {
						$out[$i][$k]=$a[$j];
						break;
						}	
				}
			
			}
		}
		

		return $out;
	}

	function arrayModification(&$a, $m, $n){
	   $r=count($a)-1; 	// rows count
	   $c=count($a[0])-1; // columns count
	   
	   for($i=0; $i<count($m); $i++){
			 for($k=0; $k<$n; $k++){
				$q=rand(1, $r);
				$w=rand(1, $c);
				$a[$q][$w]=$m[$i];
			}
	   }
	}
	
	function print2array($a){
		for($i=0; $i<count($a); $i++){
			for($k=0; $k<count($a[$i]); $k++){
				echo $a[$i][$k].", ";
			}
			echo '<br>';
		}
	}
	
//***************************************************************************************************//

function array_into_table(&$a, $cap=null,  $id='', $class=''){
		
			if(!is_array($a)) return '';
			
			
			$string="<table id='$id' class='$class'>";
			if($cap!=null && is_array($cap)) {
				$string.='<tr>';
				for($i=0; $i<count($cap);$i++) $string.='<th>'.$cap[$i].'</th>';
				$string.='</tr>';
			}
			
				for($i=0; $i<count($a);$i++){
				$string.='<tr>';
					for($k=0; $k<count($a[0]);$k++){
						if($a[$i][$k]==null ||  $a[$i][$k]=='') $v="&nbsp;";
						else $v=$a[$i][$k];
						
						if($k==0 || $k==(count($a[0])-1))
							$string.="<td>$v</td>";
							else 
						$string.="<td>$v</td>";
		
					}
				$string.='</tr>';	
				}
			
		$string.='</table>';
	return $string;
	}	

//******************************  HERO CREATION ****************************//
function heroCreation($creaIdh, $creaName, $creaSex, $creaImg,  $creaArm){
global $db;

$ar=genArray(FIELD_ROW,FIELD_COL,4);
$ar[0][0]=0;
$ar[FIELD_ROW-1][FIELD_COL-1]=0;
//clearAngles($ar);
$en=array(1001, 1002,1003);
arrayModification($ar, $en, 5 );

$fi=serialArray($ar);

$sel="SELECT life FROM ".DB_PREFIX. "heroes WHERE idh=$creaIdh";
$db->query($sel);
$res=$db->ind_array();
$health=$res[0][0];

$sel="SELECT power FROM ".DB_PREFIX. "arms WHERE ida=$creaArm";
$db->query($sel);
$res=$db->ind_array();
$power=$res[0][0];

$sel="INSERT INTO ".DB_PREFIX. "persons 
	(id, idh, name, sex, avatar,  ida, health,  power, field) VALUES
 ( ".$_SESSION['sid'].",  $creaIdh, '$creaName', $creaSex, '$creaImg',  $creaArm, $health , $power, '$fi')";

$db->query($sel);

$_SESSION['sidp']=$db->insert_id();
$_SESSION['srow']=0;
$_SESSION['scol']=0;
$_SESSION['shealth']=$health;
$_SESSION['spower']=$power;

}
	?>