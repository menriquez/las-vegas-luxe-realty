<?php

$is_sean = true;

if ($is_sean)  {
    $site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
    $base_image_dir = "//lasvegasluxerealty.com" .DIRECTORY_SEPARATOR."mls/photos/";           

    $BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
    $BASE_WEB_URL = "//localhost:81/";
}
else {
    $site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
    $base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."mls/photos/";           

    $BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
    $BASE_WEB_URL = "//lasvegasluxerealty.com";
    
}