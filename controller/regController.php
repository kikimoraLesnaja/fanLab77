<?
 $reg_descr=tr('reg_descr');
$nick=tr('nick');
$pass=tr('pass');
$repeat_pass=tr('repeat_pass');
$email=tr('email');

if(isset($_POST['regOK'])){
//echo "OK";
 include('regInput.php');
}
else
$errorString='....';
//echo "NO OK";