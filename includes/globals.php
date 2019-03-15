<?php


if (constant("DEV_NAME") != "prod")  {
	
    $site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
    $base_image_dir = "//lasvegasluxerealty.com" .DIRECTORY_SEPARATOR."mls/photos/";

    $BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
    $BASE_WEB_URL = "//$_SERVER[HTTP_HOST]/";
}
else {
    $site_root_dir =  $_SERVER['DOCUMENT_ROOT'];
    $base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."mls/photos/";

    $BASE_FILE_DIR =  $_SERVER['DOCUMENT_ROOT'];
    $BASE_WEB_URL = "//lasvegasluxerealty.com";

}
