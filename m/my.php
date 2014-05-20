
<?php
$dbHost='db.iati.ee';
$dbUser='student';
$dbPass='student';
$dbName='studentdb';

echo "host - $dbHost";



$con = mysql_connect($dbHost,$dbUser,$dbPass) or die('Server :(');
if($con!=null) echo "  .............   server ok";
else echo "server bad ";

echo "<br>------------------<br>";

  mysql_select_db($dbName) or die('BASE!!');

$sel = "SELECT * FROM kira_users";


  $res = mysql_query($sel, $con) or die($sel);
  
  //die();mysql_error()
 
  if($res!=null) echo "  resourse -  ok";
else echo "resourse bad ";


  
  echo "n-".mysql_num_rows($res);
  
   while ($row = mysql_fetch_row($res)){
      foreach($row as $v) echo "$v ";
   
   echo "<br>";
   }
    /*
               

 print_r($row);
if (!$con || !mssql_select_db($dbName, $con)) {
die("Unable to connect or Select DB.");
}

$sql = mssql_query("SELECT * FROM fan_arms");
$rows = mssql_fetch_array($sql);
print_r($rows);
mssql_free_result($sql);
*/
?>

