<?php

//session_start();
error_reporting(E_ERROR + E_WARNING);
$base_file_path = getcwd();
$base_image_path = getcwd() . "/rets/";

require "env.php";
require "includes/globals.php";
require "mls/controller/retsController.php";

$city_array = array("Henderson", "North Las Vegas", "Pahrump", "Boulder City", "Overton", "Ely", "Logandale", "Laughlin");
$tot = count($city_array);

$city = $city_array[rand(0, $tot)];

$page_title = "Las Vegas Luxe Real Estate - MLS Real Estate in Las Vegas, Nevada MLS Homes, Condos, and Townhomes.";
$page_desc = "Sahar Saljougui, a top MLS Realor, specializing in finding that perfect MLS House, Condo, or Townhome in Las Vegas, Nevada, or to sell your home fast!";
$page_keys = "las vegas real estate, for sale, for rent, best mls realtor near Las Vegas, top realtor for buying a new home, selling a home, sell home fast, home selling tips, cost of selling your home,
              sell a home fast, fastest way to sell a home in Las Vegas, home selling tips, cost of selling your home, marketing your home, ways to sell your home, house staging tips, how to stage your home,
              foreclosure in Las Vegas, foreclosures in Las Vegas, short sales, short selling, short sale process, foreclosure, cons of a short sale, short selling your home, for sale by owner, why to use a Realtor,
              property for sale by owner,  for sale by owner listings, listing property for sale by owner, selling your home by owner, tips for selling your home, top tips to get the best offer, mls listings,
              real estate listing mls, mls real estate listings, multiple listing services, first time home buyer guide, best homes for first time home buyer, first time home buyer programs, first time home buyer help
              list of real estate agents, reviews of Realtor, best schools near Las Veges, relocation Realtor in Las Vegas";

$homepage = true;

require "includes/header.php";

?>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTJ5MQD"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>

<!-- <link type="text/css" rel="stylesheet" href="css/style.css"/>  -->

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
	            $controller->invoke();                                      // invokde controller to get view

            ?>

        </div>

        <!-- /end slider -->

        <div class="container">
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
                                <div class="block-separator clearfix"></div>

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

	                <?php require 'includes/accordion.php'; ?>
	                <?php require 'includes/search-form.php'; ?>

                    <!-- begin featured listings summary block -->
                    <div id="bargains_marker"></div>
                    <div class="wide-block">
                        <div class="featured-listings">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- edit featured listings headline here -->
                                    <h2 class="block-title sr-header">
                                        Sahar's Exclusive GLVAR MLS Hot Picks Of The Week
                                    </h2>
                                    <div class="block-separator clearfix"></div>
                                    <div id="bargain-hide-text" style="display:none" class="col-md-12">
                                        <h4>[ every day, i hdpickan properties that represent newly listed "bargains"...where the homeowner has recently dropped the asking price at least 4% from the original price!  no where else can you so easily find these timely deals, and I put in a good deal of work into first finding and then posting them for you. I sincerely hope you find your dream home that you are looking for right here, and if you can save thousands of dollars as well...great! don't forget to contact me and ask about any property you see listed here, or just to say "Hi" and to tell my team and I how we could better serve your home buying needs.  thanks! - Sahar ]</h4>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <p id="title-whatsthis" onClick="toggleShowHide('bargain-hide-text')" class="dropdown-toggle" data-toggle="dropdown"  type="button" tabindex="1">[ What Is This? ] <i class="fa fa-bars fa-1x icon-rotates" ></i></p>
                                </div>


                            </div>
                            <br>
                            <br>
                            <!-- row #1 featured listings summary block -->
                            <div id="featured-listings_marker"></div>
                            <div class="row">
				                <?php

				                $controller = new retsController('bargains-listing'); // register controller with page action and parameter
                                $controller->set_bargain_params(0.04,21);
				                $controller->invoke();                            // invoke controller to get view

				                ?>
                            </div>

                        </div>
                        <!-- /end featured listings summary block -->


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

                                    <div class="block-separator clearfix"></div>
                            </div>
                            <!-- row #1 featured listings summary block -->
                            <div id="featured-listings_marker"></div>
                            <div class="row">
                                <?php

                                $controller = new retsController('featured-listing'); // register controller with page action and parameter
                                $controller->invoke();                            // invoke controller to get view

                                ?>
                            </div>
                        </div>
                        <!-- /end featured listings summary block -->

                        <!-- ==========================MLS Search form starts here=======================================-->
                        <!-- Disabled php, remove the "//" before include to activate -->

                        <?php //include('includes/search-form.php'); ?>

                    </div>


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

                                        <div class="col-sm-8 col-ms-8">
                                            <!-- edit the about text here -->
                                            <div class="promo-text ease-right-2">
                                                <p>Born and raised in France and with an Iranian background, I have a
                                                    natural understanding and appreciation for the diversity of
                                                    cultures. I am also fluent in French, Spanish, English and Farsi.</p>
                                                    <p>I am a tireless worker and will help you in any way that I can
                                                        because it is what I truly love to do.</p>
                                                <p>My family being so close and important to me, I understand that the
                                                    right house provides a comfortable place to call your own and a
                                                    gathering place for relatives and friends.</p>
                                                <p>Outside of work, I enjoy the outdoors. I love to travel, hike with my
                                                    dogs, really anything that gets me outside in nature. I love meeting
                                                    new people and experiencing new places, I also enjoy painting and
                                                    reading in my free time.</p>
                                                  <p> <strong> Please help me help you by providing the basics of what you are
                                                    looking for and your personal real estate likes and dislikes.</strong></p>
                                                <p>I will find you what you are looking for!</p>
                                            </div>

                                            <div class="button-center">
                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalLanding"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                    Let Me Help You!
                                                </button>
                                            </div>

                                            <?php
                                             require('mls/view/contact_modal_landing.view.php');
                                            ?>
                                        </div>
                                        <!-- realtor about image area starts here -->
                                        <div class="col-sm-4 col-ms-4">

                                            <img class="img-responsive vcenter img-circle center-block ease-left-2"
                                                 src="//lasvegasluxerealty.com/img/Melanie.png"
                                                 alt="Sahar Saljougui, your real estate pro!"/>
                                            <img class="img-responsive vcenter scale-img  center-block ease-left-2"
                                                 src="//lasvegasluxerealty.com/img/mel_dog.png"
                                                 alt="Sahar Saljougui, your real estate pro!"/>
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
