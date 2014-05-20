<?

include('../config.php');
$ar=genArray(15,15,4);
$ar[0][0]=0;
$ar[14][14]=0;

$en=array(1001, 1002,1003);
arrayModification($ar, $en, 3 );
print2array($ar);