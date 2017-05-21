<?php
class MyQuery{
	
	var $_sql, $_err;
	// First parameter is the table name
	// Second parameter is the offset of id field in the table. Id will be incremented by 1 even if it is not auto increment field.
	// Duplicate entry is checked for every unique filed.
	// If there is any file type field in the template form then field name must contain 'file' within it.
	// If there is any password type field in the template form then field name must contain 'password' within it.
	// 
	function insert_values($table_name, $id_field = 0, $default_id_value = 1){
	    
		global $db,$MyQuery;
		$MyQuery = new MyQuery;
		$MyQuery->_err = "";		
		$_sql = "SELECT * FROM " . $table_name;
		$result = @$db->sql_query($_sql);
		if ( !$result ) { $MyQuery->_err = "Could not run query.<br>"; return false; }

		$fn_str = ""; $fv_str = "";	

		$id_field_flag = @mysql_field_flags($result, $id_field);
		
		if ( !eregi('auto_increment', $id_field_flag) )
		{
			$id_field_name = @mysql_field_name($result, $id_field);
			global $$id_field_name;
		
			if ( empty($$id_field_name) )
			{
				$sql = "SELECT MAX(" . $id_field_name . ") AS " . $id_field_name . " FROM " . $table_name;
				$result_a = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result_a);
				$$id_field_name = $row[$id_field_name] + 1;
				if ( $$id_field_name == 1) $$id_field_name = $default_id_value;
				
			}			
		}
		$from_field = 0;
		$i = $from_field;
		while( $v = @mysql_field_name($result, $i) )
		{
			if ( eregi('file', $v) ) $n = $v . "_name";
			else $n = $v;

			if ( !isset($$n) ) global $$n;
			$empty_unique = "no";
			if ( isset($$n) )
			{
				$field_type = @mysql_field_type($result, $i);
				$field_flags = @mysql_field_flags($result, $i);
                
 				if ( !eregi('auto_increment', $field_flags) && (eregi('primary_key', $field_flags) || eregi('multiple_key', $field_flags) || eregi('unique_key', $field_flags)) )
				{   
					if ( empty($$n) ) $empty_unique = "yes";
					else
					{
						if ( $field_type == "int" ) $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = " . $$n;
						else $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = '" . $$n . "'";
	
						$result = $db->sql_query($sql);
						$num = $db->sql_numrows($result);
						if ( $num > 0 ) { $MyQuery->_err .= "Duplicate entry for field - " . ereg_replace('[_-]', ' ', $v) . "<br />";  }
					}
				}
				
				if ( $empty_unique == "no" )
				{
					$v_st = "";
					if ( $i != $from_field ){ $fn_str .= ", "; $fv_str .= ","; }		
					
					$fn_str .= $v;
					if ( $field_type == "int" )
					{
						if ( $$n == "" ) $$n = 0;
						$v_st = " " . $$n . " ";
					}
					else
					{
						if ( !isset($$n) ) $$n = '';
						if ( eregi('password', $v) ) $$n = md5($$n);
						$v_st= " '" . $$n . "' ";
					}
					$fv_str .= $v_st;
				}		
			 }
			 else $from_field++;
 
			 $i++;
		}
		if ( $fn_str == "" ) { $MyQuery->_err = "No field value has been given.<br>";return false; }
		$MyQuery->_sql = "INSERT INTO " . $table_name . " (" . $fn_str . ") VALUES (" . $fv_str . ")";
		$db->sql_query($MyQuery->_sql);
		
		
	}
	
	
	
	
	
	
	
	  function insert_values_dynamic_file($table_name, $id_field = 0, $default_id_value = 1){
	    
		global $db,$MyQuery;
		$MyQuery = new MyQuery;
		$MyQuery->_err = "";		
		$_sql = "SELECT * FROM " . $table_name;
		$result = @$db->sql_query($_sql);
		if ( !$result ) { $MyQuery->_err = "Could not run query.<br>"; return false; }

		$fn_str = ""; $fv_str = "";	

		$id_field_flag = @mysql_field_flags($result, $id_field);
		if ( !eregi('auto_increment', $id_field_flag) )
		{
			$id_field_name = @mysql_field_name($result, $id_field);
			$sql = "SELECT MAX(" . $id_field_name . ") AS " . $id_field_name . " FROM " . $table_name;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$$id_field_name = $row[$id_field_name] + 1;
			if ( $$id_field_name == 1) $$id_field_name = $default_id_value;
			
		}
		$from_field = 0;
		$i = $from_field;
		while( $v = @mysql_field_name($result, $i) )
		{
			$n = $v;
			if ( !isset($$n) ) global $$n;
			$empty_unique = "no";
			if ( isset($$n) )
			{
				$field_type = @mysql_field_type($result, $i);
				$field_flags = @mysql_field_flags($result, $i);
                
 				if ( !eregi('auto_increment', $field_flags) && (eregi('primary_key', $field_flags) || eregi('multiple_key', $field_flags) || eregi('unique_key', $field_flags)) )
				{   
					if ( empty($$n) ) $empty_unique = "yes";
					else
					{
						if ( $field_type == "int" ) $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = " . $$n;
						else $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = '" . $$n . "'";
						
						$result = $db->sql_query($sql);
						$num = $db->sql_numrows($result);
						if ( $num > 0 ) { $MyQuery->_err .= "Duplicate entry for field - " . $v . "<br>";  }
					}
				}
				
				if ( $empty_unique == "no" )
				{
					$v_st = "";
					if ( $i != $from_field ){ $fn_str .= ", "; $fv_str .= ","; }		
					
					$fn_str .= $v;
					if ( $field_type == "int" )
					{
						if ( $$n == "" ) $$n = 0;
						$v_st = " " . $$n . " ";
					}
					else
					{
						if ( !isset($$n) ) $$n = '';
						if ( eregi('password', $v) ) $$n = md5($$n);
						$v_st= " '" . $$n . "' ";
					}
					$fv_str .= $v_st;
				}		
			 }
			 else $from_field++;
 
			 $i++;
		}
		if ( $fn_str == "" ) { $MyQuery->_err = "No field value has been given.<br>";return false; }
		$MyQuery->_sql = "INSERT INTO " . $table_name . " (" . $fn_str . ") VALUES (" . $fv_str . ")";
		$db->sql_query($MyQuery->_sql);
		//echo $MyQuery->_sql;
		
	}

	
	
	
	
	
	
	
	
	
	// First parameter is the table name.
	// Second parameter is the update id value of the id field. 
	// Third parameter is the offset of id field in the table.
	// Duplicate entry is checked for every unique filed.
	// If there is any file type field in the template form then field name must contain 'file' within it.
	// If there is any password type field in the template form then field name must contain 'password' within it.
	// 
	function update_values($table_name, $update_id, $id_field = 0){
		
		global $db,$MyQuery;
		$MyQuery = new MyQuery;
		
		$_sql = "SELECT * FROM " . $table_name;
		$result = $db->sql_query($_sql);
		if ( !$result ) { $MyQuery->_err = "Could not run query.<br>"; return false; }
		$from_field = 0;
		$i = $from_field;
		$fn_str = ""; $fv_str = "";	
		
		$id_field_name = @mysql_field_name($result, $id_field);
		
		$detection = "";
		if ( @mysql_field_type($result, $id_field) == "int" ) $detection =  " WHERE " . $id_field_name . " = " . $update_id;
		else $detection =  " WHERE " . $id_field_name . " = '" . $update_id . "'";
		
		while( $v = @mysql_field_name($result, $i) )
		{
			if ( eregi('file', $v) ) $n = $v . "_name";
			else $n = $v;
			global $$n;
			if ( eregi('chk', $n) && !isset($$n) ) $$n = '';
			$empty_unique = "no";
			if ( ( !eregi('file', $v) && isset($$n) ) || ( eregi('file', $v) && !empty($$n) ) )
			{
				$field_type = @mysql_field_type($result, $i);
				$field_flags = @mysql_field_flags($result, $i);
 
 				if ( !eregi('auto_increment', $field_flags) && ( eregi('primary_key', $field_flags) || eregi('multiple_key', $field_flags)  || eregi('unique_key', $field_flags) ) )
				{
					if ( empty($$n) ) $empty_unique = "yes";
					else
					{
						if ( $field_type == "int" ) $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = " . $$n . " AND " . $id_field_name . " != " . $update_id;
						else $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = '" . $$n . "' AND " . $id_field_name . " != " . $update_id;
						$result = $db->sql_query($sql);
						$num = $db->sql_numrows($result);
						
						if ( $num > 0 ) { $MyQuery->_err = "Duplicate entry for field - " . $v; return false;}
					}
				}
				
				if ( $empty_unique == "no" )
				{
					$v_st = "";
					if ( $i != $from_field ){ $fn_str .= ", "; $fv_str .= ","; }		
					$fn_str .= $v . " = ";
					if ( $field_type == "int" )
					{
						if ( $$n == "" ) $$n = 0;
						$v_st = " " . $$n . " ";
					}
					else
					{
						if ( eregi($v,'password') ) $$n = md5($$n);
						$v_st= " '" . $$n . "' ";
					}
					
					$fn_str .= $v_st;
				}
			 }
			 else $from_field++;
			 $i++;
		 }
		 
  		 if ( $fn_str == "" ) { $MyQuery->_err = "No field value has been given.<br>";return false; }
		 
		 $MyQuery->_sql = "UPDATE " . $table_name . " SET " . $fn_str.$detection;
		 $ok = $db->sql_query($MyQuery->_sql);
		 if ( !$ok ) $MyQuery->_err = "Can not update.<br>";
		// echo $MyQuery->_sql;
	}
	


	// Use only this function id '$id_field' field is unique or primary key. REPLACE works exactly like INSERT, except that if an old record in the table has the same 	    // 		value as a new record on a UNIQUE index or PRIMARY KEY, the old record is deleted before the new record is inserted.
	// First parameter is the table name.
	// Second parameter is the offset of id field in the table. Id will be incremented by 1 even if it is not auto increment field.
	// Duplicate entry is checked for every unique filed.
	// If there is any file type field in the template form then field name must contain 'file' within it.
	// If there is any password type field in the template form then field name must contain 'password' within it.
	// 
	function replace_values($table_name, $id_field = 0, $default_id_value = 1){
	    
		global $db,$MyQuery;
		$MyQuery = new MyQuery;
		$MyQuery->_err = "";		
		$_sql = "SELECT * FROM " . $table_name;
		$result = @$db->sql_query($_sql);
		if ( !$result ) { $MyQuery->_err = "Could not run query.<br>"; return false; }

		$fn_str = ""; $fv_str = "";	

		$id_field_flag = @mysql_field_flags($result, $id_field);
		if ( !eregi('auto_increment', $id_field_flag) )
		{
			$id_field_name = @mysql_field_name($result, $id_field);
			global $$id_field_name;
			if ( empty($$id_field_name) )
			{
				$sql = "SELECT MAX(" . $id_field_name . ") AS " . $id_field_name . " FROM " . $table_name;
				$result_a = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result_a);
				$$id_field_name = $row[$id_field_name] + 1;
				if ( $$id_field_name == 1) $$id_field_name = $default_id_value;
			}			
		}
		$from_field = 0;
		$i = $from_field;
		while( $v = @mysql_field_name($result, $i) )
		{
			if ( eregi('file', $v) ) $n = $v . "_name";
			else $n = $v;

			if ( !isset($$n) ) global $$n;
			$empty_unique = "no";
			if ( isset($$n) )
			{
				$field_type = @mysql_field_type($result, $i);
				$field_flags = @mysql_field_flags($result, $i);
                
 				if ( !eregi('auto_increment', $field_flags) && (eregi('primary_key', $field_flags) || eregi('multiple_key', $field_flags) || eregi('unique_key', $field_flags)) )
				{   
					if ( empty($$n) ) $empty_unique = "yes";
					else
					{
						if ( $field_type == "int" ) $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = " . $$n;
						else $sql = "SELECT * FROM " . $table_name . " WHERE " . $v . " = '" . $$n . "'";
						
						$result = $db->sql_query($sql);
						echo $MyQuery->_sql;
						$num = $db->sql_numrows($result);
						if ( $num > 0 ) { $MyQuery->_err .= "Duplicate entry for field - " . ereg_replace('[_-]', ' ', $v) . "<br>";  }
					}
				}
				
				if ( $empty_unique == "no" )
				{
					$v_st = "";
					if ( $i != $from_field ){ $fn_str .= ", "; $fv_str .= ","; }		
					
					$fn_str .= $v;
					if ( $field_type == "int" )
					{
						if ( $$n == "" ) $$n = 0;
						$v_st = " " . $$n . " ";
					}
					else
					{
						if ( !isset($$n) ) $$n = '';
						if ( eregi('password', $v) ) $$n = md5($$n);
						$v_st= " '" . $$n . "' ";
					}
					$fv_str .= $v_st;
				}		
			 }
			 else $from_field++;
 
			 $i++;
		}
		if ( $fn_str == "" ) { $MyQuery->_err = "No field value has been given.<br>";return false; }
		$MyQuery->_sql = "REPLACE INTO " . $table_name . " (" . $fn_str . ") VALUES (" . $fv_str . ")";
		$db->sql_query($MyQuery->_sql);
				
	}
	
	function delete($table,$field_name,$field_value=0) {
		global $db;	
		$sql = "DELETE FROM " . $table . (!empty($field_value) ? " WHERE $field_name =" . $field_value : '');	   
		$db->sql_query($sql);	
	}
	

}
?>