<?php

$is_sean = false;

if ($is_sean)  {
	$site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
	$base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."mls/photos/";           

	$BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
	$BASE_WEB_URL = "http://localhost:8080/";
}
else {
	$site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
	$base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."mls/photos/";           

	$BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
	$BASE_WEB_URL = "https://lasvegasluxerealty.com";
	
}
