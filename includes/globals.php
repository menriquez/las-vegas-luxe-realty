<?php


if (constant("DEV_NAME") != "prod")  {
	
    $site_root_dir =  getcwd();
    $base_image_dir = "//lasvegasluxerealty.com" .DIRECTORY_SEPARATOR."rets/";

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//$_SERVER[HTTP_HOST]/";
	$BASE_WEB_IMAGE_URL = "//$_SERVER[HTTP_HOST]/rets";
}
else {
    $site_root_dir =  getcwd();
    $base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."rets/";

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//lasvegasluxerealty.com";

}
