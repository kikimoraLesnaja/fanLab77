<?

$nick=tr('nick');
$pass=tr('pass');
$repeat_pass=tr('repeat_pass');
$email=tr('email');
$userProfil=tr('user_profil');
$firstname=tr('firstname');
$lastname=tr('lastname');
$tel=tr('tel');
$chpass=tr('chpass');


if(isset($_POST['profilOK'])){
//echo "OK";
 include('profilInput.php');
}
else{
$errorString='....';
 include('profilFromBase.php');
  if(isset($_GET['updateok'])) $errorString=tr('updateok');
}
//echo "NO OK";