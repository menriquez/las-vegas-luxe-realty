<?php
//session_start();
error_reporting(E_ERROR & E_WARNING);

require "env.php";
require "includes/globals.php";
require "includes/utils.php";
require "mls/controller/retsController.php";

$matches=null;
if (preg_match('/page([0-9]+)/',$_SERVER['PATH_INFO'] , $matches, PREG_OFFSET_CAPTURE)) {
    // we are using pagination
    $_REQUEST = unserialize($_SESSION['request_obj']);
}

if (empty($_REQUEST['qs']) && empty($_REQUEST['streetName'])) {
	$city = ucwords(str_replace("-"," ",$_REQUEST['city']));
	$proptype = ucwords(fixDashes($_REQUEST['property-subtype']))."s";

}
else if ($_REQUEST['qs']==1) {
    $city = "GLVAR";
	$proptype = "New ". ucwords($_REQUEST['dosearch']);
}
else {
   $city = ucwords(fixDashes($_REQUEST['city']));
   $sn = ucwords($_REQUEST['streetName']);
   $proptype = " GLVAR Properties on $sn Road ";
}

$action = basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$stg="";
setlocale(LC_MONETARY, 'en_US');
$p1 = "$".number_format($_REQUEST['price_from']);
$p2 = "$".number_format($_REQUEST['price_to']);
if (isset($_REQUEST['price_from'])) $stg = "Between $p1 And $p2";

$page_title = "$city NV $proptype For Sale $stg";
$page_desc = "Luxury Custom $proptype For Sale in $city $stg";
$page_keys = "$city, $proptype, real estate, for sale, $stg";

$homepage = false;

include('includes/header.php');
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTJ5MQD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<link type="text/css" rel="stylesheet" href="<?= $BASE_WEB_URL ?>/css/style.css"/>
<!-- End Google Tag Manager (noscript) -->

<div id="container" class="main">
    <div id="out">

        <!-- turn top notification bar on here by removing this comment

        <div class="notify-bar">
        <div class="container">
        <div class="row">
        <div class="col-md-11">
        <p>Optional notification bar for displaying important messages to your site vistors. It only shows when you want it to.</p>
        </div>
        <div class="col-md-1"><a href="#" class="notify-close"><i class="icon-remove-sign"></i></a></div>
        </div>
        </div>
        </div>

        -->
		<?php include('includes/nav-bar_new.php'); ?>

        <!-- begin featured listings summary block -->
        <div id="featured-listings_marker"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-ms-12">
                    <div class="wide-block">
                        <div class="featured-listings">

                            <div class="row">
                                <div id="featured-listings_marker"></div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- edit featured listings headline here -->
                                    <h2 class="block-title sr-header">
										<?= $city . " " . $proptype . " For Sale" ?><br>
                                        <?= $stg ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="row">

								<?php

                                    $controller = new retsController('all-search');    // register controller with page action and parameter
                                    $controller->invoke();                              // invokde controller to get view

								?>

                            </div>

                        </div>
                        <!-- /end featured listings summary block -->

						<?php include('includes/accordion.php'); ?>

						<?php include('includes/search-form.php'); ?>

                    </div>
                </div>
            </div>
        </div>
        <div id="empty"></div>
        <br>
    </div>
</div>
<!-- begin footer -->

<?php include('includes/footer_new.php'); ?>
<!-- /end footer -->

<!-- Javascript/bootstrap + all other scripts -->
<?php include('includes/bottom_scripts_new.php'); ?>
<!-- /End Scripts -->
</body>

</html>