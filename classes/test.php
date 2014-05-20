<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<?/*
include('MyTag.class.php');include('MySelect.class.php');$s=new MySelect('select');$a=array('-----','orange','apple', 'limon');$b=array(0,1,2,3);$s->addOps($a, $b, 3);
echo $s->getView();*/
include('../config.php');$f=array('name', 'lastname');$v=array('kiki', 'viki');$db->insert('fan_users', $f, $v);

?>
</body>
</html>
