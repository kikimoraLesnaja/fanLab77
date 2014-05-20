<?
include('../config.php');
$sel="SELECT ida, $lang as name, power FROM ".DB_PREFIX. "arms WHERE idh='$idh'";

//echo $sel;

$db->query($sel);
$res=$db->ind_array();

echo serialArray($res, '^');
