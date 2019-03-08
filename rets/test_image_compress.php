<?php
set_time_limit(0);
error_reporting(E_ALL);

/**
 * Created by PhpStorm.
 * User: markie
 * Date: 2/25/2019
 * Time: 12:47 PM
 */

include('preg_find.php');
include('../includes/globals.php');
include('simpleImage.php');

$base_dir   = "photos/";
$compress_dir = "photo_compress/";

foreach ( preg_find('/jpg/', 'photos', PREG_FIND_SORTFILESIZE + PREG_FIND_RETURNASSOC ) as $file ) {

    if ($file['stat']['size'] < 120000) continue;

    $image = new SimpleImage();
    $fn = $file['basename'];

    $image->load($base_dir.$fn);
    $image->save($compress_dir.$fn ,IMAGETYPE_JPEG, 45);


}
