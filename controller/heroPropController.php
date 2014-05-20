<?
$name=tr('name');
$life=tr('life');
$arm=tr('arm');

$currHeroProp=tr('curr_hero_prop');

/*
$heroAva= "view/img/heroes/0.png";
$armImg= "view/img/arms/0.png";
*/
if($page=='game'){

	//echo "sidp=".$_SESSION['sidp'];
	$idp=$_SESSION['sidp'];

	if($gindex!=''){
		$m=explode(',', $gindex);
		$grow=(int)$m[0];
		$gcol=(int)$m[1];
	}
	else {
		$grow=0;
		$gcol=0;
	}
	//echo " grow=$grow; gcol - $gcol";
		
		$myHero=new Hero($idp, $grow, $gcol);
		$errorString=$myHero->errorString;
		
	$currHeroName=$myHero->name;
	$heroAva= $myHero->avatar;
	$armImg="view/img/arms/".$myHero->idh.'_'.$myHero->ida.'.png';
	
	$he=$myHero->health*2;
	$currHealth="<img src='view/img/rose.png' width=$he height=24 id='curHealth'>";
	//$_SESSION['shealth']=$myHero->health;
	
	$po=$myHero->power*2;
	$currPow="<img src='view/img/rose.png' width=$po height=24 id='curPower'>";
	
}