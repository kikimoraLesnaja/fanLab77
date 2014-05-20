<?
//session_start();

//echo session_encode();

//***********  CONSTANTS DEFINITION *******************//

define(DB_PREFIX, 'fan_');

define(MY_ROOT,	'');

define(DEBUG_MODE,	1);

define(HEROES_MAX,	10);

//define(MY_ROOT,	'/home/localhost/www/vr');
//echo "db prefix=".DB_PREFIX;


//****************  LIBRARY & CLASSES *******************//

include (MY_ROOT.'../model/fun.php');
include (MY_ROOT.'../classes/Db.php'); 
//include (MY_ROOT.'../classes/DbMS.php');

/*include (MY_ROOT.'../classes/MyTag.class.php'); 
include (MY_ROOT.'../classes/MyList.class.php'); 
include (MY_ROOT.'../classes/MySelect.class.php'); 
include (MY_ROOT.'../classes/MyRadio.class.php'); 
include (MY_ROOT.'../classes/Hero.class.php'); 
*/

//*********************  GET  POST STRINGS ******************//
if(isset($_POST['lang'])) $lang=$_POST['lang']; 
 else {
 
if(isset($_GET['lang'])) $lang=$_GET['lang'];

  else $lang='en';

 }
 
 if(isset($_POST['page'])) 	$page=$_POST['page']; 
 else{
	if(isset($_GET['page'])) 	$page=$_GET['page']; 
	else $page="login";
	}

if(isset($_GET['table'])) 	$table=$_GET['table']; 
	else $table="users";
	
	if(isset($_GET['act'])) 	$act=$_GET['act']; 
	else $act="";


if(isset($_GET['id'])) 	$id=$_GET['id']; 
	else $id=0;

	
     //*****  LOGIN ****//
if(isset($_POST['clientName'])) $clientName=convertToBase($_POST['clientName']);  else $clientName='';
	if(isset($_POST['clientPass'])) $clientPass=convertToBase($_POST['clientPass']);  else $clientPass='';
	
	//*****  PROFIL ****//
	if(isset($_POST['firstname'])) $first_name=convertToBase($_POST['firstname']);  else $first_tname='';
	if(isset($_POST['lastname'])) $last_name=convertToBase($_POST['lastname']);  else $last_name='';
	if(isset($_POST['phone'])) $phone=convertToBase($_POST['phone']);  else $phone='';

	if(isset($_POST['chp'])) $chp=$_POST['chp'];  else $chp=-1;
	
	
	
//*************************  MODEL (DATA SOURCE )  ************************//

//  DATA BASE PARAMETERS

$dataSource='MYSQL';

/*echo " dataSource= $dataSource";

$dbHost='localhost';
$dbUser='root';
$dbPass='';

$dbName='fanlab';
*/

$dbHost='ats.cs.ut.ee';
$dbUser='kira77';
$dbPass='f4nl4bKIRA351';
$dbName='kira77_fanlab';


switch($dataSource){
// Data base object creation
case 'MYSQL': $db=new Db($dbHost,$dbUser,$dbPass,$dbName);break;
case 'MSSQL': $db=new DbMS($dbHost,$dbUser,$dbPass,$dbName);break;
case 'FILE': break;
default: $db=new Db($dbHost,$dbUser,$dbPass,$dbName);break;

}
//**************** ERRORS ARRAY for registration & login****************//

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

$errors[10]='Password id wrong';

$errors[11]='ADMIN rights not exists!';


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
//************************ VIEW ****************************//

  //************************ CONTROLLERS **********************

  $kkk=MY_ROOT.'controller/'.$page.'Controller.php';

//  echo "k- $kk";

  include($kkk);


?>