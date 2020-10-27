<?php
set_time_limit(0);
$send_notification_email = true;
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR | E_WARNING);

include('database.php');
include('preg_find.php');
include('globals.php');

global $conn;

$delCnt = $keepCnt = 0;


foreach (glob("photos/*-0.jpg") as $file) {


    $fn_parts = explode("-",$file);
	$mls_id = $fn_parts[count($fn_parts)-2];


    $sql = "select * from master_rets_table where listing_id = '$mls_id' ORDER BY listing_id DESC";
    $mls_r = mysqli_query($conn,$sql);
    if ($mls_r != false AND mysqli_num_rows($mls_r) == 0) {
        // ok...no record exists for the image, so we can safely delete the image set..
	    echo "delete image set [ $mls_id ]...\r\n";
	    delete_webp_images($mls_id);
        $delCnt++;

    } else {

        $keepCnt++;
        echo "Keeping image set [ $mls_id ]...\r\n";
    }


}

echo "JPG :: DELCNT = $delCnt\r\nKeepCNT = $keepCnt\r\n";

exit(0);

function delete_webp_images($listing_id) {

	// Base Images Directory
	// $init_image = $base_image.$listing_id.".jpg";
	$image_count=0;
	$images=[];


	// fix the fact the glob sometimes doens't return an array type...sigh
	$fnArray1=glob("photos/*" . $listing_id . "-??.jpg");
	if (!$fnArray1) $fnArray1=array();
	$fnArray2=glob("photos/*" . $listing_id . "-?.jpg");
	if (!$fnArray2) $fnArray2=array();

	// create one array from the two...
	$images=array_merge($fnArray1, $fnArray2);

	// handy way to delete all files in an array...
	echo "Deleting old JPEG image set for MLS Id# $listing_id...";
	array_map("unlink", $images);
	$tot_webp=count($images);
}


function delete_jpeg_images($listing_id) {

	// fix the fact the glob sometimes doens't return an array type...sigh
	$jpgArray1 = glob( "photos/jpeg/*" . $listing_id . "-??.jpg");
	if (!$jpgArray1) $jpgArray1 = array();
	$jpgArray2 = glob("photos/jpeg/*" . $listing_id . "-?.jpg");
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
