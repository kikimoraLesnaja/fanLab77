 <div id="profil">
 <div class="errorS"><?  echo $errorString ?></div>
 
        <form action="" method="post">
        
		<p><?  echo $userProfil ?></p>
		
          <p><?  echo $_SESSION['snick'] ?></p>
        
          
		
			  <p><?  echo $email ?></p>
			  <p><input type="text" name="email" id="email"  value="<? echo $e_mail ?>"></p>
			  
			  
			  
			  
			 
			 
			   <p><?  echo $firstname ?></p>
			  <p><input type="text" name="firstname" id="firstname"  value="<? echo $first_name ?>"></p>
			  <p><?  echo $lastname ?></p>
			  <p><input type="text" name="lastname" id="lastname" value="<? echo $last_name ?>"></p>
			  <p><?  echo $tel ?></p>
			   <p><input type="text" name="phone" id="phone" value="<? echo $phone ?>"></p>
			
			  <p><?  echo $chpass ?> &nbsp; <input type="checkbox" name="chp" id="chp" onclick="chboxik(this)"></p>
			  <div id="passBox">
				  <p><?  echo $pass ?></p>
				  <p><input type="password" name="pass1" id="pass1" ></p>
				  <p><?  echo $repeat_pass ?></p>
				   <p><input type="password" name="pass2" id="pass2"></p>
			 </div>
	
		   <input type="hidden" name="page" value="profil">
		    <input type="hidden" name="lang" value="<? echo $lang ?>">
		   <p><input type="submit" value="   OK   " name="profilOK"></p>
        </form>
	

	</div>