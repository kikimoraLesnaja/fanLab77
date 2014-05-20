 <div id="register">
 <div class="errorS"><?  echo $errorString ?></div>
        <form action="index.php" method="post">
        
          <p><?  echo $nick ?></p>
           <p><input type="text" name="nickname" id="nickname" value="<? echo $nickname ?>"></p>
          <p><?  echo $email ?></p>
          <p><input type="text" name="email" id="email" value="<? echo $e_mail ?>"></p>
          <p><?  echo $pass ?></p>
          <p><input type="password" name="pass1" id="pass1"></p>
          <p><?  echo $repeat_pass ?></p>
           <p><input type="password" name="pass2" id="pass2"></p>
           <input type="hidden" name="page" value="reg">
		  <input type="hidden" name="lang" value="<? echo $lang ?>">
          <p><input type="submit" value="   OK   " name="regOK"></p>
        </form>
	<div id=""><? echo $reg_descr ?></div>
</div>