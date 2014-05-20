<?
include('../config.php');


$sel="UPDATE ".DB_PREFIX. "persons SET health=$curLife, power='$curPower', end_date=NOW() WHERE idp=".$_SESSION['sidp']; 
	

$db->query($sel);



//echo ".......... SIDP".$db->insert_id();;
//echo serialArray($res, '^');
