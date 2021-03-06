<?php

//session_start();                  
error_reporting(E_ALL);
include('includes/globals.php');
include('mls/controller/retsController.php');

//$action=basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Manfredi Plants - Orlando's Freshist Supplier of Trees, Plants, and Shrubs";
$page_desc = "";
$page_keys = "landscape, for sale, plants, shrubs, trees, orange county, seminole county ";

$homepage = true;

include('includes/header-plants.php');
?>
<body>

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

		<?php include('includes/nav-bar_plants.php'); ?>

		<!-- begin slider -->
		<div id="layerslider" class="center-block"  style="margin-top:50px; width: 800px; height: 400px; max-height:400px; max-width: 800px">

			<!-- slide contents goes here -->

			<?php

			$controller = new retsController('carousel-plants');    	// register controller with page action and parameter
			$controller->invoke();                            // invokde controller to get view

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
								<h2 class="block-title styler_color sr-header"  >
									Discover Mike's Difference...
								</h2>
								<!-- promo real estate agent's block line divider here -->

								<div class="col-sm-4 col-ms-4">
									<!-- edit real estate agent's promo block image here -->
									<img class="img-responsive scale-img ease-right-1" src="img/mike_crop.jpg" alt="" />
								</div>
								<div class="col-sm-8 col-ms-8">
									<!-- real estate agent's promo block text starts here -->
									<div class="promo-text">
										<!-- edit real estate agent's promo block sub-heading here -->
										<div class="button-center">
											<h3 class="ease-left-1">Trust An Experienced Central Florida Landscaper.</h3>
										</div>
										<br/>
										<!-- edit real estate agent's promo block paragraph text here -->
										<p class="ease-left-1">My focus is to create and maintain outdoor spaces that are functional, beautiful and in harmony with the natural environment.</p>
										<p class="ease-left-1">We are a landscape design/build company and will strive to create your dream space. We will work with you to develop a comprehensive plan for your site; one that combines your requirements, with the ecological characteristics of the land, and the style of the house.</p>
										<p class="ease-left-1">Whatever your landscape needs is, give us a call and we will provide a free consultation and estimate.</p>

										<p class="ease-left-1">Manfredi Plants has been servicing businesses and homeowners in Orlando and the Central Florida surrounding area for over 14 years. We are a complete landscape and lawn care service company dedicated to customer satisfaction, specializing in construction, installation & maintenance. </p>
										<img class="ease-left-1" style="float: left;padding-bottom: 30px;" src="img/SaharSig.png" alt="" />

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

						<!-- MLS Search form ends here -->

						<!-- awards and associations logo block starts here -->
						<!-- Remove this comment for award sections
						<div class="wide-block">
						<div class="awards-block">
						<div id="awards_marker"></div>
						<div class="row">
						<div class="col-sm-3 col-ms-3">

						<img src="img/award1.jpg" alt="" />
						</div>
						<div class="col-sm-3 col-ms-3">

						<img src="img/award2.jpg" alt="" />
						</div>
						<div class="col-sm-3 col-ms-3">

						<img src="img/award3.jpg" alt="" />
						</div>
						<div class="col-sm-3 col-ms-3">

						<img src="img/award4.jpg" alt="" />
						</div>
						</div>
						</div>
						</div>
						-->
						<!--
						<!-- begin resources - ->                                
						<div class="resources clearfix">
						<div id="resources_marker"></div>
						<!-- edit the resources heading here - ->
						<h2 class="block-title styler_color">
						MOVING RESOURCES
						</h2>
						<div class="block-separator clearfix"></div>
						<div class="resources-wrapper">
						<div class="col-md-4 col-sm-4">
						<!-- edit the resources tabs here - ->
						<ul class="nav nav-tabs">
						<li class="styler_parent_active active"><a class="styler_bg_color styler_active_color" href="#movers" data-toggle="tab">Movers</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#contractors" data-toggle="tab">Contractors</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#utilities" data-toggle="tab">Utilities</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#lenders" data-toggle="tab">Lenders</a></li>
						</ul>
						</div>
						<div class="col-md-8 col-sm-8">
						<div class="tab-content">
						<!- - edit tab #1 (movers) content here - ->
						<div class="tab-pane active" id="movers">
						<div class="top-sector">
						<div class="title">
						Around the block moving
						</div>
						<address>
						9535 Forest Lane<br />
						Dallas, TX 75254<br />
						(214)348-8888
						</address>
						<a class="lnk styler_color" href="#">www.atbmoving.com</a>                                                
						</div>
						<div class="bottom-sector">
						<div class="title">
						United Moving Company
						</div>
						<address>
						7500 Churchill Road<br />
						Dallas, TX 75231<br />
						(214)348-8888
						</address>
						<a class="lnk styler_color" href="#">www.umcservices.com</a>                                                
						</div>
						</div>
						<!- - edit tab #2 (contractors) content here - ->
						<div class="tab-pane" id="contractors">
						<div class="top-sector">
						<div class="title">
						NewLeaf Remodeling, Inc.
						</div>
						<address>
						5105 Royal Lane<br />
						Dallas, TX 75235<br />
						(214)649-6680
						</address>
						<a class="lnk styler_color" href="#">www.newleafremodel.com</a>
						</div>
						<div class="bottom-sector">
						<div class="title">
						Stevens & Sons Plumbing
						</div>
						<address>
						9935 Forest Lane<br />
						Dallas, TX 75290<br />
						(214)348-8888
						</address>
						<a class="lnk styler_color" href="#">www.stevensplumbers.com</a>                                                
						</div>
						</div>
						<!- - edit tab #3 (utilities) content here - ->
						<div class="tab-pane" id="utilities">
						<div class="top-sector">
						<div class="title">
						Comcast (Dallas Office)
						</div>
						<address>
						3335 Munger Road<br />
						Dallas, TX 75235<br />
						(972)556-7000
						</address>
						<a class="lnk styler_color" href="#">www.comcast.com</a>                                                
						</div>
						<div class="top-sector">
						<div class="title">
						Time Warner Cable (Dallas Office)
						</div>
						<address>
						4500 Luther Lane<br />
						Dallas, TX 75234<br />
						(214)888-8888
						</address>
						<a class="lnk styler_color" href="#">www.twc.com</a>                                                
						</div>
						</div>
						<!- - edit tab #4 (lenders) content here - ->
						<div class="tab-pane" id="lenders">
						<div class="top-sector">
						<div class="title">
						Prime Lending & Associates
						</div>
						<address>
						9535 Preston Road<br />
						Suite 600<br />
						Dallas, TX 75252<br />
						(214)325-8866
						</address>
						<a class="lnk styler_color" href="#">www.primelending.com</a>                                                
						</div>
						<div class="top-sector">
						<div class="title">
						Texas Lending, LLC.
						</div>
						<address>
						4400 Hillcreat Road<br />
						Dallas, TX 75245<br />
						(214)348-8888
						</address>
						<a class="lnk styler_color" href="#">www.texaslending.com</a>                                                     
						</div>
						</div>
						</div>
						</div>
						</div>
						</div>
						-->
						<!-- /end resources -->
						<?php include('includes/accordion.php'); ?>

						<!-- the about section starts here -->
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-ms-12">      
									<div id="about_marker"></div>
									<div class=" about-block">                                                                                        
										<!-- edit the about heading text here -->
										<h2 class="block-title styler_color sr-header">
											About Manfredi Landscaping 
										</h2>
										<div class="block-separator clearfix"></div>
										<div class="col-sm-8 col-ms-8">
											<!-- edit the about text here -->
											<div class="promo-text ease-right-2">
												<p>Born and raised in France and with an Iranian background, I have a natural understanding and appreciation for the diversity of cultures. I am also fluent in French, Spanish, English and Farsi.
													I am a tireless worker and will help you in any way that I can because it is what I truly love to do. </p>
												<p>My family being so close and important to me, I understand that the right house provides a comfortable place to call your own and a gathering place for relatives and friends.</p>
												<p>Outside of work, I enjoy the outdoors. I love to travel, hike with my dog, really anything that gets me outside in nature. I love meeting new people and experiencing new places, I also enjoy painting and reading in my free time.
													Please help me help you by providing the basics of what you are looking for and your personal real estate likes and dislikes. I will find you what you are looking for!
													Sincerely,</p>
											</div>
										</div>
										<!-- realtor about image area starts here -->
										<div class="col-sm-4 col-ms-4">
											<!-- edit edit the realtor about image here -->
											<img class="img-responsive vcenter img-circle center-block ease-left-2" src="img/mike_face.jpg" alt="Melanie Saljougui, your real estate pro!" />
											<img class="img-responsive vcenter scale-img  center-block ease-left-2" src="img/mel_dog.png" alt="Melanie Saljougui, your real estate pro!" />
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
	<?php include('includes/footer_new.php'); ?>
	<!-- /end footer -->

	<!-- Javascript/bootstrap + all other scripts -->
	<?php include('includes/bottom_scripts_new.php');  ?>
	<!-- /End Scripts -->

</body>

</html>