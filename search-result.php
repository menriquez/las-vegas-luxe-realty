<?php
//session_start();
error_reporting(E_ALL);
require "env.php";
include('mls/controller/retsController.php');

$action = basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Las Vegas Luxe Realty - ";
$page_desc = "Realtor, Realtors, Real estate agents specializing finding a Realtor in $city and Henderson Nevada  Sell a Home Fast. Homes and Condos For Sale, how to find a Realtor in $city ";
$page_keys = "real estate, for sale, for rent, best Realtor near $city, top realtor for buying a new home, selling a home, sell home fast, home selling tips, cost of selling your home, 
              sell a home fast, fastest way to sell a home in $city, home selling tips, cost of selling your home, marketing your home, ways to sell your home, house staging tips, how to stage your home,
              foreclosure in $city, foreclosures in $city, short sales, short selling, short sale process, foreclosure, cons of a short sale, short selling your home, for sale by owner, why to use a Realtor,
              property for sale by owner,  for sale by owner listings, listing property for sale by owner, selling your home by owner, tips for selling your home, top tips to get the best offer, mls listings,
              real estate listing mls, mls real estate listings, multiple listing services, first time home buyer guide, best homes for first time home buyer, first time home buyer programs, first time home buyer help
              list of real estate agents, reviews of Realtor, best schools near $city, relocation Realtor in $city";

$homepage = false;

include('includes/header.php');
?>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTJ5MQD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<link type="text/css" rel="stylesheet" href="<?= __DIR__ ?>/css/style.css"/>
<!-- End Google Tag Manager (noscript) -->

<div id="container" class="main">
    <div id="out">

        <?php include('includes/nav-bar_new.php'); ?>

        <!-- begin featured listings summary block -->
        <div class="container">
            <div class="row">
                <!-- begin real estate agents promo block -->
                <div class="col-sm-12 col-ms-12">
                    <div class="wide-block">
                        <div class="featured-listings">
                            <div class="row">
                                <div id="featured-listings_marker"></div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- edit featured listings headline here -->
                                    <h2 class="block-title styler_color sr-header">
                                        <?= $city ?> MLS Listings
                                    </h2>
                                </div>
                            </div>
                            <!-- row #1 featured listings summary block -->
                            <div id="featured-listings_marker"></div>
                            <div class="row">
                                <?php

                                $controller = new retsController('all-search');    // register controller with page action and parameter
                                $controller->invoke();                              // invokde controller to get view

                                ?>
                            </div>
                        </div>
                        <!-- /end featured listings summary block -->
                        <!-- featured property #1 details start here -->

                        <?php

                        //        $controller = new retsController('city-property-item'); // register controller with page action and parameter
                        //        $controller->invoke();                           // invokde controller to get view

                        ?>

                        <!-- ==========================MLS Search form starts here=======================================-->
                        <!-- Disabled php, remove the "//" before include to activate -->

                        <?php //include('includes/search-form.php'); ?>

                        <!-- MLS Search form ends here -->

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