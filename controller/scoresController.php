<?
include('controller/controlka.php');
include('controller/heroPropController.php');


$sel="SELECT p.id, nick, SUM( health + power ) AS s FROM fan_persons AS p, fan_users AS u
WHERE p.id = u.id AND p.health >0 GROUP BY p.id ORDER BY s DESC";

$db->query($sel);

$res=$db->ind_array();
$cap=array('Id', 'Nickname', 'Health + Power');
$showScoreTable=array_into_table($res, $cap,  'scoreTable');

//***********************************************************************//

