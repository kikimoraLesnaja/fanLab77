<?
session_start();
include('config.php');

session_unset();
session_destroy();
header("Location:index.php?lang=$lang");
//echo "<script>window.location='index.php?lang=$lang'</script>";
?>