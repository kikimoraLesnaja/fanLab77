<div id="createHero">
<?
echo $creahero;
?>
  <form action="" method="get">

       <DIV style="width:720px; text-align:left; padding-left:10px;height:100x">
	   <p><? echo $heroName ?> &nbsp;&nbsp;&nbsp;
         <input type="text" name="heroname" id="heroname" style="width:350px; "> &nbsp;&nbsp;&nbsp; &nbsp;
         Sex <input type="radio" name="heroSex" class="heroSex" checked value=0> boy &nbsp;&nbsp; 
         <input type="radio" name="heroSex" class="heroSex" value=1> girl
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
              <p>&nbsp;</p>
       		</div>
            
             <div class="createHeroCont" style="border-right:solid 1px #762E0E; border-left:solid 1px #762E0E;" id="createHeroCont2"> 
            
				
				  <p><?  echo $heroAvatar ?> </p>
				  
				 <DIV id="heroImgs"> 
					 
				 </div>
			  
              <p>
			 
              </p>
              
             </div>
             
             <div class="createHeroCont" id="createHeroCont3"> 
             
               <p><?  echo $heroArmPower ?> </p>
               <DIV id="heroArms"> 
					 
				 </div>
             </div>
			 
	  <input type="hidden" name="page" value="creahero">
			  <input type="hidden" name="lang" value="<? echo $lang ?>">
                <input type="button" value="   OK   " id="herosave">
     </form> 
 </div>
