<?php


if (constant("DEV_NAME") != "prod")  {
	
    $site_root_dir =  getcwd();
    $base_image_dir = "//lasvegasluxerealty.com" .DIRECTORY_SEPARATOR."rets/photos/";

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//$_SERVER[HTTP_HOST]/";
}
else {
    $site_root_dir =  getcwd();
    $base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR."rets/photos/";

    $BASE_FILE_DIR =  getcwd();
    $BASE_WEB_URL = "//lasvegasluxerealty.com";

}
