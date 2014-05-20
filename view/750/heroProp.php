<div id="heroProp">

	 <div style="float:left; width:60px">
		<img src="<? echo $heroAva ?>" id="heroImgCurrent" class="heroImgCurrent" alt="avatar">
	</div>

	<div style="float:left; width:260px">
		
			<div id="heroNameCurrent"><? echo "$name: $currHeroName" ?></div>
			
		
			<div id="heroLifeCurrent" ><? echo $currHealth ?></div>
			
		
	</div>
	
	 <div style="float:left; width:60px; padding-top:8px; /*background-color:#ccc*/">
	 	<img src="<? echo $armImg ?>" id="heroArmCurrent" class="heroArmCurrent" alt="arm">
	 </div>
	
	<div style="float:left; width:260px; /*background-color:#fff*/">
			 
		
			 <div id="heroArmDetCurrent">..</div> 
			 
			 <div id="heroPowerCurrent"><? echo $currPow ?></div>
	</DIV>
    
</div>

<div id="heroAllTop">
<? if(isset($_SESSION['sid']) && isset($_SESSION['snick']))  {
     ?>
	 <div class="heroAllDet"><?  echo $heroes ?></div>
		<div class="heroAllDet"><a href="?page=allhero&lang=<? echo $lang ?>"><?  echo $all ?></a></div>
		<div class="heroAllDet"><a href="?page=creahero&lang=<? echo $lang ?>"><?  echo $new ?></a></div>
		
        <div class="bu"></div>
		<?
		}
		
		?>
	
</div>