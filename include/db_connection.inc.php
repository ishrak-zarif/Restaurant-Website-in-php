<?php
require_once dirname(__FILE__) . '/class/class.mysql.php';
$db = new sql_db(DB_HOST, DB_USER, DB_PASS, DB_NAME, false);
if(!$db->db_connect_id){
   die( '<br/><br/><br/><div align=center>Database Connection Error: Could Not Connect With DB.</div>');
}
?>