<?php
error_reporting(E_ERROR | E_WARNING);

require "env.php";
include('includes/globals.php');
require('mls/controller/retsController.php');

$controller = new retsController('loadmls');        // register controller with page action and parameter
$controller->invoke();

$page_title = $controller->detail_listing_page_title;
$page_desc = $controller->detail_listing_page_desc;
$page_keys = $controller->detail_listing_page_keys;

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

        <?php include('includes/nav-bar_new.php'); ?>

        <!-- <div class="container">  -->
        <div class="container">

            <!-- begin featured listings summary block -->
            <?php

	            $controller = new retsController('showmls'); // register controller with page action and parameter
	            $controller->invoke();                            // invokde controller to get view

            ?>

            <?php //include('includes/search-form.php'); ?>

        </div>

        <!--   </div>  -->

    </div>
    <div id="empty"></div>
</div>

<!-- begin footer -->
<?php include('includes/footer_new.php'); ?>
<!-- /end footer -->

<!-- Javascript/bootstrap + all other scripts -->
<?php include('includes/bottom_scripts_new.php'); ?>

<!-- /End Scripts -->

</body>

</html>
