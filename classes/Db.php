<?
class Db
{
    var $link;
    var $res;
    
    
    function Db($db_host, $db_user, $db_pass, $db_name)
    {
	//echo "form DB";
			if(DEBUG_MODE){
				$this->link = mysql_connect($db_host, $db_user, $db_pass) or die();
				mysql_select_db($db_name) or die(mysql_error());
				}
			else {
			$this->link = mysql_connect($db_host, $db_user, $db_pass);
        //mysql_select_db($db_name, $res);
			mysql_select_db($db_name) ;
			}
        mysql_set_charset('utf8');
    }
    //next function full result resource
    function query($sql)
    {
		if(DEBUG_MODE)
			$res       = mysql_query($sql, $this->link) or die("ERROR SQL: $sql");
			else $res       = mysql_query($sql, $this->link);
		
		$this->res = $res;
        return $res;
    }
    
    function ind_array() //
    {
        // this function must  return result of SQL query as simple 2-x INDEX array
        if (isset($this->res))
            while ($row = mysql_fetch_row($this->res))
                $ind_arr[] = $row;
        return $ind_arr;
    }
    
    
    function num_rows()
    {
        // this function must return rownumbers in result from SQL query   
        
		$num_rows = mysql_num_rows($this->res);
        return $num_rows;
    }
    
    
    function assoc_array()
    {
        //this function must return 2-x array, where rows has index , but columns has associative kay that is 
        // columns names in SQL query
	$assoc_array=array();
		//echo "nun =".$this->num_rows();
        if($this->num_rows()>0)
	        while ($row = mysql_fetch_assoc($this->res))
        	    $assoc_array[] = $row;
        return $assoc_array;
    }
    
    
    function fields()
    {
        //this function must return fields names from result of SQL query
        //$this->query($query);
        $coln = mysql_num_fields($this->res);
        for ($i = 0; $i < $coln; $i++)
            $field_names[]=mysql_field_name($this->res, $i);
        return $field_names;
    }
    
    function fetch_object()
    {
        //this function must return reulst of SQL query as objects array
        $obj_array=array();

        if($this->num_rows()>0)
        while ($row = mysql_fetch_object($this->res))
            $obj_array[] = $row;
        return $obj_array;
    }
    
    
    function insert_id()
    {
        //this function must return last id from SQL query THAT  as INSERT
        return mysql_insert_id();
    }
    
    
    
    function structure($table_name)
    {
        //this function must return table structure - fields list only
        $field_names = $this->fields("SELECT * FROM $table_name");
        return $field_names;
    }
    
     function insert($tableName, $fields, $values){
	  foreach($values as $v)
		$val[]="'$v'";
		
	  $sel="INSERT INTO $tableName (". implode(',', $fields). ") VALUES (".implode(',', $val).')';
	  $this->query($sel);
	 }
	 
	 function delete($tableName, $field, $value){
	  $sel="DELETE FROM $tableName WHERE  $field='$value'";
	  $this->query($sel);
	 }
}
?>