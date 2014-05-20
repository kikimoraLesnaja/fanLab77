<?
include('controller/heroPropController.php');

$heroTypeLife=tr('hero_type_life');
$heroName=tr('hero_name');
$heroArmPower=tr('hero_arm_power');
$heroAvatar=tr('hero_avatar');


$sel="SELECT idh, $lang,  life FROM ".DB_PREFIX."heroes";

$db->query($sel);
$res=$db->ind_array();
//echo "res" . count($res);

//echo "selHeroType - $selHeroType, heroType -$heroType";

$heroTypes='';
	for($i=0; $i<count($res); $i++){
		$radio=new MyRadio('input', 'ht'.$res[$i][0], 'heroType', 'heroType');
		if($i==0) $ch=1; else $ch=null;
		$label="<span id='htlab". $res[$i][0]."'>" . $res[$i][1].' ('. $res[$i][2] . ')' .'</span>';
		
		//echo ', res: '.$res[$i][0];
		
		if(($selHeroType!='' || $herosave!='') && $res[$i][0]==$heroType) {
				$cht=1;
		}
		else $cht=0;
		
		//echo " , cht - $cht ";
		$radio->addValue($label , $res[$i][0], $cht);
		$heroTypes.='<div class="heroTypeCont">'.$radio->getRadio().'</div>';
		
}

$avatars='';
$heroArmImgs='';
$selHeroSex0='checked';  $selHeroSex1='';
$creaError='';

//********************************** FOR WORK WITHOUT JAVASCRIPT ****************************//

if($selHeroType!='' || $herosave!=''){
  for($i=1; $i<=3; $i++){
		$radioAva=new MyRadio('input', '', 'selAva', 'selAva');
		if($selAva==$i) $cha=1; else $cha=0;
		$radioAva->addValue('' , $i, $cha);
		
		$avatars.="<p>".$radioAva->getRadio();
		//$avatars.="<p><input type='radio' name='selAva' value='$i'> ";
		$avatars.="<img src='view/img/heroes/$heroType"."_$i"."_"."$heroSex.png' class='heroImg'  alt='avatar$i' id='avatar$i'></p>";
	}
	
	if($heroSex==0)  {$selHeroSex0='checked';  $selHeroSex1='';}
				else  {$selHeroSex0='';  $selHeroSex1='checked';}
				
	$sel="SELECT ida, $lang as name, power FROM ".DB_PREFIX. "arms WHERE idh='$heroType'";

	///echo $sel;

	$db->query($sel);
	$res=$db->ind_array();
	for($i=0; $i<count($res); $i++){
		$heroArmImgs.="<div class='heroArmCont'> ";
	//	$heroArmImgs.="<input type='radio' name='selArm' value='".$res[$i][0]."'> ";
		$radioArm=new MyRadio('input', '', 'selArm', 'selArm');
		if($selArm==$res[$i][0]) $cha=1; else $cha=0;
		
		$radioArm->addValue('' , $res[$i][0], $cha);
		$heroArmImgs.=$radioArm->getRadio();
		
		$heroArmImgs.="<img src='view/img/arms/" . $heroType . "_" . $res[$i][0] . ".png' class='heroArm'  alt='heroArm". $res[$i][0] . "'" . " id='arm" . $res[$i][0] . "'>";
		$heroArmImgs.="<div id='armDet" . $res[$i][0] . "'>" . $res[$i][1] . ' ('. $res[$i][2] .")</div></div>";
	}
}

if($herosave!=''){
	if(trim($heroname)=='') $creaError.= ' '.$heroName .'?';
	if($selAva==0) $creaError.= ' '. $heroAvatar .'?';
	if($selArm==0) $creaError.= ' '. $heroArmPower .'?';
	
	if($creaError=='')  {
		$creaImg="view/img/heroes/$heroType"."_$selAva"."_$heroSex.png";
		heroCreation($heroType, $heroname, $heroSex, $creaImg,  $selArm);
		//echo 'OK';
		header("Location:?page=game&lang=$lang");
		}
	
}