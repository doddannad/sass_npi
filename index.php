<?php
include 'fetch_all_table.php';
$metaTitile = "New Project Info";
$metaKeyword = "Property in India, Properties in India, Real Estate India, Indian Real Estate, India Real Estate, Property Portal, Property sites, Property Websites, Real Estate Websites, Online Property Sites, New Project Info.";
$metaDescription = "One of India's real estate properties portal to buy properties across India. Get deals on new launch properties in India on New Project Info";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header_links.php' ?>
</head>

<body class="npi_index">
    <?php
    include 'navbar.php';
    include 'navbar-search.php';
    ?>


    <!-- Banner -->
    <div class="banner-wrapper">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 order-0 order-sm-0 order-md-1 banner">
                <div class="banner-inner">
                    <img alt="Banner Image" class="lozad" data-src="assets/images/img/npd-banner-fade.jpg">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 order-1 order-sm-1 order-md-0 form">
                <form method="post" action="project_inquiry.php" id="myForm">
                    <h5 class="contact-head mb-3">Contact Builders Directly</h5>
                    <div class="mb-3">
                        <select class="form-select form-builder" name="" id="">
                            <optgroup label="Select Builders">
                                <option value="">Select Builders</option>
                                <?php
                                foreach ($buildersArray as $builders) {
                                    $buildersId = $builders['builders_id'];
                                    $buildersName = $builders['builders_name'];
                                    $buildersUrl = $builders['builders_url'];
                                ?>
                                    <option value="<?php echo $buildersId ?>"><?php echo $buildersName ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="form-projects" name="project_id" disabled>
                            <option value="">Select Builder First</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="">
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
    <!-- ./ Banner -->

    <!-- Guide to Book -->
    <!-- <section class="section guide-to-book">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Guide to Book</h2>
            </div>
            <div class="guide-to-book-wrapper">
                <div class="guide-to-book-box">
                    <div class="guide-box">
                        <div class="guide-box-head">
                            <i class="fa fa-home"></i>
                            <h4 class="guide-title">Search and Sort List</h4>
                        </div>
                        <div class="guide-box-body">
                            <div class="guide-description">
                                <p>Verified properties from top builders</p>
                            </div>
                            <div class="guide-button">
                                <button class="btn btn-sm btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#modalSortList"><i class="fa fa-caret-right"></i>Get in Touch</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guide-to-book-box">
                    <div class="guide-box">
                        <div class="guide-box-head">
                            <i class="fa fa-car"></i>
                            <h4 class="guide-title">Site Visit</h4>
                        </div>
                        <div class="guide-box-body">
                            <div class="guide-description">
                                <p>Making site Visit easier</p>
                            </div>
                            <div class="guide-button">
                                <button class="btn btn-sm btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#modalBookSiteVisit"><i class="fa fa-car"></i>Book a site visit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guide-to-book-box">
                    <div class="guide-box">
                        <div class="guide-box-head">
                            <i class="fa fa-rupee-sign"></i>
                            <h4 class="guide-title">Home Loan Assistance</h4>
                        </div>
                        <div class="guide-box-body">
                            <div class="guide-description">
                                <p>Home loans from major banks</p>
                            </div>
                            <div class="guide-button">
                                <button class="btn btn-sm btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#modalHomeLoanAssist"><i class="fas fa-paper-plane"></i>Apply home loan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guide-to-book-box">
                    <div class="guide-box">
                        <div class="guide-box-head">
                            <i class="fas fa-balance-scale"></i>
                            <h4 class="guide-title">Legal Advice</h4>
                        </div>
                        <div class="guide-box-body">
                            <div class="guide-description">
                                <p>Verified documents and legal support</p>
                            </div>
                            <div class="guide-button">
                                <button class="btn btn-sm btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#modalLegalAdvice"><i class="fa fa-caret-right"></i>Text</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guide-to-book-box">
                    <div class="guide-box">
                        <div class="guide-box-head">
                            <i class="fa fa-key"></i>
                            <h4 class="guide-title">Unit Booking</h4>
                        </div>
                        <div class="guide-box-body">
                            <div class="guide-description">
                                <p>Dedicated Relationship Manager throughout the process</p>
                            </div>
                            <div class="guide-button">
                                <button class="btn btn-sm btn-outline-secondary" role="button" data-bs-toggle="modal" data-bs-target="#modalUnitBook"><i class="fa fa-caret-right"></i>Get in toucht</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ./ Guide to Book -->
    <!-- Cities -->
    <section class="section city-wrapper">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Discover Project Across India</h2>
            </div>
            <div class="view-more-wrapper">
                <a href="#" class="btn view-more-link">View More<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="cities-web d-none d-lg-block">
                <div class="cities cities_<?php echo count($cityArray) ?>">
                    <?php
                    foreach ($cityArray as $cities) {
                        $city_name = $cities['city_name'];
                        $city_url = $cities['city_url'];
                        $city_banner = "admin/files_uploads/" . $cities['city_banner'];
                    ?>
                        <div class="city" style="background: url(<?php echo $city_banner ?>);">
                            <a href="<?php echo  $city_url ?>">
                                <div class="city-meta">
                                    <button class="btn btn-sm btn-secondary city-btn"><?php echo $city_name ?> <i class="fa fa-chevron-circle-right"></i></button>
                                </div>
                                <div class="city-caption">
                                    <h5 class="city-name"><?php echo $city_name ?></h5>
                                    <button class="btn btn-outline-secondary btn-sm city-btn">View all</button>
                                </div>
                            </a>
                            <div class="overlay"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="cities_mobile carousel-single owl-carousel owl-theme d-block d-lg-none">
                <div class="cities">
                    <?php
                    $i = 0;
                    foreach ($cityArray as $cities) {
                        $i++;
                        $city_name = $cities['city_name'];
                        $city_url = $cities['city_url'];
                        $city_banner = "admin/files_uploads/" . $cities['city_banner'];
                    ?>
                        <div class="city" style="background: url(<?php echo $city_banner ?>);">
                            <a href="<?php echo  $city_url ?>">
                                <div class="city-meta">
                                    <button class="btn btn-sm btn-secondary city-btn"><?php echo $city_name ?> <i class="fa fa-chevron-circle-right"></i></button>
                                </div>
                                <div class="city-caption">
                                    <h5 class="city-name"><?php echo $city_name?></h5>
                                    <button class="btn btn-outline-secondary btn-sm city-btn">View all</button>
                                </div>
                            </a>
                            <div class="overlay"></div>
                        </div>
                        <?php
                        if ($i % 3 == 0) {
                        ?>
                </div>
                <div class="cities">
                <?php } ?>
            <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Cities -->

    <!-- Hot Projects -->
    <section class="section hot-projects">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Hot Project</h2>
            </div>
            <div class="owl-carousel 3-2-1-carousel owl-theme">
                <?php foreach ($hotProjectsArray as $hotProjects) {
                    $hotProjectsBanner = "./admin/banner_image_uploads/banner_mobile/" . $hotProjects['banner_image'];
                    $hotProjectsTitle = $hotProjects['project_name'];
                    $hotProjectsId = $hotProjects['project_id'];
                    $hotProjectsLocation = $hotProjects['project_location'];
                    $hotProjectsPrice = $hotProjects['price'];
                    $hotProjectsUrl = strtolower($hotProjects['city_url'] . '/' . $hotProjects['area_url'] . '/' . str_replace(' ', '-', $hotProjects['project_name']) . '/review/brouchure/floor-plan/price');
                ?>
                    <div class="hot-project-card">
                        <a href="<?php echo $hotProjectsUrl ?>" class="text-decoration-none">
                            <div class="image">
                                <img class="lozad" data-src="<?php echo $hotProjectsBanner ?>" class="w-100 h-100" alt="<?php echo $hotProjectsTitle ?>">
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
                                <button class="btn btn-sm btn-danger enquire projectInquiry" id="<?php echo $hotProjectsId ?>"><i class="fa fa-envelope-open"></i>Enquire Now</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ./ Hot Projects -->

    <!-- Project Collection -->
    <section class="section project-collection">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Project Collections</h2>
            </div>
            <div class="collections">
                <div class="collection">
                    <a href="">
                        <img data-src="assets/images/img/properties-2.jpg" alt="Some text" class="w-100 h-100 lozad">
                        <div class="overlay">
                            <h5 class="name">Some text</h5>
                        </div>
                    </a>
                </div>
                <div class="collection">
                    <a href="">
                        <img data-src="assets/images/img/properties-5.jpg" alt="Some text" class="w-100 h-100 lozad">
                        <div class="overlay">
                            <h5 class="name">Some text</h5>
                        </div>
                    </a>
                </div>
                <div class="collection">
                    <a href="">
                    <img data-src="assets/images/img/properties-6.jpg" alt="Some text" class="w-100 h-100 lozad">
                        <div class="overlay">
                            <h5 class="name">Some text</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Project Collection -->

    <!-- Latest Projects -->
    <section class="section latest-projects">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Latest Project</h2>
            </div>
            <div class="owl-carousel 3-2-1-carousel owl-theme">
                <?php
                foreach ($latestProjectsArray as $latestProjects) {
                    $latestBanner = "./admin/banner_image_uploads/banner_mobile/" . $latestProjects['banner_image'];
                    $latestTitle = $latestProjects['project_name'];
                    $latestLocation = $latestProjects['project_location'];
                    $latestUrl = strtolower($latestProjects['city_url'] . '/' . $latestProjects['area_url'] . '/' . str_replace(' ', '-', $latestProjects['project_name']) . '/review/brouchure/floor-plan/price');
                ?>
                    <div class="latest-project-card">
                        <a href="<?php echo $latestUrl ?>" class="text-decoration-none">
                            <div class="image">
                                <img data-src="<?php echo $latestBanner ?>" alt="<?php echo $latestTitle ?>" class="lozad">
                                <div class="overlay"></div>
                                <div class="caption">
                                    <div>
                                        <h4 class="name"><?php echo $latestTitle ?></h4>
                                        <p class="location"><i class="fa fa-map-marker"></i> <?php echo $latestTitle ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ./ Latest Projects -->

    <!-- Trending-now -->
    <section class="section trending-article" style="display: none;">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Trending Now</h2>
            </div>
            <div class="view-more-wrapper">
                <a href="#" class="btn view-more-link">View More<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="owl-carousel 3-2-1-carousel owl-theme">
                <?php
                    for ($i=1; $i <=9 ; $i++) { 
                ?>
                <div class="article-card">
                    <a href="#" class="text-decoration-none">
                        <img data-src="assets/images/img/properties-1.jpg" alt="title article" class="lozad">
                        <div class="overlay"></div>
                    </a>
                    <div class="detail">
                        <a href="#" class="text-decoration-none">
                            <h4 class="name">Article title article more title </h4><span class="read_more">Read More</span>
                        </a>
                        <div class="article-detail d-flex justify-content-between flex-row">
                            <button class="btn btn-sm btn-danger"><i class="fa fa-calendar"></i> 29 / May / 2021</button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-user"></i>DODDA</button>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- ./ Trending-now -->

    <!-- Our Partner -->
    <section class="section our-partners">
        <div class="container">
            <div class="section-title">
                <h2 class="title">Our Partners</h2>
            </div>
            <div class="owl-carousel 5-3-2-carousel owl-theme">
                <?php
                foreach ($partnersArray as $partners) {
                    $partnersLogo = "./admin/files_uploads/" . $partners['builders_logo'];
                    $partnersName = $partners['builders_name'];
                    $partnersUrl = $partners['builders_url'];
                ?>
                    <div class="partners-card">
                        <a href="<?php echo $partnersUrl ?>" class="text-decoration-none">
                            <div class="image">
                                <img data-src="" alt="Partners Logo" class="lozad">
                                <div class="overlay"></div>
                            </div>
                            <h4 class="name"><?php echo $partnersName ?></h4>
                        </a>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ./ Our Partner -->
    <?php
    include 'footer.php';
    include 'script_links.php';
    ?>

</body>

</html>