<?
session_start();

// error_reporting(E_ALL);
// ini_set("display_errors", 1);
//echo session_encode();

if(isset($_GET['screenWidth'])){

		$screenWidth=$_GET['screenWidth'];

		}

	else {
	if(isset($_SESSION['saveWidth'])  )
			$screenWidth=$_SESSION['saveWidth'];
		else
			$screenWidth=750;
		}
		////////////////////
		// $screenWidth=750;

			//echo "screenWidth + $screenWidth";
			
$_SESSION['saveWidth']=$screenWidth;

//echo session_encode();

//***********  CONSTANTS DEFINITION *******************

define(DB_PREFIX, 'fan_');

define(MY_ROOT,	'');

define(DEBUG_MODE,	1);

define(HEROES_MAX,	10);

//define(MY_ROOT,	'/home/localhost/www/vr');
//echo "<br>db prefix=".DB_PREFIX;


//****************  LIBRARY & CLASSES ****************** *

include (MY_ROOT.'model/fun.php');
include (MY_ROOT.'classes/Db.php');

include (MY_ROOT.'classes/MyTag.class.php');
include (MY_ROOT.'classes/MyList.class.php');
include (MY_ROOT.'classes/MySelect.class.php');
include (MY_ROOT.'classes/MyRadio.class.php');
include (MY_ROOT.'classes/Hero.class.php');


//*********************  GET  POST STRINGS ******************
if(isset($_POST['lang'])) $lang=$_POST['lang'];
 else {

if(isset($_GET['lang'])) $lang=$_GET['lang'];

  else $lang='ee';

 }

	if(isset($_POST['page'])) 	$page=$_POST['page'];
 else{
	if(isset($_GET['page'])) 	$page=$_GET['page'];
	else $page="about";
	}


	//*****  REGISTRATION **** 


	  if(isset($_POST['nickname']))
			$nickname=convertToBase(trim($_POST['nickname'])); else $nickname='';

if(isset($_POST['email']))
	$e_mail=convertToBase(trim($_POST['email'])); else $e_mail='';

if(isset($_POST['pass1']))
	$pass1=convertToBase(trim($_POST['pass1'])); else $pass1='';

if(isset($_POST['pass2']))
	$pass2=convertToBase(trim($_POST['pass2']));  else $pass1='';

     //*****  LOGIN **********************
if(isset($_POST['clientName'])) $clientName=convertToBase($_POST['clientName']);  else $clientName='';
	if(isset($_POST['clientPass'])) $clientPass=convertToBase($_POST['clientPass']);  else $clientPass='';

	//*****  PROFIL *********************
	if(isset($_POST['firstname'])) $first_name=convertToBase($_POST['firstname']);  else $first_tname='';
	if(isset($_POST['lastname'])) $last_name=convertToBase($_POST['lastname']);  else $last_name='';
	if(isset($_POST['phone'])) $phone=convertToBase($_POST['phone']);  else $phone='';

	if(isset($_POST['chp'])) $chp=$_POST['chp'];  else $chp=-1;


	//**************** HERO CREATION ******************************
	if(isset($_GET['idh'])) $idh=$_GET['idh']; else $idh=0;

	if(isset($_GET['creaIdh'])) $creaIdh=(int)$_GET['creaIdh']; else $creaIdh=0;
	if(isset($_GET['creaArm'])) $creaArm=(int)$_GET['creaArm']; else $creaArm=0;
	if(isset($_GET['creaSex'])) $creaSex=(int)$_GET['creaSex']; else $creaSex=0;
	if(isset($_GET['creaName'])) $creaName=$_GET['creaName']; else $creaName='';
	if(isset($_GET['creaImg'])) $creaImg=$_GET['creaImg']; else $creaImg='';
	
	
							//********************  WORK WITH JAVASCRIPT DISABLING  **********************************
	if(isset($_GET['selHeroType'])) $selHeroType=$_GET['selHeroType']; else $selHeroType='';
	if(isset($_GET['herosave'])) $herosave=$_GET['herosave']; else $herosave='';
	
	if(isset($_GET['heroType'])) $heroType=$_GET['heroType']; else $heroType=0;
	
	if(isset($_GET['heroname'])) $heroname=$_GET['heroname']; else $heroname='';
	
	if(isset($_GET['heroSex'])) $heroSex=$_GET['heroSex']; else $heroSex=0;
	
	if(isset($_GET['selAva'])) $selAva=$_GET['selAva']; else $selAva=0;
	
		if(isset($_GET['selArm'])) $selArm=$_GET['selArm']; else $selArm=0;

	//**************** GAME ******************************
	if(isset($_GET['curLife'])) $curLife=$_GET['curLife']; else $curLife=0;

	if(isset($_GET['curPower'])) $curPower=$_GET['curPower']; else $curPower=0;
	
	if(isset($_GET['gindex'])) $gindex=$_GET['gindex']; else $gindex='';
	
	

	//echo '*** '.$_POST['chp'].' .... ';
//*************************  MODEL (DATA SOURCE )  ************************

// ------------------------  DATA BASE PARAMETERS -------------------------------- 

$dataSource='MYSQL';
//echo " dataSource= $dataSource";

//$dbHost='localhost';$dbUser='root';$dbPass='';

//$dbName='fanlab';


$dbHost='ats.cs.ut.ee';$dbUser='kira77';$dbPass='f4nl4bKIRA351';

$dbName='kira77_fanlab';


switch($dataSource){
// Data base object creation
case 'MYSQL': $db=new Db($dbHost,$dbUser,$dbPass,$dbName);break;
case 'MSSQL': $db=new DbMS($dbHost,$dbUser,$dbPass,$dbName);break;
case 'FILE': break;
default: $db=new Db($dbHost,$dbUser,$dbPass,$dbName);break;

}
//**************** ERRORS ARRAY for registration & login****************

$errors[0]='not error';//1

$errors[1]='no data';//2

$errors[2]='wrong data length';//4

$errors[3]='passwords not equal';//8

$errors[4]='wrong password format';//16

$errors[5]='wrong email format';//32

$errors[6]='nick format invalid';//64

$errors[7]='nick allredy exists';//128

$errors[8]='mail allredy exists';//256

// for LOGIN

$errors[9]='Nick name not found';

$errors[10]='Password is wrong';


function getErrorString($br=1){
global $error, $errors;

$s="";
$d="".decbin($error);
$d--;
//echo " d=$d ".strlen($d);

for($i=1; $i<strlen($d); $i++){
		$n=substr($d, strlen($d)-$i-1, 1);
		//echo "n= $n,  ";
		if($n==1){
			$s.=$errors[$i];
			if($br) $s.= '<br>'; else $s.=', ';
			}
	}

return $s;
}
//************************** GAME ********************************

define(FIELD_ROW, 15);
define(FIELD_COL, 15);

  //************************ CONTROLLERS **********************

$kk=MY_ROOT.'controller/commonController.php';

//  echo "k- $kk";

  include($kk);
//echo ", 11. name $name";
  $kkk=MY_ROOT.'controller/'.$page.'Controller.php';

//  echo "k- $kk";

  include($kkk);
//echo ", 22. name $name";
  include (MY_ROOT.'controller/menuController.php');

/**/
?>