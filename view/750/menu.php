<div id ="menu">
			<div id="menuLeft">
		 
		<a href="?page=about&amp;lang=<? echo $lang ?>"><?  echo $about ?></a>&nbsp;&nbsp;&nbsp;
		<? 
		if(isset($_SESSION['sid']) && isset($_SESSION['snick'])) 
		 echo "<a href='?page=scores&amp;lang=$lang'>$scoreTable</a>";
				else 
		
		echo "<a href='?page=reg&amp;lang=$lang'>$reg</a>";
		
		?>
		
			</div>
	
	<div id="menuMiddle" class="errorS">
		<? echo $errorString ?>
	</div>
	
	<div id="menuRight">
	<? 
	
		if(isset($_SESSION['sid']) && isset($_SESSION['snick']))
			include("author.php");//$screenWidth/
			else include("loginform.php");//$screenWidth/
	
	?>
	
	</div>
     <div class="bu"></div>
</div>