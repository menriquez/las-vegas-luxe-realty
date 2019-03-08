<?php

//session_start();                  
error_reporting(E_ERROR + E_WARNING);
$base_file_path = $_SERVER['DOCUMENT_ROOT'];
require "includes/globals.php";
require "mls/controller/retsController.php";

//$action=basename(__FILE__, '.php');               // load action from filename for consistency (index for this case)
//$controller = new retsController($action);        // register controller with page action and parameter
//$controller->invoke();                            // invoke controller to get view

$city_array = array("Henderson", "North Las Vegas", "Pahrump", "Boulder City", "Overton", "Ely", "Logandale", "Laughlin");
$tot = count($city_array);

$city = $city_array[rand(0, $tot)];

$page_title = "Las Vegas Luxe Real Estate - Simply the Best Las Vegas and Nevada MLS Homes, Condos, and Townhomes `For Sale";
$page_desc = "Real estate agents specializing finding a Realtor in Las Vegas, Nevada  Sell a Home Fast. Homes and Condos For Sale, how to find a Realtor in Las Vegas ";
$page_keys = "real estate, for sale, for rent, best Realtor near Las Vegas, top realtor for buying a new home, selling a home, sell home fast, home selling tips, cost of selling your home, 
              sell a home fast, fastest way to sell a home in Las Vegas, home selling tips, cost of selling your home, marketing your home, ways to sell your home, house staging tips, how to stage your home,
              foreclosure in Las Vegas, foreclosures in Las Vegas, short sales, short selling, short sale process, foreclosure, cons of a short sale, short selling your home, for sale by owner, why to use a Realtor,
              property for sale by owner,  for sale by owner listings, listing property for sale by owner, selling your home by owner, tips for selling your home, top tips to get the best offer, mls listings,
              real estate listing mls, mls real estate listings, multiple listing services, first time home buyer guide, best homes for first time home buyer, first time home buyer programs, first time home buyer help
              list of real estate agents, reviews of Realtor, best schools near Las Veges, relocation Realtor in Las Vegas";

$homepage = true;


require "$base_file_path/includes/header.php";

?>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTJ5MQD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<link type="text/css" rel="stylesheet" href="css/style.css"/>


<!-- End Google Tag Manager (noscript) -->

