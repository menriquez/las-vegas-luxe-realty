<!-- begin:article -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- edit featured listings headline here -->
        <h2 class="block-title sr-header">
            Detail Listing for <?= $this->model->getStreetAddress(); ?>
        </h2>
    </div>
</div>

<!-- <div class="col-md-12 single-post">   -->

<div class="inner-block" id="property-item">

    <div class="row">
        <div class="col-md-8 col-sm-8">
            <!-- edit featured property #1 address -->
            <div class="address">
                <div class="address-top">
                    <?= $this->model->getStreetAddress() ?>
                </div>
                <div class="address-bottom">
                    <?= $this->model->getCityStZip() ?>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-4">
            <!-- edit featured property #1 price -->
            <div class="price styler_color">
                <?= $this->model->getPrice() ?>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-8 col-sm-8">

            <!-- featured property #1 photo gallery starts here -->
            <div class="slider-block">

                <div id="rs_gallery1" class="royalSlider rsDefault">

                    <?php
                        $this->model->getImageDisplayList();
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- featured property #1 details summary info starts here -->
            <div class="details-info">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <!-- edit featured property #1 details summary info (mls #) here -->
                        <div class="item-id">
                            MLS #: <?= $this->model->getMLS() ?>
                        </div>
                        <!-- edit featured property #1 details summary info (characteristics) here -->
                        <div class="characteristics">
                            <ul>
                                <li><?= $this->model->getTotalSqFt() ?> ft<sup>2</sup></li>
                                <li><?= $this->model->getBeds() ?> Bedrooms</li>
                                <li><?= $this->model->getBaths() ?> Baths</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <!-- edit featured property #1 details summary info (listing agent image) -->
                        <div class="realtor-mini">
                            <img class="img-responsive " src="/img/Melanie.png" alt="">
                        </div>
                    </div>
                    <!-- edit featured property #1 details summary info (listing agent name, address and phone number) -->
                    <div class="col-md-6 col-sm-6">
                        <div class="agent-block">
                            <div class="details-name">Sahar Saljougui</div>
                            <div class="details-place">Key Realty</div>
                        </div>

                    </div>

                </div>
                <div class="row">

                    <div class="col-md-12 col-xs-12" style="padding-bottom: 20px;">

                        <div class="details-phone"><a href="tel:415-815-9079"><i class="fa fa-mobile-phone"></i>
                                415-815-9079</a><br>
                            <div class="details-phone"><a TARGET="_blank"
                                                          href="mailto:saharsaljougui@gmail.com?&subject=Intrested%20in%20<?= $this->model->getStreetAddress() ?>,%20<?= $this->model->getCityStZip() ?>,%20MLS#%20<?= $this->model->getMLS() ?>&body=Hi%20Sahar,">SaharSaljougui@gmail.com</a>
                            </div>
                            <br/>
                            <div class="button-center">
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                        data-target="#myModal<?= $this->model->row_idx ?>"><i class="fa fa-envelope"
                                                                                              aria-hidden="true"></i>
                                    Let Me Help You!
                                </button>
                            </div>

                            <?php
                                require('mls/view/contact_modal.view.php');
                            ?>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <!-- featured listings house #1 property tabs -->
            <div class="details-tabs">
                <div class="col-md-12 col-sm-12">

                    <ul class="tabs">
                        <!-- edit featured listings house #1 property tab label #1 (property details) here -->
                        <li class="active"><a class="styler_bg_color" href="#details1" data-toggle="tab">PROPERTY
                                DETAILS </a></li>
                        <!-- edit featured listings house #1 property tab label #2 (map) here -->
                        <li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
                    </ul>

                    <div class="tab-content tabs_blocks">
                        <div class="active" id="details1">

                            <!-- featured listings house #1 property details tab info slides start here -->
                            <ul class="info_slides">

                                <li class="active">
                                    <!-- edit featured listings house #1 property tab info slide #1 (details) label here -->
                                    <a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
                                    <!-- edit featured listings house #1 property tab info slide #1 (details) summary text here -->
                                    <div class="text" style="display: block;">
                                        <p><?= $this->model->getData("tax_places") ?></p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 left-side details content here -->
                                                <div class="left-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>Year Built </strong></td>
                                                            <td><?= $this->model->getData("year_built") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Property Type </strong></td>
                                                            <td><?= $this->model->getPropertyType() ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Property Tax </strong></td>
                                                            <td>$<?= $this->model->getData("tax_amount") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Subdivision </strong></td>
                                                            <td><?= $this->model->getData("subdivision") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Pet info </strong></td>
                                                            <td><?= $this->model->getData("pets")==0?"No":"Yes" ?>  <?= $this->model->getData("pet_fee")==0?"": "Deposit: $".$this->model->getData("pet_fee") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Age restricted? </strong></td>
                                                            <td> <?= $this->model->getData("over_55")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Accessibility features </strong></td>
                                                            <td> <?= $this->model->getData("accessibility_desc") ?>   </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Ranching </strong></td>
                                                            <td> <?= $this->model->getData("ranching") ?>   </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 right-side details content here -->
                                                <div class="right-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>Bedrooms </strong></td>
                                                            <td><?= $this->model->getBeds() ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Baths </strong></td>
                                                            <td><?= $this->model->getBaths() ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Lot Size </strong></td>
                                                            <td><?= $this->model->getData("sqft_lot") ?> sq/ft</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Floors </strong></td>
                                                            <td><?= $this->model->getData("floor_num") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Garage </strong></td>
                                                            <td><?= $this->model->getData("garage") ?> cars
                                                                | <?= $this->model->getData("garage_desc") ?>  <?= $this->model->getData("parking") ?>  </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Carport </strong></td>
                                                            <td><?= $this->model->getData("carport") ?>
                                                                | <?= $this->model->getData("carport_desc") ?>   </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Construction Info </strong></td>
                                                            <td> <?= $this->model->getData("construction") ?>   </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Gated Community </strong></td>
                                                            <td> <?= $this->model->getData("gated_community")==0?"No":"Yes" ?>   </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- edit featured listings house #1 interior slide label here -->
                                    <a href="#" class="styler_color"><i class="arr styler_color"></i>Interior Rooms</a>
                                    <!-- edit featured listings house #1 interior slide text summary here -->
                                    <div class="text">
                                        <p>Features: <?= $this->model->getData("interior_features") ?></p>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <!-- edit featured listings house #1 interior slide left-side content here -->
                                                <div class="left-tab-wrapper">
                                                    <table class="details-values">

                                                        <?php foreach ($this->model->rooms->room_type_array as $room_name => $room_info) { ?>

                                                            <tr>
                                                                <td><strong><?= $room_name ?></strong></td>
                                                                <td><?= $room_info[1] ?></td>
                                                                |
                                                                <td><?= $room_info[0] ?></td>
                                                            </tr>

                                                        <?php } ?>
                                                        <tr>
                                                            <td><strong>Fireplace </strong></td>
                                                            <td><?= $this->model->getData("fireplace")==1?"yes":"no" ?>
                                                                | <?= $this->model->getData("fireplace_desc") ?>
                                                                | <?= $this->model->getData("fireplace_loc") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Flooring </strong></td>
                                                            <td><?= $this->model->getData("floor") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Furnishing </strong></td>
                                                            <td><?= $this->model->getData("furnishing") ?> </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- edit featured listings house #1 exterior slide label here -->
                                    <a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
                                    <!-- edit featured listings house #1 exterior slide text summary here -->
                                    <div class="text">
                                        <p>Features: <?= $this->model->getData("exterior_features") ?></p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 exterior slide left-side content here -->
                                                <div class="left-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>Fence </strong></td>
                                                            <td><?= $this->model->getData("fence_type") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Fencing </strong></td>
                                                            <td><?= $this->model->getData("fence_type") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Pool </strong></td>
                                                            <td><?= $this->model->getData("pool")==0?"No":"Yes" ?> | <?= $this->model->getData("pool_features") ?></td>
                                                        </tr>
                                                        <?php if ($this->model->getData("pool")==1) {  ?>
                                                        <tr>
                                                            <td><strong>Pool Dimensions </strong></td>
                                                            <td><?= $this->model->getData("pool_length") ?>
                                                                x <?= $this->model->getData("pool_width") ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td><strong>Private Spa </strong></td>
                                                            <td><?= $this->model->getData("pv_spa_yn")==0?"No":"Yes" ?>  <?= $this->model->getData("spa_desc") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Roof </strong></td>
                                                            <td><?= $this->model->getData("roof_type") ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 exterior slide right-side content here -->
                                                <div class="right-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>Home Faces? </strong></td>
                                                            <td><?= $this->model->getData("house_faces") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Landscaping </strong></td>
                                                            <td><?= $this->model->getData("landscape_desc") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Solar </strong></td>
                                                            <td> <?= $this->model->getData("solar_desc") ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- edit featured listings house #1 additional details slide label here -->
                                    <a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
                                    <!-- edit featured listings house #1 exterior slide text summary here -->
                                    <div class="text">
                                        <p><?= $this->model->getData("additional_rooms") ?></p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 additional details slide left-side content here -->
                                                <div class="left-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>Water info </strong></td>
                                                            <td><?= $this->model->getData("water_type") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Sewer info </strong></td>
                                                            <td><?= $this->model->getData("sewer") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Utility info </strong></td>
                                                            <td><?= $this->model->getData("utilities") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Cooling </strong></td>
                                                            <td><?= $this->model->getData("cooling") ?> <br>
                                                                Fuel: <?= $this->model->getData("cooling_fuel") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Heating </strong></td>
                                                            <td><?= $this->model->getData("heating") ?> <br>
                                                                Fuel: <?= $this->model->getData("heating_fuel") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Hot Water Heater </strong></td>
                                                            <td><?= $this->model->getData("water_heat_desc") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Appliances </strong></td>
                                                            <td><?= $this->model->getData("equipment_appliances") ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <!-- edit featured listings house #1 additional details slide right-side content here -->
                                                <div class="right-tab-wrapper">
                                                    <table class="details-values">
                                                        <tr>
                                                            <td><strong>School District </strong></td>
                                                            <td><?= $this->model->getData("county") ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Year Round School </strong></td>
                                                            <td><?= $this->model->getData("yr_round_school")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Elementary School </strong></td>
                                                            <td><?= $this->model->getData("elem_school") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Middle School </strong></td>
                                                            <td><?= $this->model->getData("middle_school") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>High School </strong></td>
                                                            <td><?= $this->model->getData("high_school") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Washer included? </strong></td>
                                                            <td><?= $this->model->getData("inc_washer_yn")==0?"No":"Yes" ?> |
                                                                <?= $this->model->getData("washer_dryer_loc") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Dryer included? </strong></td>
                                                            <td><?= $this->model->getData("inc_dryer_yn")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Dishwasher included? </strong></td>
                                                            <td><?= $this->model->getData("dishwasher_inc")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Disposal included? </strong></td>
                                                            <td><?= $this->model->getData("disposal_inc")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Fridge included? </strong></td>
                                                            <td><?= $this->model->getData("fridge_inc")==0?"No":"Yes" ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <!-- edit featured listings house #1 map tab info here -->
                        <div class="tab-map">
                            <!-- begin map -->
                            <iframe width="100%" height="480px" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.it/maps?q=<?= $this->model->getStreetAddress() ?> <?= $this->model->getCityStZip() ?>&output=embed"></iframe>
                            <!-- /end map -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:article -->
