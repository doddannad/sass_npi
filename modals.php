<style type="text/css">
    .modal {
        background: rgb(0, 51, 90, .5);
    }
</style>


<!-- Start Privacy Modal -->
<div class="modal fade show" role="dialog" tabindex="-1" id="autoPopUpModal">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 5px;border: 0px solid #ced4da;">
            <div class="modal-header" style="border: 0;">
                <h4 class="modal-title">Hi there, <br> Welcome to the official project site</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <h5>We understand how important your privacy is. Your data is completely secured and protected with end to end and it will not be shared with any other parties. </h5>
            </div>
        </div>
    </div>
</div>
<!-- End Privacy Modal -->

<!-- End Enquiry Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enquieryModal">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Get in Touch</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-outline-danger btn-block text-uppercase" type="button" style="border-radius: 0;">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<!-- End Enquiry Modal -->

<!-- Start Guide to Book Modal -->

<!-- Start Search & Sort List Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalSortList">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Search & Sort List</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select form-control form-builder" data-live-search="true" id="form-builders" onchange="fetchBuilderProjects(this.value)">
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
                        <select class="form-select form-control" data-live-search="true" id="form-projects" disabled name="project_id" required>
                            <option value="">Select Builder First</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnSortList" style="border-radius: 0;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Search & Sort List Modal -->

<!-- Start Book Site Visit Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalBookSiteVisit">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Book A Site Visit</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select form-control form-builder" data-live-search="true" id="form-builders" onchange="fetchBuilderProjects(this.value)">
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
                        <select class="form-select form-control" data-live-search="true" id="form-projects" disabled name="project_id" required>
                            <option value="">Select Builder First</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnBookSiteVisit" style="border-radius: 0;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Book Site Visit Modal -->

<!-- Start Home Loan Assitance Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalHomeLoanAssist">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Apply Home Loan</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select form-control form-builder" data-live-search="true" id="form-builders" onchange="fetchBuilderProjects(this.value)">
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
                        <select class="form-select form-control" data-live-search="true" id="form-projects" disabled name="project_id" required>
                            <option value="">Select Builder First</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnHomeLoan" style="border-radius: 0;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Home Loan Assitance Modal -->

<!-- Start Legal Advice Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalLegalAdvice">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Get in Touch for Legal Advice</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnLegalAdvice" style="border-radius: 0;">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<!-- End Legal Advice Modal -->

<!-- Start Unit Booking Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalUnitBook">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Unit Booking</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <select class="form-select form-control form-builder" data-live-search="true" id="form-builders" onchange="fetchBuilderProjects(this.value)">
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
                        <select class="form-select form-control" data-live-search="true" id="form-projects" disabled name="project_id" required>
                            <option value="">Select Builder First</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnUnitBook" style="border-radius: 0;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Unit Booking Modal -->

<!-- End Guide to Book Modal -->


<!-- End Enquiry Modal With Propject -->
<div class="modal fade" role="dialog" tabindex="-1" id="enquire">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Enquire Now</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="project_id" placeholder="Name" name="project_id">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="project_name" placeholder="Name" name="project_name" readonly>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="submit_inquiry" style="border-radius: 0;">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<!-- End Enquiry Modal With Propject -->

<!-- Start Property Single Modals -->

<!-- Start Floor Plan Modals -->
<div class="modal fade" role="dialog" tabindex="-1" id="floor-plan">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Download Floor Plan And Master Plan</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="project_id" name="project_id" value="<?php echo $projectId ?>">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btn_dload_floor" style="border-radius: 0;">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<!-- End Floor Plan Modals -->

<!-- Start Floor Plan Modals -->
<div class="modal fade" role="dialog" tabindex="-1" id="price-sheet">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 0;border: 1px solid #ced4da;">
            <div class="modal-header">
                <h4 class="modal-title">Download Price Sheet</h4><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="myForm" class="contact-form modal-form" action="project_inquiry.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="project_id" name="project_id" value="<?php echo $projectId ?>">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="name" placeholder="Name" name="name" required="" onkeypress="return isLetter(event)">
                    </div>
                    <div class="mb-3">

                        <input class="form-control intTelInput" type="text" id="mobile" placeholder="Phone" name="phone" required="" minlength="10" maxlength="13" onkeypress="return isNumber(event)">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email">
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-outline-danger btn-block text-uppercase" type="submit" name="btnRequestPrice" style="border-radius: 0;">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<!-- End Floor Plan Modals -->

<!-- End Property Single Modals -->