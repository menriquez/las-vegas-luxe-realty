<?php

require('database.php');
  
$sql= " DROP table IF EXISTS mrt_bu";
mysql_query($sql) or die(mysql_error() . $sql);
echo "DROPPED table mrt_bu...\n"; 

$sql= "RENAME TABLE master_rets_table TO mrt_bu";
mysql_query($sql) or die(mysql_error() . $sql); 
echo "MOVED table master_rets_table to mrt_bu...\n";

$sql= "RENAME TABLE master_rets_table_update TO master_rets_table";
mysql_query($sql) or die(mysql_error() . $sql); 
echo "MOVED table master_rets_table_update to master_rets_table...\n";

$sql= "CREATE TABLE master_rets_table_update LIKE mrt_bu"; 
mysql_query($sql) or die(mysql_error() . $sql); 
echo("CREATED fresh master_rets_table_update from mrt_bu...DONE!\n\n");