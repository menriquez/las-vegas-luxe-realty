
    <div id="footer">
        <div class="top">
            <div class="container"> 
                <div class="row">
                    <div  class="col-md-4 col-xs-12  text-center">
                        <!-- edit footer logo here -->
                        <a href="#" class="logo"><img src="<?= $BASE_WEB_URL ?>/img/logo.png" alt="" /></a>
                    </div>
                    <div  class="col-md-4 col-xs-12  text-center">
                        <a href="#" class="logo"><img src="<?= $BASE_WEB_URL ?>/img/rh-logo.png"  alt="" /></a>
                        RIGHT HERE® REALTY
                    </div>

                    <div class="col-md-4 col-xs-12  text-center" >
                        <!-- begin newsletter form area -->
                        <div class="text text-center">
                            <div class="header ">NEWSLETTER</div>
                            <p>Enter your e-mail and subscribe to our newsletter.</p>
                        </div>
                        <div class="subscribe center-block">
                            <form action="/contact-me.php?type=newsletter" method="post">
                                <input type="text" name="femail" id="femail" placeholder="Email Address" />
                                <input type="submit" value="GO" class="styler_bg_color" />
                            </form>
                        </div>
                        <!-- /end newsletter form area -->
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 text-center">
                        <!-- begin disclaimer here -->
                        <div class="text">
                            <div class="header">DISCLAIMER</div>
                            <!-- edit your disclaimer text here -->
                            <p>Information is from the multiple listing service and neither suggests nor infers that the Sahar Saljougui or RightHere Realty participated as either the listing or cooperating agent or broker in the sale or purchase of the properties depicted.</p>
                            <p >All properties listed in this web site are available on an equal opportunity basis.</p>
                        </div>
                        <!-- /end disclaimer -->
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom ">
            <div class="container">
                <div class="row text-center">
                    <!-- edit copyright notice here -->
                    <div class="copyrights">Design / RETS by <a href="https://webware.guru">Webware PHP Development :: Mark Enriquez</a> &copy2016 - <?= date('Y') ?></div>
                </div>
            </div>
        </div>
    </div>