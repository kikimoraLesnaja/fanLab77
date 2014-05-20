<div id="createHero">
<?
echo $creahero;
?>
<span class='errorS'> &nbsp;&nbsp;<? echo $creaError  ?></span>
  <form action="index.php" method="get">
		 <input type="hidden" name="page" value="creahero">
			  <input type="hidden" name="lang" value="<? echo $lang ?>">
			  
       <DIV style="width:720px; text-align:left; padding-left:10px;height:100x">
	   <p><? echo $heroName ?> &nbsp;&nbsp;&nbsp; 
         <input type="text" name="heroname" id="heroname"  value="<? echo $heroname ?>"> &nbsp;&nbsp;&nbsp; &nbsp;
         <? echo $sex ?> <input type="radio" name="heroSex" class="heroSex" <? echo $selHeroSex0 ?>  value=0> boy &nbsp;&nbsp; 
         <input type="radio" name="heroSex" class="heroSex" value=1 <? echo $selHeroSex1 ?>> girl
       </p>
       </DIV>
         	<div class="createHeroCont" id="createHeroCont1" >
			<p>
            <?
			echo $heroTypeLife
			?></p>
			<?
				echo $heroTypes;
            
              ?>
              <p><input type="submit" value=" SELECT HERO TYPE " id="selHeroType" name="selHeroType"></p>
       		</div>
            
             <div class="createHeroCont" style="border-right:solid 1px #762E0E; border-left:solid 1px #762E0E;" id="createHeroCont2"> 
            
				
				  <p><?  echo $heroAvatar ?> </p>
				  
				 <DIV id="heroImgs"> 
					<? echo  $avatars; ?>
				 </div>
			  
              <p>
			 
              </p>
              
             </div>
             
             <div class="createHeroCont" id="createHeroCont3"> 
             
               <p><?  echo $heroArmPower ?> </p>
               <DIV id="heroArms"> 
					 <? echo  $heroArmImgs; ?>
				 </div>
             </div>
			 
	 
                <input type="submit" value=" CREATE THE HERO " id="herosave" name="herosave">
     </form> 
 </div>
