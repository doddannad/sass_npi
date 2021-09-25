<style>
    .footer-links-primary-ul-main.rec li {
        width: 240px;
    }
</style>
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="footer-links-wraper-main">
                <!-- <div class="footer-links-wraper-inner">
                    <div class="footer-links-main-header">
                        <h2 class="footer-links-main-titile">Top Links to Search Home</h2>
                    </div>
                    <ul class="footer-links-primary-ul-main">
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">Top builders</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($partnersArray as $partners) {
                                    $footerBuildersName = $partners['builders_name'];
                                    $footerBuildersUrl = $partners['builders_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $footerBuildersUrl ?>" title="<?php echo $footerBuildersName ?>" target="_blank"><?php echo $footerBuildersName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">Real Estate In India</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($stateArray as $state) {
                                    $footerStateName = 'Properties In ' . $state['state_name'];
                                    $footerStateUrl = $state['state_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $footerStateUrl ?>" title="<?php echo $footerStateName ?>" target="_blank"><?php echo $footerStateName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">Property Types</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($propertyTypesArray as $propertyTypes) {
                                    $footerPropertyTypesName = $propertyTypes['property_types_name'] . ' in India';
                                    $footerPropertyTypesUrl = $propertyTypes['property_types_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $footerPropertyTypesUrl ?>" title="Title" target="_blank"><?php echo $footerPropertyTypesName ?></a>
                                    </li>
                                <?php } ?>
                                <?php
                                foreach ($propertyStatusArray as $propertyStatus) {
                                    $footerPropertyStatusName = $propertyStatus['property_status_name'] . ' Projects in India';
                                    $footerStatusTypesUrl = $propertyStatus['property_status_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $footerStatusTypesUrl ?>" title="<?php echo $footerPropertyStatusName ?>" target="_blank"><?php echo $footerPropertyStatusName ?></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">Buy Properties</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($cityArray as $city) {
                                    $footerCityName = 'Properties for sale in ' . $city['city_name'];
                                    $footerCityUrl = $city['city_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $footerCityUrl ?>" title="<?php echo $footerCityName ?>" target="_blank"><?php echo $footerCityName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer-links-wraper-inner">
                    <div class="footer-links-main-header">
                        <h2 class="footer-links-main-titile">Recommonded&nbsp;for you</h2>
                    </div>
                    <ul id="footer-links-primary-ul-main" class="footer-links-primary-ul-main rec">
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile" data-toggle="tooltip" data-bs-tooltip="" data-placement="left" title="builders">builders</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($ftRecBuildersArray as $ftRecBuilders) {
                                    $ftRecBuildersName = $ftRecBuilders['builders_name'];
                                    $ftRecBuildersUrl = $ftRecBuilders['builders_url']
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="left" class="footer-links" href="<?php echo $ftRecBuildersUrl ?>" title="<?php echo $ftRecBuildersName ?>" target="_blank"><?php echo $ftRecBuildersName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">Properties <?php echo $inHeading ?></h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($ftRecBhkInCityArray as $ftRecBhkInCity) {
                                    $ftRecBhkInCityName = $ftRecBhkInCity['bed_rooms_name'] . " Properties in " . $ftRecBhkInCity['city_name'];
                                    $ftRecBhkInCityUrl = $ftRecBhkInCity['city_url'] . "/" . $ftRecBhkInCity['bed_rooms_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="top" class="footer-links" href="<?php echo $ftRecBhkInCityUrl ?>" title="<?php echo $ftRecBhkInCityName ?>" target="_blank"><?php echo $ftRecBhkInCityName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">FEATURED <?php echo $inHeading ?></h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($ftRecBhkWithPropTypesInCityArray as $ftRecBhkWithPropTypesInCity) {
                                    $ftRecBhkWithPropTypesInCityName = $ftRecBhkWithPropTypesInCity['bed_rooms_name'] . " " . $ftRecBhkWithPropTypesInCity['property_types_name'] . "  in " . $ftRecBhkWithPropTypesInCity['city_name'];

                                    $ftRecBhkInCityUrl = "property/" . $ftRecBhkWithPropTypesInCity['city_url'] . "/" . $ftRecBhkWithPropTypesInCity['property_types_url'] . "/" . $ftRecBhkWithPropTypesInCity['bed_rooms_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="top" class="footer-links" href="<?php echo $ftRecBhkInCityUrl ?>" title="<?php echo $ftRecBhkWithPropTypesInCityName ?>" target="_blank"><?php echo $ftRecBhkWithPropTypesInCityName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">SEARCHES</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($ftRecPropTypesInCityArray as $ftRecPropTypesInCity) {
                                    $ftRecPropTypesInCityName = $ftRecPropTypesInCity['property_types_name'] . " in " . $ftRecPropTypesInCity['city_name'];

                                    $ftRecPropTypesInCityUrl = $ftRecPropTypesInCity['city_url'] . "/" . $ftRecPropTypesInCity['property_types_url']
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="top" class="footer-links" href="<?php echo $ftRecPropTypesInCityUrl ?>" title="<?php echo $ftRecPropTypesInCityName ?>" target="_blank"><?php echo $ftRecPropTypesInCityName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <div class="footer-links-sub-header">
                                <h3 class="footer-links-sub-titile">QUICK SEARCHES</h3>
                            </div>
                            <ul class="footer-links-primary-ul-inner">
                                <?php
                                foreach ($ftRecCityWithAreaArray as $ftRecCityWithArea) {
                                    $ftRecCityWithAreaName = $ftRecCityWithArea['area_name'] . " in " . $ftRecCityWithArea['city_name'];
                                    $ftRecCityWithAreaUrl = $ftRecCityWithArea['city_url'] . "/" . $ftRecCityWithArea['area_url'];
                                ?>
                                    <li>
                                        <a data-toggle="tooltip" data-bs-tooltip="" data-placement="top" class="footer-links" href="<?php echo $ftRecCityWithAreaUrl ?>" title="<?php echo $ftRecCityWithAreaName ?>" target="_blank"><?php echo $ftRecCityWithAreaName ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <div class="arrow arrow-left"><i class="fa fa-angle-left"></i></div>
                    <div class="arrow arrow-right"><i class="fa fa-angle-right"></i></div>
                </div> -->
                <div class="footer-links-wraper-inner">
                    <div class="row text-center">
                        <div class="col-md-12 item text">
                            <div class="footer-links-sub-header">
                                <h2 class="footer-links-sub-titile">about <?php echo $source ?></h2>
                            </div>
                            <p class="readMoreDescription"><?php echo $source ?> is an online real estate advisor that functions on the fundamentals of trust, transparency and expertise.&nbsp;<span class="dots">..</span><span class="">&nbsp;As a digital marketplace with an exhaustive range of property listings, we know it is easy to get lost. At <?php echo $source ?>, we guide home buyers right from the start of their home search to the very end. Browse through more than 139,000 verified real estate properties with accurate lowdown on amenities, neighborhoods and cities, and genuine pictures. Shortlist your favorite homes and allow us to arrange site visits. Our work does not end here. We assist you with home loans and property registrations. Buying a home is an important investment – turn it into your safest, best deal at <?php echo $source ?>.</span>
                            </p>
                        </div>
                        <div class="col-md-12 item">
                            <div class="footer-links-sub-header">
                                <h2 class="footer-links-sub-titile">Contact</h2>
                            </div>
                            <ul>
                                <li><i class="fa fa-location-arrow"></i><a>&nbsp;527, 4th Cross, CMR Rd, HRBR Layout 2nd Block, Bengaluru, Karnataka 560042<br></a></li>
                                <li><i class="fa fa-volume-control-phone"></i><a href="tel:// +91 9986219795">&nbsp;+91 9986219795</a></li>
                            </ul>
                        </div>

                    </div>
                    <p class="desclaimer"><strong>Desclaimer :&nbsp;</strong>&nbsp;This Website Is In The Process Of Being Updated. By Accessing This Website, The Viewer Confirms That The Information Including Brochures And Marketing Collaterals On This Website Are Solely
                        For Informational Purposes Only And The Viewer Has Not Relied On This Information For Making Any Booking/Purchase In Any Project Of The Company. Nothing On This Website, Constitutes Advertising, Marketing, Booking, Selling
                        Or An Offer For Sale, Or Invitation To Purchase A Unit In Any Project By The Company. The Company Is Not Liable For Any Consequence Of Any Action Taken By The Viewer Relying On Such Material Information On This Website. </p>
                    <p class="copyright"><?php echo $source ?> © <?php echo date('Y') ?></p>
                </div>
            </div>
        </div>
    </footer>
</div>