<div id="container" class="main">

    <div id="out">

        <?php include 'includes/nav-bar_new.php'; ?>

        <!-- begin slider -->
        <div id="layerslider" class="center-block"
             style="margin-top:50px; width: 800px; height: 400px; max-height:400px; max-width: 800px">

            <!-- slide contents goes here -->

            <?php

	            $controller = new retsController('carousel');        // register controller with page action and parameter
	            $controller->invoke();                            // invokde controller to get view

            ?>

        </div>

        <!-- /end slider -->

        <div class="container">   <?= "test" ?>
            <div class="row">

                <div class="col-sm-12 col-ms-12">

                    <div class="row">

                        <div class="col-sm-12 col-ms-12">

                            <div class="promo-block">
                                <!-- edit real estate agent's promo block heading here -->
                                <br>
                                <h2 class="block-title styler_color sr-header">
                                    Discover Sahar's Difference...
                                </h2>
                                <!-- promo real estate agent's block line divider here -->

                                <div class="col-sm-4 col-ms-4">
                                    <!-- edit real estate agent's promo block image here -->
                                    <img class="img-responsive scale-img ease-right-1" src="img/mel_crop3.png" alt=""/>
                                </div>
                                <div class="col-sm-8 col-ms-8">
                                    <!-- real estate agent's promo block text starts here -->

                                    <div class="promo-text">
                                        <!-- edit real estate agent's promo block sub-heading here -->
                                        <div class="button-center">
                                            <h3 class="ease-left-1">Trust An Experienced Las Vegas MLS Agent.</h3>
                                        </div>
                                        <br/>
                                        <!-- edit real estate agent's promo block paragraph text here -->
                                        <p class="ease-left-1">I am dedicated to matching prospective buyers with a
                                            house that meets their needs and that they will truly love! I believe in
                                            listening to my clients and providing them with listings that are within
                                            their price range and matching them with homes that exceed their
                                            expectations.</p>
                                        <p class="ease-left-1">I have a diverse skill set with a solid natural sciences
                                            and business educational background. I hold a BA in Biology from Sacramento
                                            State University and an MBA Marketing from Golden Gate University, San
                                            Francisco. </p>
                                        <img class="ease-left-1" style="float: left;padding-bottom: 30px;"
                                             src="img/SaharSig.png" alt=""/>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- begin featured listings summary block -->
                    <div id="featured_marker"></div>
                    <div class="wide-block">
                        <div class="featured-listings">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- edit featured listings headline here -->
                                    <h2 class="block-title styler_color sr-header">
                                        Las Vegas & Henderson NV New MLS Listings
                                    </h2>
                                </div>
                            </div>
                            <!-- row #1 featured listings summary block -->
                            <div id="featured-listings_marker"></div>
                            <div class="row">
                                <?php

                                $controller = new retsController('featured-listing'); // register controller with page action and parameter
                                $controller->invoke();                            // invokde controller to get view

                                ?>
                            </div>
                        </div>
                        <!-- /end featured listings summary block -->

                        <!-- featured property #1 details start here -->
                        <?php

                        //		$controller = new retsController('property-item'); // register controller with page action and parameter
                        //		$controller->invoke();                           // invokde controller to get view

                        ?>

                        <?php

                        //$controller = new retsController('contact-modal');        // register controller with page action and parameter
                        //$controller->invoke();                            // invokde controller to get view

                        ?>

                        <!-- ==========================MLS Search form starts here=======================================-->
                        <!-- Disabled php, remove the "//" before include to activate -->

                        <?php //include('includes/search-form.php'); ?>

                    </div>

                    <?php require 'includes/accordion.php'; ?>

                    <!-- the about section starts here -->
                    <div class="about-container">
                        <div class="wide-block">
                            <div class="row">
                                <div class="col-sm-12 col-ms-12">
                                    <div id="about_marker"></div>
                                    <div class=" about-block">
                                        <!-- edit the about heading text here -->
                                        <h2 class="block-title styler_color sr-header">
                                            About Sahar Saljougui
                                        </h2>
                                        <div class="block-separator clearfix"></div>
                                        <div class="col-sm-8 col-ms-8">
                                            <!-- edit the about text here -->
                                            <div class="promo-text ease-right-2">
                                                <p>Born and raised in France and with an Iranian background, I have a
                                                    natural understanding and appreciation for the diversity of
                                                    cultures. I am also fluent in French, Spanish, English and Farsi.
                                                    I am a tireless worker and will help you in any way that I can
                                                    because it is what I truly love to do. </p>
                                                <p>My family being so close and important to me, I understand that the
                                                    right house provides a comfortable place to call your own and a
                                                    gathering place for relatives and friends.</p>
                                                <p>Outside of work, I enjoy the outdoors. I love to travel, hike with my
                                                    dog, really anything that gets me outside in nature. I love meeting
                                                    new people and experiencing new places, I also enjoy painting and
                                                    reading in my free time.
                                                    Please help me help you by providing the basics of what you are
                                                    looking for and your personal real estate likes and dislikes. I will
                                                    find you what you are looking for!
                                                    Sincerely,</p>
                                            </div>
                                        </div>
                                        <!-- realtor about image area starts here -->
                                        <div class="col-sm-4 col-ms-4">

                                            <img class="img-responsive vcenter img-circle center-block ease-left-2"
                                                 src="https://imagizer.imageshack.com/v2/150x100q90/921/IC1dFN.jpg"
                                                 alt="Melanie Saljougui, your real estate pro!"/>
                                            <img class="img-responsive vcenter scale-img  center-block ease-left-2"
                                                 src="https://imagizer.imageshack.com/v2/150x100q90/921/IC1dFN.jpg"
                                                 alt="Melanie Saljougui, your real estate pro!"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end  about section  here -->

                    <!-- begin contact form -->
                </div>
            </div>
        </div>

        <!-- Accordian end-->

    </div>
    <div id="empty"></div>
</div>

<!-- begin footer -->
<?php include 'includes/footer_new.php'; ?>
<!-- /end footer -->

<!-- Javascript/bootstrap + all other scripts -->
<?php include 'includes/bottom_scripts_new.php'; ?>
<!-- /End Scripts -->

</body>

</html>
