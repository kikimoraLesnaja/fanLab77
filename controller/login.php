<?

$error=1;

inputControl($clientName, $clientPass);
//echo  "error - $error";
if($error==1){

$errorString='';
//setOnline($clientName);
//echo "<script>window.location='?page=loginok&lang=$lang'</script>";
header("Location:?page=loginok");

//exit();
}
else
{
$errorString=getErrorString(0);

}
/**/
function inputControl($nick, $pass){
global $db, $error;
$nick=trim($nick);
$pass=trim($pass);
$sel="SELECT  pass, id FROM ". DB_PREFIX."users WHERE nick='$nick' ";
//echo "sel -$sel";
$db->query($sel);
$res=$db->ind_array();
//echo "num=".$db->num_rows();
if($db->num_rows()==0){
	$error+=512;
	return;
}
	
//echo "pass -" .$res[0][0];
if(md5($pass) != $res[0][0]) {
		$error+=1024;
		return;
		}
	

$_SESSION['sid']=$res[0][1];
$_SESSION['snick']=$nick;

}

?>