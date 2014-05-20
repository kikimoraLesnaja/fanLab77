 <div id="register">
        <form action="" method="post">
		
         <DIV class="errorS" ><?  echo $errorString ?></div>
		 <div style="height:300px;/* background-color:#fff*/">
			  <DIV class="regLabel"><?  echo $nick ?>  <input type="text" name="nickname" id="nickname" value="<? echo $nickname ?>"></div>
			  <DIV class="regLabel"><?  echo $email ?> <input type="text" name="email" id="email" value="<? echo $e_mail ?>"></div>
			  <DIV class="regLabel"><?  echo $pass ?> <input type="password" name="pass1" id="pass1"></div>
			  <DIV class="regLabel"><?  echo $repeat_pass ?> <input type="password" name="pass2" id="pass2"></div>  
				<DIV class="regLabel"> <input type="hidden" name="page" value="reg">
			  <input type="hidden" name="lang" value="<? echo $lang ?>">
			  <input type="submit" value="   OK   " name="regOK" STYLE="height:25px"></div>
		</div>
        </form>
</div>