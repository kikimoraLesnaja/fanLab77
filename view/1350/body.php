	<div id="botContainer">
	<?
		if(isset($_SESSION['sid']) && isset($_SESSION['snick']))
			include("view/$screenWidth/heroProp.php");
			else include("view/$screenWidth/leftBanner.php");
	
	?>	
					
	<div id="field"><?  include("view/$screenWidth/$page.php"); ?></div>
	
	<?
		if(isset($_SESSION['sid']) && isset($_SESSION['snick']))
			include("view/$screenWidth/heroAll.php");
			else include("view/$screenWidth/rightBanner.php");
	
	?>	
		
     </div>
</div>