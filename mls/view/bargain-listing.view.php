<?php global $BASE_WEB_URL ?>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <!-- featured item  house #1 summary info -->
                            <div class="featured-item box-seq shadow-back">
                                <!-- house #1 image -->
                                <a id="mls-<?= $this->model->getMLS() ?>" href="//<?= $BASE_WEB_URL ?>/property-details/<?= $this->model->buildURI() ?>" class="property-link"> <img class="img-responsive" style=" " src="<?= $this->model->getFrontPicFn()?>" alt=""></a>
                                <!-- house #1 headline -->
                                <div class="heading lead"><strike id="prev-price-strike"><?= $this->model->getPrevPrice()?></strike> <?= $this->model->getPrice()?></div>
                                <!-- house #1 summary content -->
                                <div class="content">
                                    <!-- house #1 summary content: address -->
                                    <address>
                                        <?= $this->model->getStreetAddress()?><br />
                                        <?= $this->model->getCityStZip()?>   
                                    </address>
                                    <!-- house #1 summary content characteristics -->
                                    <div class="characteristics">
                                       <ul>
                                                <li><?= $this->model->getTotalSqFt() ?> Ft<sup>2</sup></li>
                                                <li><?= $this->model->getBeds() ?> Beds</li>
                                                <li><?= $this->model->getBaths() ?> Baths</li>
                                       </ul>

                                        <div class="row"> <div class="col-md-12">
                                            <div class="col-md-5"><span id="pct-discount"><?= $this->model->getPctDiscount() ?>% <i class="fa fa-cart-arrow-down"></i></span></div>

                                            <div class="col-md-7"><span id="days-reduced"><?= $this->model->getDOM() ?> Day<?= $this->model->getDOM()==1?"":"s" ?> Reduced!</span></div>

                                            </div></div>

                                    </div>
                                    <div class="item-info">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <!-- house #1 summary content: price -->
                                                <div class="characteristics">
                                                    #<?= $this->model->getMLS()?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <!-- link to house #1 featured item detail -->
                                                <div class="more">
                                                    <a id="mls-<?= $this->model->getMLS() ?>" href="//<?= $BASE_WEB_URL ?>/property-details/<?= $this->model->buildURI() ?>" class="view-details-but">View Details</a>
                                                </div>
                                            </div>
                                        </div>                                                            
                                   </div>
                                </div>
                            </div>
                        </div>


