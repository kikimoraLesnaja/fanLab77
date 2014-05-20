<?

$error=1;
//************************************************************************///

	
//echo "email - ".$e_mail;
//*************************************************************************//
controlProfilData( $first_name, $last_name, $phone, $e_mail, $chp, $pass1, $pass2 );
//controlProfilEmail($nickname, $e_mail);

//echo "error - $error, <br>";
$errorString=getErrorString(0);


if($error==1){
updateProfil($first_name, $last_name, $phone,  $e_mail, $chp, $pass1);

//header("Location:?page=regok");
//exit();
echo "<script>window.location='?page=profil&lang=$lang&updateok=1'</script>";

}

//*****************************************************************************************************//

function controlProfilData($name, $lastname, $tel='', $email='', $chpass=0, $pass1='', $pass2=''  ){
	global $error, $db;
	/*
if(empty($nickname)||empty($email)||empty($pass1)||empty($pass2)){
	$error+=2;
	}
if(strlen($nickname)>50||strlen($nickname)<6||strlen($email)<8||strlen($pass1)>20||strlen($pass1)<6||strlen($pass2)>20||strlen($pass2)<6){
	$error+=4;
	
	//echo 'length doesent match<br>';
}*/
if(!preg_match('|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is', $email)){
	$error+=32;
	//	echo ' email not valid<br>';
	}else {
		$sel2="SELECT email FROM ".DB_PREFIX."users WHERE id=".$_SESSION['sid'];
		$db->query($sel2);
		$res2=$db->ind_array();
		if(strtoupper($res2[0][0]) != strtoupper($email)){
			$sel3="SELECT email FROM ".DB_PREFIX."users WHERE email='$email'";
			$db->query($sel3);
			if($db->num_rows()>0) $error+=256;
			}
	}

	//echo "  ... chpass  - $chpass";
if($chpass=="on"){
		//echo " // * // '$chpass' ,   ";
		if(empty($pass1) || empty($pass2)){
			$error+=2;
			echo " -*- ";
			}/**/

		if($pass1!=$pass2){
			$error+=8;
			//echo 'not equal passes<br>';
		}

		if(preg_match("/^[a-z0-9_-]*$/i", $pass)==false){
			$error+=16;
			//echo ' wrong pass format<br>';
		}
	}

	//echo $error;
	//return $error;
}



function updateProfil($name, $lastname, $tel='',  $email=0, $chpass=0, $pass=0){
global $db;

$a[]="name='$name'";
$a[]="lastname='$lastname'";
$a[]="tel='$tel'";
$a[]="email='$email'";
if($chpass == 'on' ) $a[]="pass=md5('$pass')";

$sel="UPDATE ".DB_PREFIX."users SET  " . implode(', ', $a) . " WHERE id=" . $_SESSION['sid'];
//echo  $sel;
$db->query($sel);
}

