<?php


if (constant("DEV_NAME") != "prod")  {
	
    $site_root_dir =  getcwd();
    $base_image_dir = $site_root_dir . "\\rets\\photos";
	$base_image_jpeg_dir = $site_root_dir . "\\rets\\photos\\jpeg";
	$_SERVER['DOCUMENT_ROOT'] =  getcwd();

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//127.0.0.1/";
	$BASE_WEB_PHOTOS_URL = "//lasvegasluxerealty.com/rets/photos/";



}
else {
    $site_root_dir =  getcwd();
    $base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."rets".DIRECTORY_SEPARATOR."photos";
	$base_image_jpeg_dir = $site_root_dir .DIRECTORY_SEPARATOR."rets".DIRECTORY_SEPARATOR."photos".DIRECTORY_SEPARATOR."jpeg";

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//lasvegasluxerealty.com/";
	$BASE_WEB_PHOTOS_URL = "//lasvegasluxerealty.com/rets/photos/";


}

$global_browser_id = 0;

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (stripos( $user_agent, 'Safari') !== false) {
	$global_browser_id = 1;
}