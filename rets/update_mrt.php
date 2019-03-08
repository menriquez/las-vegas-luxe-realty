<?php

require('database.php');
  
$sql= " DROP table IF EXISTS mrt_bu";
mysqli_query($conn, $sql) or die(mysqli_error($conn) . $sql);
echo "DROPPED table mrt_bu...\n"; 

$sql= "RENAME TABLE master_rets_table TO mrt_bu";
mysqli_query($conn,$sql) or die(mysqli_error($conn) . $sql);
echo "MOVED table master_rets_table to mrt_bu...\n";

$sql= "RENAME TABLE master_rets_table_update TO master_rets_table";
mysqli_query($conn,$sql) or die(mysqli_error($conn) . $sql);
echo "MOVED table master_rets_table_update to master_rets_table...\n";

$sql= "CREATE TABLE master_rets_table_update LIKE mrt_bu"; 
mysqli_query($conn,$sql) or die(mysqli_error($conn) . $sql);
echo("CREATED fresh master_rets_table_update from mrt_bu...DONE!\n\n");