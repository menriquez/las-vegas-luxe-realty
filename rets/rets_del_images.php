<?php
set_time_limit(0);
$send_notification_email = true;
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR | E_WARNING);

include('database.php');
include('preg_find.php');
include('../includes/globals.php');

global $conn;

$delCnt = $keepCnt = 0;


foreach (glob("photos/*-0.jpg") as $file) {

	$fn_parts = explode("-",$file);
	$mls_id = $fn_parts[count($fn_parts)-2];

	echo "delete image set [ $mls_id ]...\r\n";
	delete_jpeg_images($mls_id);
	$delCnt++;

	if ($delCnt == 150) break;

}



exit(0);

function delete_jpeg_images($listing_id) {

	// fix the fact the glob sometimes doens't return an array type...sigh
	$jpgArray1 = glob( "photos/*" . $listing_id . "-??.jpg");
	if (!$jpgArray1) $jpgArray1 = array();
	$jpgArray2 = glob("photos/*" . $listing_id . "-?.jpg");
	if (!$jpgArray2) $jpgArray2 = array();

	// create one array from the two...
	$images = array_merge($jpgArray1, $jpgArray2);

	// handy way to delete all files in an array...
	echo "Deleting old JPEG image set for MLS Id# $listing_id...";
	array_map("unlink", $images);
	$tot_jpeg = count($images);
	echo "...ok [ $tot_jpeg ] JPEG images deleted!" . "\n";

}

function get_single_image_set($listing_id, $rets_object)
{

    $rets_results = mysql_query("select * from `master_rets_table` WHERE  listing_id = '$listing_id';");
    $totRows = mysql_num_rows($rets_results);
    $curRow = 0;

    // get images
    if ($totRows > 0) {

        while ($row = mysql_fetch_assoc($rets_results)) {

            get_images($row['listing_id'], $row['photo_count'], $row['rets_key'], $rets_object, null);

        }

    }
}
