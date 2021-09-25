<?php
include 'fetch_all_table.php';
$fetchAdsProjects = mysqli_query($db_connect, "SELECT * FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id ORDER BY RAND () DESC LIMIT 6  ");
$adsProjectsArray = array();
while ($row = mysqli_fetch_array($fetchAdsProjects)) {
    $adsProjectsArray[] = $row;
}

$select_latest_blogs = "SELECT * FROM blogs ORDER BY created DESC";
$latestBlogsArray = $db_connect->query($select_latest_blogs);

$metaKeyword = array();
$metaDescription = array();
foreach ($blogsArray as $blog) {
    $metaKeyword[] = $blog['blog_meta_key'];
    $metaDescription[] = $blog['blog_meta_desc'];
}
$metaTitile = "Trending Now";
$metaKeyword = strip_tags(implode(',', $metaKeyword));
$metaDescription = strip_tags(implode('', $metaDescription));
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'header_links.php'; ?>
</head>

<body>
    <?php
    include 'navbar.php';
    include 'navbar-search.php';
    ?>
    <div class="main-section">
        <section>
            <div class="hero-wrap-main">
                <div class="hero-wrap-main fixed-bg" style="background: url(&quot;assets/img/blog-banner.jpg&quot;);">
                    <div class="hero-overlay"></div>
                    <div class="hero-caption">
                        <h1 class="hero-title">Heading</h1>
                        <h5 class="hero-title-sub">Sub Heading</h5>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <section class="section-breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-items"><a class="breadcrumb-links" href="index.php">Home</a></li>
                        <li class="breadcrumb-items"><a class="breadcrumb-links active">Trending Now</a></li>
                    </ul>
                </section>
                <div class="property-listing-content-main">
                    <div class="row">
                        <div class="col-xl-4 side-column">
                            <aside class="sidebar">
                                <div class="sidebar-block trending-now-latest">
                                    <div class="heading-sub">
                                        <h2 class="heading-sub-title">Latest News</h2>
                                    </div>
                                    <div class="owl-carousel owl-theme single-item-carousel">
                                        <?php
                                        $i = 0;
                                        foreach ($latestBlogsArray as $blogs) {
                                            $i++;
                                            if ($i == 1) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            $blogTitle = $blogs['blog_title'];
                                            $blogContent = $blogs['blog_content'];
                                            $blogBanner = "./admin/blog_banners_uploads/" . $blogs['blog_banner'];
                                            $type = pathinfo($blogBanner, PATHINFO_EXTENSION);
                                            $data = file_get_contents($blogBanner);
                                            $blogBanner = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                            $blogUrl = 'trending-now/realestate/article/' . $blogs['blog_url'];
                                            $blogWriter = $blogs['blog_writer_name'];
                                            $blogPostedDate = date('d / M / Y ', strtotime($blogs['created']));
                                        ?>
                                            <div class="trending-now-items item <?php echo $active ?>">
                                                <a class="fixed-bg trending-now-img" href="<?php echo $blogUrl ?>" style="background: url('<?php echo $blogBanner  ?>');" target="_blank">
                                                    <div class="trending-now-overlay"></div>
                                                </a>
                                                <div class="trending-now-caption">
                                                    <h2 class="trending-now-title"><strong><?php echo substr($blogTitle, 0, 30) ?>...&nbsp;</strong><a class="read" href="<?php echo $blogUrl ?>" target="_blank">Read More</a></h2>
                                                    <h2 class="trending-now-title-sub"><i class="fa fa-calendar"></i>&nbsp;<?php echo $blogPostedDate  ?><span class="float-right"><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $blogWriter  ?></span></h2>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="sidebar-block featured-properties">
                                    <div class="heading-sub">
                                        <h2 class="heading-sub-title">Featured</h2>
                                    </div>
                                    <div class="owl-carousel owl-theme single-item-carousel" style="position: relative;">
                                        <?php
                                        $i = 0;
                                        foreach ($featuredProjectsArray as $featuredProjects) {
                                            $i++;
                                            if ($i == 1) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            $featuredProjectsBanner = "./admin/banner_image_uploads/" . $featuredProjects['banner_image'];
                                            $type = pathinfo($featuredProjectsBanner, PATHINFO_EXTENSION);
                                            $data = file_get_contents($featuredProjectsBanner);
                                            $featuredProjectsBanner = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                            $featuredProjectsTitle = $featuredProjects['project_name'];
                                            $featuredProjectsLocation = $featuredProjects['project_location'];
                                            $featuredProjectsPrice = $featuredProjects['price'];
                                            $featuredProjectsUrl = strtolower($featuredProjects['city_url'] . '/' . $featuredProjects['area_url'] . '/' . str_replace(' ', '-', $featuredProjects['project_name']) . '/review/brouchure/floor-plan/price');
                                        ?>
                                            <div class="featured-items">
                                                <div class="featured-meta"><button class="btn btn-secondary btn-sm featured-meta-text" type="button"><i class="fa fa-inr"></i>&nbsp;<?php echo $featuredProjectsPrice ?></button></div>
                                                <div class="featured-top">
                                                    <a class="featured-bg" href="<?php echo $featuredProjectsUrl ?>" target="_blank" style="background: url('<?php echo $featuredProjectsBanner ?>') center / cover no-repeat;">
                                                        <div class="featured-overlay"></div>
                                                        <div class="featured-caption">
                                                            <h5 class="featured-title"><?php echo $featuredProjectsTitle ?></h5>
                                                            <h5 class="featured-address"><i class="fa fa-map-marker"></i>&nbsp; <?php echo $featuredProjectsLocation ?>&nbsp;&nbsp;</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="sidebar-block latest-properties">
                                    <div class="heading-sub">
                                        <h2 class="heading-sub-title">Latest Post</h2>
                                    </div>
                                    <div class="owl-carousel owl-theme single-item-carousel latest-main">
                                        <?php
                                        $i = 0;
                                        foreach ($latestProjectsArray as $latestProjects) {
                                            $i++;
                                            if ($i == 1) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            $latestBanner = "./admin/banner_image_uploads/" . $latestProjects['banner_image'];
                                            $type = pathinfo($latestBanner, PATHINFO_EXTENSION);
                                            $data = file_get_contents($latestBanner);
                                            $latestBanner = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                            $latestTitle = $latestProjects['project_name'];
                                            $latestLocation = $latestProjects['project_location'];
                                            $latestUrl = strtolower($latestProjects['city_url'] . '/' . $latestProjects['area_url'] . '/' . str_replace(' ', '-', $latestProjects['project_name']) . '/review/brouchure/floor-plan/price');
                                        ?>
                                            <a class="fixed-bg latest-img" href="<?php echo $latestUrl ?>" style="background: url('<?php echo $latestBanner ?>');" target="_blank">
                                                <div class="latest-overlary"></div>
                                                <div class="latest-caption">
                                                    <h3 class="latest-title"><?php echo $latestTitle ?></h3>
                                                    <h3 class="latest-address"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $latestLocation ?></h3>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="sidebar-block hot-properties">
                                    <div class="heading-sub">
                                        <h2 class="heading-sub-title"><span style="color: #f23b3b;font-weight: 900;">H</span>ot Deals</h2>
                                    </div>
                                    <div class="owl-carousel owl-theme single-item-carousel">
                                        <?php
                                        $i = 0;
                                        foreach ($hotProjectsArray as $hotProjects) {
                                            $i++;
                                            if ($i == 1) {
                                                $active = "active";
                                            } else {
                                                $active = "";
                                            }
                                            $hotProjectsBanner = "./admin/banner_image_uploads/" . $hotProjects['banner_image'];
                                            $type = pathinfo($hotProjectsBanner, PATHINFO_EXTENSION);
                                            $data = file_get_contents($hotProjectsBanner);
                                            $hotProjectsBanner = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                            $hotProjectsTitle = $hotProjects['project_name'];
                                            $hotProjectsId = $hotProjects['project_id'];
                                            $hotProjectsLocation = $hotProjects['project_location'];
                                            $hotProjectsPrice = $hotProjects['price'];
                                            $hotProjectsUrl = strtolower($hotProjects['city_url'] . '/' . $hotProjects['area_url'] . '/' . str_replace(' ', '-', $hotProjects['project_name']) . '/review/brouchure/floor-plan/price');

                                        ?>
                                            <div class="hot-deal-items">
                                                <a class="hot-deal-img" href="<?php echo $hotProjectsUrl ?>" target="_blank" style="background: url('<?php echo $hotProjectsBanner ?>') center / cover no-repeat;">
                                                    <div class="hot-deals-overlay"></div>
                                                </a>
                                                <div class="hot-deals-caption">
                                                    <h3 class="hot-deals-title"><?php echo $hotProjectsTitle ?>&nbsp;<a class="btn btn-outline-danger btn-sm hot-deal-view-more float-right" role="button" target="_blank" href="<?php echo $hotProjectsUrl ?>">Detail&nbsp;<i class="fa fa-share-square"></i></a><span class="hot-deals-address"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $hotProjectsLocation ?></span></h3>
                                                    <ul class="list-unstyled hot-deals-ul">
                                                        <li class="hot-deals-li hot-deal-price"><i class="fa fa-inr"></i>&nbsp;<?php echo $hotProjectsPrice ?><a class="btn btn-dark btn-sm enquire-btn float-right projectInquiry" role="button" id="<?php echo $hotProjectsId ?>"><i class="fa fa-envelope-open-o"></i>&nbsp;Enquire Now</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="sidebar-block" style="display: none;"></div>
                            </aside>
                        </div>
                        <div class="col-xl-8 main-column">
                            <div class="row">
                                <div class="col-xl-12">
                                    <?php
                                    $i = 0;
                                    foreach ($blogsArray as $blogs) {
                                        $i++;
                                        $blogTitle = $blogs['blog_title'];
                                        $blogContent = $blogs['blog_content'];
                                        $blogBanner = "./admin/blog_banners_uploads/" . $blogs['blog_banner'];
                                        $type = pathinfo($blogBanner, PATHINFO_EXTENSION);
                                        $data = file_get_contents($blogBanner);
                                        $blogBanner = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                        $blogUrl = 'trending-now/realestate/article/' . $blogs['blog_url'];
                                        $blogWriter = $blogs['blog_writer_name'];
                                        $blogPostedDate = date('d / M / Y ', strtotime($blogs['created']));
                                    ?>
                                        <div class="trending-page trending-now-items">
                                            <a class="fixed-bg trending-now-img" href="<?php echo $blogUrl ?>" style="background: url('<?php echo $blogBanner  ?>');" target="_blank">
                                                <div class="trending-now-overlay"></div>
                                            </a>
                                            <div class="trending-now-caption">
                                                <h2 class="trending-now-title"><strong><?php echo substr($blogTitle, 0, 30) ?>...&nbsp;</strong><a class="read" href="<?php echo $blogUrl ?>" target="_blank">Read More</a></h2>
                                                <h2 class="trending-now-title-sub"><i class="fa fa-calendar"></i>&nbsp;<?php echo $blogPostedDate ?><span class="float-right"><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $blogWriter ?></span></h2>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php 
        include 'footer.php';
        include 'script_links.php'; 
    ?>
</body>

</html>