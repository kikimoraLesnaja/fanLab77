<?

$sel="SELECT nick, name, lastname, email, tel FROM ".DB_PREFIX."users WHERE id=".$_SESSION['sid'];
//echo $sel;
$db->query($sel);
$ass=$db->assoc_array();
//echo " n = ".count($ass);
//reach($ass[] as $k->$v) echo "$k - $v, ";
$e_mail=$ass[0]['email'];
$first_name=$ass[0]['name'];
$last_name=$ass[0]['lastname'];
$phone=$ass[0]['tel'];

//echo "email=".$e_mail;