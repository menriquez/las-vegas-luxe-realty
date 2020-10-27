<?php
set_time_limit(0);
$send_notification_email = true;
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR | E_WARNING);

include('database.php');
include('preg_find.php');
include('globals.php');

global $conn;

$foundCnt = $noCnt = 0;

$sql = "select listing_id from master_rets_table ORDER BY listing_id DESC";
$mls_r = mysqli_query($conn,$sql);
$total_props  = mysqli_num_rows($mls_r);
$start_seconds = time();
$timer_count=0;
while ($row = mysqli_fetch_assoc($mls_r)) {

	$list_id = $row['listing_id'];

	$img_match = glob("photos/*$list_id-0.jpg");

	if (count($img_match)==0) {
		$noCnt++;
		system("php rets_update_images_mrtu.php $list_id");
	}
	else {
		$foundCnt++;
		echo "image set found [ $list_id ]\n";
	}

	$timer_count++;

	$sec_elapsed =  time() - $start_seconds;

	// wait 10 seconds to start estimating
	if ($sec_elapsed > 100) {
		$estimate_seconds = intval($sec_elapsed * ($total_props/$timer_count));
		$end_time = ($start_seconds + $estimate_seconds) - time();
		$time_estimate = gmdate("H:i:s", $end_time);
		echo "estimate time remaining: $time_estimate\n";

	}



}

echo "found = $foundCnt ... not found = $noCnt\n";
exit(0);

function delete_images($listing_id)
{

    // Base Images Directory
    // $init_image = $base_image.$listing_id.".jpg";
    $image_count = 0;
    $images = [];


    // fix theact the glob sometimes doens't return an array type...sigh
    $fnArray1 = glob( "photos/*" . $listing_id . "-??.jpg");
    if (!$fnArray1) $fnArray1 = array();
    $fnArray2 = glob("photos/*" . $listing_id . "-?.jpg");
    if (!$fnArray2) $fnArray2 = array();

    // create one array from the two...
    $images = array_merge($fnArray1, $fnArray2);

    // handy way to delete all files in an array...
    echo "Deleting old image set for MLS Id# $listing_id...";
    array_map("unlink", $images);
    echo "...ok" . "\n";

}

function get_single_image_set($listing_id, $rets_object)
{

	global $conn;

    $rets_results = mysqli_query($conn,"select * from `master_rets_table` WHERE  listing_id = '$listing_id';");
    $totRows = mysqli_num_rows($oonn, $rets_results);
    $curRow = 0;

    // get images
    if ($totRows > 0) {

        while ($row = mysqli_fetch_assoc($conn,$rets_results)) {

            get_images($row['listing_id'], $row['photo_count'], $row['rets_key'], $rets_object, null);

        }

    }
}
