<?
class DbMS
{
    var $link;
    var $res;
    
    
    function DbMS($db_host, $db_user, $db_pass, $db_name)
    {
        $this->link = mssql_connect($db_host, $db_user, $db_pass);
      
        mssql_select_db($db_name);// or die(mssql_select_dberror());
       // mssql_select_dbset_charset('utf8');
    }
    //next function full result resource
    function query($sql)
    {
        $res       = mssql_query($sql, $this->link) or die($sql);
		
		$this->res = $res;
        return $res;
    }
    
    function ind_array() //
    {
        // this function must  return result of SQL query as simple 2-x INDEX array
        if (isset($this->res))
            while ($row = mssql_fetch_row($this->res))
                $ind_arr[] = $row;
        return $ind_arr;
    }
    
    
    function num_rows()
    {
        // this function must return rownumbers in result from SQL query   
        
		$num_rows = mssql_num_rows($this->res);
        return $num_rows;
    }
    
    
    function assoc_array()
    {
        //this function must return 2-x array, where rows has index , but columns has associative kay that is 
        // columns names in SQL query
	$assoc_array=array();

        if($this->num_rows()>0)
	        while ($row = mssql_fetch_assoc($this->res))
        	    $assoc_array[] = $row;
        return $assoc_array;
    }
    
    
    function fields()
    {
        //this function must return fields names from result of SQL query
        //$this->query($query);
        $coln = mssql_num_fields($this->res);
        for ($i = 0; $i < $coln; $i++)
            $field_names[]=mssql_field_name($this->res, $i);
        return $field_names;
    }
    
    function fetch_object()
    {
        //this function must return reulst of SQL query as objects array
        $obj_array=array();

        if($this->num_rows()>0)
        while ($row = mssql_fetch_object($this->res))
            $obj_array[] = $row;
        return $obj_array;
    }
    
    
    function insert_id()
    {
        //this function must return last id from SQL query THAT  as INSERT
      //  return mssql_insert_id();
    }
    
    
    
    function structure($table_name)
    {
        //this function must return table structure - fields list only
        $field_names = $this->fields("SELECT * FROM $table_name");
        return $field_names;
    }
    
    
}
?>