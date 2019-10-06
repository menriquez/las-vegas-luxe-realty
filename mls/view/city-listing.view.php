<?php $BASE_WEB_URL = "//$_SERVER[HTTP_HOST]"; ?>
																							<div class="col-lg-4 col-md-4 col-sm-6">
																								<!-- featured item  house #1 summary info -->
																								<div class="featured-item box-seq shadow-back">
																									<!-- house #1 image -->
                                                                                                    <a id="mls-<?= $this->model->getMLS() ?>" href="<?= $BASE_WEB_URL ?>/property-details<?= $this->model->buildURI() ?>" class="property-link"> <img class="img-responsive" src="<?= $this->model->getFrontPicFn()?>" alt="<?= $this->model->buildAltTag()?>"></a>
                                                                                                    <!-- house #1 headline -->
																									<div class="heading styler_bg_color lead"><?= $this->model->getPrice()?></div>
																									<!-- house #1 summary content -->
																									<div class="content">
																										<!-- house #1 summary content: address -->
																										<address>
																											<?= $this->model->getStreetAddress()?><br />
																											<?= $this->model->getCityStZip()?>   
																										</address>
																										<!-- house #1 summary content: characteristics -->
																										<div class="characteristics">
																											<ul>
																												<li><?= $this->model->getSqFt() ?> ft<sup>2</sup></li>
																												<li><?= $this->model->getBeds() ?> Beds</li>
																												<li><?= $this->model->getBaths() ?> Baths</li>
																											</ul>
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
                                                                                                                        <a id="mls-<?= $this->model->getMLS() ?>" href="<?= $BASE_WEB_URL ?>/property-details<?= $this->model->buildURI() ?>" class="styler_color">View Details</a>
                                                                                                                    </div>
																												</div>
																											</div>                
																										</div>
																									</div>
																								</div>
																							</div>

                                            
                                           