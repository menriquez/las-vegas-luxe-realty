<?php

$base_root_dir = dirname(__DIR__);
require_once  $base_root_dir . '/env.php';

if (constant("DEV_NAME") != "prod")  {
    //$ACTIVE_DOMAIN=$_SERVER['HTTP_HOST'];
    $configDB = array(
      'DB_HOST' => '173.82.119.134',
      'DB_NAME' => 'admin_lvlr',
      'DB_USER' => '',
      'DB_PASS' => '',
      'DB_DRIVER' => 'mysql'
    );

}
else {
    $configDB = array(
      'Dbreak;B_HOST' => '173.82.119.134',
      'DB_NAME' => 'admin_lvlr',
      'DB_USER' => '',
      'DB_PASS' => '',
      'DB_DRIVER' => 'mysql'
    );
}

echo "Connecting to database..\n";
$conn=mysqli_connect($configDB['DB_HOST'], $configDB['DB_USER'], $configDB['DB_PASS'], $configDB['DB_NAME']) or die(mysqli_error());
if ($conn) echo "db ".$configDB['DB_HOST'].":".$configDB['DB_NAME']." CONNECT OK\n";

