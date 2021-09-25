<?php
include 'fetch_all_table.php';
include 'fetch_property_single.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header_links.php' ?>
</head>

<body class="property-single bg-light">
    <?php
    include 'navbar.php';
    include 'navbar-search.php';
    ?>
    <!-- Heading-wrapper -->
    <div class="property-heading-wrapper">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo $city_url . '/' . $propertyTypesUrl ?>"><?php echo $propertyTypesName ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $projectName ?></li>
                </ol>
            </nav>
            <h1 class="name"><?php echo $projectName ?></h1>
            <div class="loc-price"><span class="location"><i class="fa fa-map-marker-alt"></i><?php echo $location ?> | <?php echo $cityName ?></span><span class="price"><i class="fa fa-rupee-sign"></i><?php echo $price ?></span></div>
        </div>
    </div>
    <!-- ./ Heading-wrapper -->
    <section class="property-banner">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 col-md-8 banner-wrapper">
                    <div class="banner-grid-wrap banner_grid_3">
                        <div class="banner">
                            <div class="banner-img" style="background:url(assets/images/img/properties-4.jpg)">
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <div class="banner">
                            <div class="banner-img" style="background:url(assets/images/img/properties-4.jpg)">
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <div class="banner">
                            <div class="banner-img" style="background:url(assets/images/img/properties-4.jpg)">
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 form-wrapper d-none d-md-block">
                    <div>
                        <div class="form-head">
                            <div class="form-media">
                                <a href="" class="image">
                                    <img src="" alt="Logo">
                                </a>
                            </div>
                            <div class="form-media">
                                <h5><i class="fa fa-users"></i>Contact <?php echo $buildersName ?></h5>
                                <p><i class="fa fa-address-book" aria-hidden="true"></i>9986219795</p>
                            </div>
                        </div>
                        <form method="post" action="project_inquiry.php" id="myForm">

                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="project_id" placeholder="Name" name="project_id" value="<?php echo $projectId ?>" required="">
                                <input class=" form-control" type="text" id="name" placeholder="Name" name="name" required="">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-outline-danger" type="submit" name="submit_inquiry">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="property-body">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-12 col-md-8">
                    <!-- summary -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Summary</h4>
                        </div>
                        <div class="property-card-body">
                            <div class="summary-wrapper">
                                <div class="summary-box">
                                    <div class="summary-item">
                                        <div class="name">Type</div>
                                        <div class="value">Residential</div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="name">Sub Type</div>
                                        <div class="value"><?php echo $propertyTypesName ?></div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="name">Location</div>
                                        <div class="value"><?php echo $location ?></div>
                                    </div>
                                </div>
                                <div class="summary-box">
                                    <div class="summary-item">
                                        <div class="name">Developer</div>
                                        <div class="value"><?php echo $buildersName ?></div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="name">Project Area</div>
                                        <div class="value"><?php echo $land_area ?></div>
                                    </div>
                                    <div class="summary-item">
                                        <div class="name">Possession</div>
                                        <div class="value"><?php echo $posseion ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ summary -->
                    <!-- additional -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Additional Details</h4>
                        </div>
                        <div class="property-card-body">
                            <div class="summary-wrapper">
                                <div class="summary-box">
                                    <div class="summary-item additional">
                                        <div class="name">Unit Type </div>
                                        <div class="value"><?php echo $unit_types ?></div>
                                    </div>
                                    <div class="summary-item additional">
                                        <div class="name">Total Units</div>
                                        <div class="value"><?php echo $total_units ?></div>
                                    </div>
                                    <div class="summary-item additional">
                                        <div class="name">Price Starts From</div>
                                        <div class="value"><?php echo $price ?></div>
                                    </div>
                                </div>
                                <div class="summary-box">
                                    <div class="summary-item additional">
                                        <div class="name">Towers</div>
                                        <div class="value"><?php echo $blocks ?></div>
                                    </div>
                                    <div class="summary-item additional">
                                        <div class="name">Construction Status</div>
                                        <div class="value"><?php echo $propertyStatusName ?></div>
                                    </div>
                                    <div class="summary-item additional">
                                        <div class="name">Rera ID</div>
                                        <div class="value">...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ additional -->
                    <!-- Description -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Description</h4>
                        </div>
                        <div class="property-card-body">
                            <p class="readMoreDescription"><?php echo substr(strtolower($project_description), 0, 300) ?><span class="dots">...</span><span class="moreText">&nbsp;<?php echo substr(strtolower($project_description), 300) ?></span>
                                <a class="read readButton">Read More</a>
                            </p>
                        </div>
                    </div>
                    <!-- ./ Description -->


                    <!-- Mater Plan -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Floor and Master Plans</h4>
                        </div>
                        <div class="property-card-body">
                            <div class="master-plan-wrapper">
                                <div class="tab-button nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php
                                    $i = 0;
                                    foreach ($unit_configurations as $units) {
                                        $i++;
                                        if ($i == 1) {
                                            $active = 'active';
                                            $aria_selected = "true";
                                        } else {
                                            $active = '';
                                            $aria_selected = "false";
                                        }
                                        $unitsFloorId =  $units['unitsTypesId'];
                                        $unitsFloorName =  $units['unti_types_name'];
                                    ?>
                                        <button class="nav-link <?php echo $active ?>" id="flor_master_<?php echo $i ?>" data-bs-toggle="pill" data-bs-target="#floor_master_plan_<?php echo $i ?>" type="button" role="tab" aria-controls="floor_master_plan<?php echo $i ?>" aria-selected="<?php echo $aria_selected ?>"><?php echo $unitsFloorName ?></button>
                                    <?php } ?>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                    <?php
                                    $i = 0;
                                    foreach ($unit_configurations as $units) {
                                        $i++;
                                        if ($i == 1) {
                                            $active = 'active';
                                            $show = 'show';
                                        } else {
                                            $active = '';
                                            $show = '';
                                        }
                                        $unitsFloorId =  $units['unitsTypesId'];
                                        $unitsFloorName =  $units['unti_types_name'];
                                        $unitsSuperBuiltUp = $units['super_builtup_area'];
                                        $unitsCarpetArea = $units['carpet_area'];

                                        $unitsFloorPlan = "admin/files_uploads/" . $units['floor_plan'];

                                    ?>
                                        <div class="tab-pane fade <?php echo $show . ' ' . $active ?>" id="floor_master_plan_<?php echo $i ?>" role="tabpanel" aria-labelledby="flor_master_<?php echo $i ?>">
                                            <ul class="master-plan-head-ul list-unstyled">
                                                <li>Super Built Up Area : <span class="value"><?php echo $unitsSuperBuiltUp ?></span></li>
                                                <li>Carpet Area : <span class="value"><?php echo $unitsCarpetArea ?></span></li>
                                            </ul>
                                            <div class="master-body d-flex">
                                                <div class="image">
                                                    <img src="assets/images/img/image_1.jpg" alt="Master Plan">
                                                    <div class="overlay">
                                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#floor-plan"><i class="fa fa-download"></i> Download</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ Master Plan -->
                    <!-- address -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Address</h4>
                        </div>
                        <div class="property-card-body address">
                            <div class="summary-wrapper">
                                <div class="summary-box">
                                    <div class="summary-item address">
                                        <div class="name">Address :</div>
                                        <div class="value"><?php echo $location ?></div>
                                    </div>
                                    <div class="summary-item address">
                                        <div class="name">City :</div>
                                        <div class="value"><?php echo $cityName ?></div>
                                    </div>
                                    <div class="summary-item address">
                                        <div class="name">State :</div>
                                        <div class="value"><?php echo $stateName ?></div>
                                    </div>
                                </div>
                                <div class="summary-box">
                                    <div class="summary-item address">
                                        <div class="name">Zip/Postal Code :</div>
                                        <div class="value"><?php echo $areaName ?></div>
                                    </div>
                                    <div class="summary-item address">
                                        <div class="name">Nighbourhood :</div>
                                        <div class="value"><?php echo $areaName ?></div>
                                    </div>
                                    <div class="summary-item address">
                                        <div class="name">Country :</div>
                                        <div class="value"><?php echo $countryName ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ address -->
                    <!-- Amenities -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Amenities</h4>
                        </div>
                        <div class="property-card-body">
                            <ul class="amenities-main-ul">
                                <li class="amenities-main-li">
                                    <ul class="amenities-inner-ul">
                                        <li><i class="fa fa-check"></i>Power Backup</li>
                                        <li><i class="fa fa-check"></i>24 Hrs Running Wate</li>
                                        <li><i class="fa fa-check"></i>Gym</li>
                                        <li><i class="fa fa-check"></i>Library</li>
                                        <li><i class="fa fa-check"></i>Maintenance Staff</li>
                                        <li><i class="fa fa-check"></i>Community Garden</li>
                                        <li><i class="fa fa-check"></i>Surface Car Park</li>
                                    </ul>
                                </li>
                                <li class="amenities-main-li">
                                    <ul class="amenities-inner-ul">
                                        <li><i class="fa fa-check"></i>Passive Gathering</li>
                                        <li><i class="fa fa-check"></i>Party Hall</li>
                                        <li><i class="fa fa-check"></i>Jogging Track</li>
                                        <li><i class="fa fa-check"></i>Bike Track</li>
                                        <li><i class="fa fa-check"></i>24/7 Security</li>
                                        <li><i class="fa fa-check"></i>CCTV Camera</li>
                                        <li><i class="fa fa-check"></i>Sewage Treatment Plant</li>
                                    </ul>
                                </li>
                                <li class="amenities-main-li">
                                    <ul class="amenities-inner-ul">
                                        <li><i class="fa fa-check"></i>Basketball Court</li>
                                        <li><i class="fa fa-check"></i>Indoor Games</li>
                                        <li><i class="fa fa-check"></i>Outdoor Sports Facilities</li>
                                        <li><i class="fa fa-check"></i>Rain Water Harvesting</li>
                                        <li><i class="fa fa-check"></i>Swimming Pool</li>
                                        <li><i class="fa fa-check"></i>Kids Pool</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ./ Amenities -->
                    <!-- Price Sheet -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> Price Sheet</h4>
                        </div>
                        <div class="property-card-body">
                            <div class="price-sheet">
                                <ul class="tab-button nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <?php
                                    $i = 0;
                                    foreach ($priceSheet as $prices) {
                                        $i++;
                                        if ($i == 1) {
                                            $active = 'active';
                                            $aria_selected = "true";
                                        } else {
                                            $active = '';
                                            $aria_selected = "false";
                                        }
                                        $bedRoomsName = $prices['bed_rooms_name'];
                                    ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo $active ?>" id="price-tab-<?php echo $i ?>-tab" data-bs-toggle="pill" data-bs-target="#price-tab-<?php echo $i ?>" type="button" role="tab" aria-controls="price-tab-<?php echo $i ?>" aria-selected="<?php echo $aria_selected ?>"><?php echo $bedRoomsName ?></button>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <?php
                                    $i = 0;
                                    foreach ($priceSheet as $prices) {
                                        $i++;
                                        if ($i == 1) {
                                            $active = 'active';
                                            $show = 'show';
                                        } else {
                                            $active = '';
                                            $show = '';
                                        }
                                        $bedRoomsName = $prices['bed_rooms_name'];
                                        $sqft = $prices['sqft'];
                                        $bedRoomsNamePrice = $prices['price_amount'];
                                    ?>
                                        <div class="tab-pane fade  <?php echo $show . ' ' . $active ?>" id="price-tab-<?php echo $i ?>" role="tabpanel" aria-labelledby="price-tab-<?php echo $i ?>-tab">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Unit Type</th>
                                                            <th>Sq/Ft</th>
                                                            <th>Price (Approximate)</th>
                                                            <th>Price Sheet</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $bedRoomsName ?></td>
                                                            <td><?php echo $sqft ?></td>
                                                            <td><i class="fa fa-rupee-sign"></i> <?php echo $bedRoomsNamePrice ?></td>
                                                            <td><button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#price-sheet"><i class="fa fa-download"></i> Download</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ Price Sheet -->
                    <!-- Hassel Steps -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading">Book <?php echo $projectName ?> Hassle Free in 5 Simple Steps</h4>
                        </div>
                        <div class="property-card-body">
                            <ol type="1" class="booking-hassle-steps">
                                <li>Fill The Inquiry Form Of Heading</li>
                                <li>Pre Book A Site Visit Or Virtual Visit.</li>
                                <li>Select Your Prefer Apartment</li>
                                <li>Fill Up The Booking Form.</li>
                                <li>Confirmation Of The Apartment Followed By Allotment Letter And Agreement.</li>
                            </ol>
                        </div>
                    </div>
                    <!-- ./ Hassel Steps -->
                    <!-- Faq's -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading"><?php echo $projectName ?> FAQ's</h4>
                        </div>
                        <div class="property-card-body">
                            <div class="faq-wrapper">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                <i class="fab fa-quora"></i>Where is <?php echo $projectName; ?> Located
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i><?php echo $projectName; ?> is located in <?php echo $areaName . " " . $cityName; ?>.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <i class="fab fa-quora"></i>How many units are there in <?php echo $projectName; ?>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>In the project there are <?php echo $total_units; ?> units.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                <i class="fab fa-quora"></i>When is <?php echo $projectName; ?> scheduled for hand over ?
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>The project will be completed according to the timelines given to the rera.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <i class="fab fa-quora"></i>Has <?php echo $projectName; ?> received rera .?
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>No project can commence without rera approvals.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                <i class="fab fa-quora"></i> What are the different sizes available in <?php echo $projectName; ?>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>The project has various layouts to offer such.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <i class="fab fa-quora"></i> Is <?php echo $projectName; ?> approved by banks?
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>If the project is approved by rera then bank approvals may not be a problem.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                <i class="fab fa-quora"></i>Is <?php echo $projectName; ?>Is there any home loan facility available in <?php echo $projectName ?>.
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>Yes
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <i class="fab fa-quora"></i> Is <?php echo $projectName; ?> vastu compliant?
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>To some extent the project has basic vastu which is necessary.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                <i class="fab fa-quora"></i> Is there any possibility to book <?php echo $projectName; ?> online ?
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>Yes you can book online. Follow the booking guidelines above.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <i class="fab fa-quora"></i> Is there a visitor's car park available in <?php echo $projectName; ?>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <i class="far fa-check-square"></i>Yes there is a provision for visitor's car parking.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./ Faq's -->
                    <!-- Description -->
                    <div class="property-cards">
                        <div class="property-card-heading">
                            <h4 class="heading">About <?php echo $buildersName ?></h4>
                        </div>
                        <div class="property-card-body">
                            <p class="readMoreDescription"><?php echo substr(strtolower($about_builder), 0, 300) ?><span class="dots">...</span><span class="moreText">&nbsp;<?php echo substr(strtolower($about_builder), 300) ?></span>
                                <a class="read readButton">Read More</a>
                            </p>
                        </div>
                    </div>
                    <!-- ./ Description -->
                </div>
                <div class="col-12 col-md-4 form-wrapper d-md-none">
                    <div>
                        <div class="form-head">
                            <div class="form-media">
                                <a href="" class="image">
                                    <img src="" alt="Logo">
                                </a>
                            </div>
                            <div class="form-media">
                                <h5><i class="fa fa-users"></i>Contact <?php echo $buildersName ?></h5>
                                <p><i class="fa fa-address-book" aria-hidden="true"></i>9986219795</p>
                            </div>
                        </div>
                        <form method="post" action="project_inquiry.php" id="myForm">

                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="project_id" placeholder="Name" name="project_id" value="<?php echo $projectId ?>" required="">
                                <input class=" form-control" type="text" id="name" placeholder="Name" name="name" required="">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-outline-danger" type="submit" name="submit_inquiry">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <aside style="position: sticky;top: 0;">
                        <!-- Featured -->
                        <div class="property-cards">
                            <div class="property-card-heading">
                                <h4 class="heading">Featured Properties</h4>
                            </div>
                            <div class="property-card-body">
                                <div class="latest-projects">
                                    <div class="owl-carousel carousel-single">
                                        <?php
                                        foreach ($featuredProjectsArray as $featuredProjects) {
                                            $featuredProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $featuredProjects['banner_image'];
                                            $featuredProjectsTitle = $featuredProjects['project_name'];
                                            $featuredProjectsLocation = $featuredProjects['project_location'];
                                            $featuredProjectsPrice = $featuredProjects['price'];
                                            $featuredProjectsUrl = strtolower($featuredProjects['city_url'] . '/' . $featuredProjects['area_url'] . '/' . str_replace(' ', '-', $featuredProjects['project_name']) . '/review/brouchure/floor-plan/price');
                                        ?>
                                            <div class="latest-project-card">
                                                <a href="<?php echo $featuredProjectsUrl ?>" class="text-decoration-none">

                                                    <div class="image" style="background: url();">

                                                        <div class="overlay"><button class="btn btn-secondary btn-sm"><i class="fa fa-rupee-sign"></i> <?php echo $featuredProjectsPrice ?></button></div>
                                                        <div class="caption">
                                                            <div>
                                                                <h4 class="name"><?php echo $featuredProjectsTitle ?></h4>
                                                                <p class="location"><i class="fa fa-map-marker"></i><?php echo $featuredProjectsLocation ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hot Deals -->
                        <div class="property-cards">
                            <div class="property-card-heading">
                                <h4 class="heading">Hot deals</h4>
                            </div>
                            <div class="property-card-body">
                                <div class="hot-projects">
                                    <div class="owl-carousel carousel-single">
                                        <?php
                                        foreach ($hotProjectsArray as $hotProjects) {
                                            $hotProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $hotProjects['banner_image'];
                                            $hotProjectsId = $hotProjects['project_id'];
                                            $hotProjectsTitle = $hotProjects['project_name'];
                                            $hotProjectsLocation = $hotProjects['project_location'];
                                            $hotProjectsPrice = $hotProjects['price'];
                                            $hotProjectsUrl = strtolower($hotProjects['city_url'] . '/' . $hotProjects['area_url'] . '/' . str_replace(' ', '-', $hotProjects['project_name']) . '/review/brouchure/floor-plan/price');
                                        ?>
                                            <div class="hot-project-card">
                                                <a href="<?php echo $hotProjectsUrl ?>" class="text-decoration-none">
                                                    <div class="image" style="background: url();">
                                                        <div class="overlay"></div>
                                                    </div>
                                                </a>
                                                <div class="detail">
                                                    <a href="<?php echo $hotProjectsUrl ?>" class="text-decoration-none">
                                                        <h4 class="name"><?php echo $hotProjectsTitle ?></h4>
                                                        <p class="location"><i class="fa fa-location"></i> <?php echo $hotProjectsLocation ?></p>
                                                    </a>
                                                    <div class="price-detail d-flex justify-content-between flex-row">
                                                        <button class="btn btn-sm btn-danger price"><i class="fa fa-rupee-sign"></i><?php echo $hotProjectsPrice ?></button>
                                                        <button class="btn btn-sm btn-danger enquire projectInquiry" role="button" id="<?php echo $hotProjectsId ?>"><i class="fa fa-envelope-open"></i>Enquire Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Latest -->
                        <div class="property-cards">
                            <div class="property-card-heading">
                                <h4 class="heading">Latest Projects</h4>
                            </div>
                            <div class="property-card-body">
                                <div class="latest-projects">
                                    <div class="owl-carousel carousel-single">
                                        <?php
                                        foreach ($featuredProjectsArray as $featuredProjects) {
                                            $featuredProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $featuredProjects['banner_image'];
                                            $featuredProjectsTitle = $featuredProjects['project_name'];
                                            $featuredProjectsLocation = $featuredProjects['project_location'];
                                            $featuredProjectsPrice = $featuredProjects['price'];
                                            $featuredProjectsUrl = strtolower($featuredProjects['city_url'] . '/' . $featuredProjects['area_url'] . '/' . str_replace(' ', '-', $featuredProjects['project_name']) . '/review/brouchure/floor-plan/price');
                                        ?>
                                            <div class="latest-project-card">
                                                <a href="<?php echo $featuredProjectsLocation ?>" class="text-decoration-none">
                                                    <div class="image" style="background: url();">
                                                        <div class="overlay"></div>
                                                        <div class="caption">
                                                            <div>
                                                                <h4 class="name"><?php echo $featuredProjectsTitle ?></h4>
                                                                <p class="location"><i class="fa fa-map-marker"></i><?php echo $featuredProjectsLocation ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <?php
    include 'footer.php';
    include 'script_links.php';
    ?>

    <!-- jqeury && javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- owlCarousel2.3.4 -->
    <script src="assets/lib/OwlCarousel/owl.carousel.min.js"></script>

    <script src="assets/js/application.js"></script>
</body>

</html>