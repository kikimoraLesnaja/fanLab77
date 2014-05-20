<?
if(!isset($_SESSION['sid']) || !isset($_SESSION['snick']) || !isset($_SESSION['sadmin']) || $_SESSION['sadmin']!=10)
 header("Location:index.php");
//echo "<script>window.location='index.php'</script>";
?>