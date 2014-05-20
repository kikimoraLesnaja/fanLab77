<?

$error=1;
//************************************************************************///

//echo "email - ".$e_mail;
//*************************************************************************//
controlData($nickname, $e_mail, $pass1, $pass2);
controlNickEmail($nickname, $e_mail);

//echo "error - $error, <br>";
$errorString=getErrorString(0);


if($error==1){
addToBase($nickname, $e_mail, $pass1);

//header("Location:?page=regok");
//exit();
echo "<script>window.location='?page=regok&lang=$lang'</script>";

}

//*****************************************************************************************************//

function controlData($nickname, $email,$pass1, $pass2  ){
	global $error;
if(empty($nickname)||empty($email)||empty($pass1)||empty($pass2)){
	$error+=2;
	}
if(strlen($nickname)>50||strlen($nickname)<6||strlen($email)<8||strlen($pass1)>20||strlen($pass1)<6||strlen($pass2)>20||strlen($pass2)<6){
	$error+=4;
	
	//echo 'length doesent match<br>';
}

if($pass1!=$pass2){
	$error+=8;
	//echo 'not equal passes<br>';
}

if(preg_match("/^[a-z0-9_-]*$/i", $pass)==false){
	$error+=16;
	//echo ' wrong pass format<br>';
}

if(!preg_match('|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is', $email)){
	$error+=32;
	//	echo ' email not valid<br>';
	}

if(!preg_match("/^[a-z0-9_-]*$/i", $nickname)){
	$error+=64;
	//	echo 'login not valid<br>';
	}
	//echo $error;
	//return $error;
}


function controlNickEmail($nick, $email){
global $db, $error;

$sel="SELECT nick FROM ".DB_PREFIX."users WHERE nick='$nick' ";
$db->query($sel);
$res = $db->ind_array();

if($db->num_rows()>0) $error+=128;

	$sel="SELECT nick, email FROM ".DB_PREFIX."users WHERE  email='$email'";
$db->query($sel);
$res = $db->ind_array();

if($db->num_rows()>0)
		$error+=256;
}

function addToBase($nick, $email, $pass){
global $db;

$sel="INSERT INTO ".DB_PREFIX."users (date_reg, nick, email, pass) VALUES (now(),'$nick', '$email', md5('$pass')) ";
$db->query($sel);
}

