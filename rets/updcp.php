<?php
//SET TIME LIMIT
@set_time_limit(0);
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR);

/** START TIME */ 
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;
$start_time = date('G:ia');

//mail("mrk.enriquez@gmail.com","FLEXMLS RETS UPDATE START for tsgfl.com","FLEXMLS RETS Update Started at $start_time", "FROM: rets@tsgfl.com");

/** Data Config **/
require('database.php');

$sql = 'DELETE FROM custom_listings;';
mysqli_query($conn,$sql) or die(mysqli_error($conn) . $sql);

$sql = 'SELECT listing_id from master_rets_table 
              WHERE property_type = "Residential"
                AND city REGEXP "(las vegas|hende
                rson)" 
                AND listing_price > 2000000
                AND listing_price <= 4000000
              ORDER BY rand() DESC
              LIMIT 5';

$rets_results = mysqli_query($conn, $sql);
$totRows = mysqli_num_rows($rets_results);
$curRow = 0;

// get images
if ($totRows > 0) {

	while ($row=mysqli_fetch_assoc($rets_results)) {

		$listing_id=$row['listing_id'];
		system("php rets_update_images_mrtu.php $listing_id");

		$insert_sql = "INSERT INTO custom_listings SET listing_id = $listing_id";
		mysqli_query($conn, $insert_sql);
	}

}
