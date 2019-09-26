<?php $base_root_dir = dirname(__DIR__,3) ?>
<div id="myModalLanding" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="bottom-contact">
                    <div class="row">
                        <div class="col-md-12 col-  sm-12 center-block">
                            <form role="form" id="landing-validForm">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control" id="inputName" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="fullemail" required class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea id="text-landing-contact" name="fullmsg" class="form-control" rows="10" value="">Hi Sahar, I'm interested in talking you you about buying a home in the Greater Las Vegas Area! </textarea>
                                </div>
                                <div class="g-recaptcha " data-sitekey="6LfbiiQUAAAAALGCA34UF3a4wvi9l67Z7ivSiEnH" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>

                                <?php
                                    //recaptcha config
                                    $use_recaptcha = true;
                                    $publickey = "6LfbiiQUAAAAALGCA34UF3a4wvi9l67Z7ivSiEnH";
                                    $privatekey = "6LfbiiQUAAAAAHgnrQjKn0G2ETmF7t_0LY_Y_vjo";
                                    require_once( 'recaptchalib.php');
                                    if($use_recaptcha === true){
                                        echo recaptcha_get_html($publickey);
                                    }
                                ?>

                                <div id="result"></div>
                                <input type="submit" id="modal-contact-landing" value="Send Message" class="btn btn-primary submit styler_bg_color">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="address">
                            <div class="col-sm-6">
                                <div class="title styler_color">Key Realty</div>
                                <address class=" styler_color">
                                    Sahar Saljougui<br />
                                    9890 S. Maryland Pkwy. Suite 200  <br />
                                    Las Vegas, Nevada 89193<br />
                                    <br />
                                </address>
                            </div>
                            <div class="col-sm-6">
                                <div class="title styler_color">Phone & Email</div>
                                <address class=" styler_color">   
                                    <a href="tel:415-815-9079"><i class="fa fa-mobile-phone"></i> 415-815-9079</a><br /><a href="tel:702-313-7003"><i class="fa fa-phone"></i> 702-313-7003</a> <br />
                                    <a TARGET="_blank"  href="">
                                </address>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-default center-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>