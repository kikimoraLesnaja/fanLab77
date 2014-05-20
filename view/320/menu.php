<div id ="menu">

<a href="?page=about&lang=<? echo $lang ?>"><?  echo $about ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	
<?	if(isset($_SESSION['sid']) && isset($_SESSION['snick'])) include("author.php");  
			else 
 echo "<a href='?page=reg&lang=$lang'>$reg</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?page=loginform&lang=$lang'>Login</a>";
	?>
	
	
</div>