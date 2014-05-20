<?
$user=tr('user');
$pass=tr('pass');

$error=1;

if(isset($_POST['loginButton'])){
inputControl($clientName, $clientPass);
//echo  "error - $error";

	if($error==1){

		$errorLogin='';
		//setOnline($clientName);
		//echo "<script>window.location='?page=panel&lang=$lang'</script>";
		header("Location:?page=panel");

		//exit();
		}
		else
		{
		$errorLogin=getErrorString($error);
		}
}
/**/
function inputControl($nick, $pass){
global $db, $error;
$nick=trim($nick);
$pass=trim($pass);
$sel="SELECT  pass, id, admin FROM ". DB_PREFIX."users WHERE nick='$nick' ";
//echo "sel -$sel";
$db->query($sel);
$res=$db->ind_array();
//echo "num=".$db->num_rows();
if($db->num_rows()==0){
	$error+=512;
	return;
}

if($res[0][2] != 10) {
		$error+=2048;
		return;
		}

//echo "pass -" .$res[0][0];
if(md5($pass) != $res[0][0]) {
		$error+=1024;
		return;
		}
	

$_SESSION['sid']=$res[0][1];
$_SESSION['snick']=$nick;
$_SESSION['sadmin']=10;

}

?>