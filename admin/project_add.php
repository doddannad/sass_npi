<?php
include 'prevent.php';
include('fetch_all_table.php');
include 'insert_all_table.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  include('head_links.php');
  ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    include 'sideMenuBar.php';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include 'topBar.php';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Project</h1>
          </div>
          <hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="projectAddForm" id="projectAddForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builders</label>
                      <select class="form-control" name="builders_name" id="builders_name">
                        <option value="">Select</option>
                        <?php
                        foreach ($builders_list as $builders) {
                        ?>
                          <option value="<?php echo $builders['builders_id']; ?>">
                            <?php echo $builders['builders_name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                      <input type="text" name="project_name" class="form-control" id="project_name">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control" name="country" id="country" onchange="fetchState(this.value);">
                        <option value="">--Select Country--</option>
                        <?php
                        foreach ($countryArray as $countryList) { ?>
                          <option value="<?php echo $countryList['country_id'] ?>"><?php echo $countryList['country_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">


                  <div class="col-md-4">
                    <div class="form-group">
                      <label>State</label>
                      <select class="form-control" name="state" id="state" onchange="fetchCity(this.value);">
                        <option value="">--Select State--</option>
                        <option value="">Please Select Country</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>City</label>
                      <select class="form-control" name="city" id="city" onchange="fetcharea(this.value);">
                        <option value="">--Select City--</option>
                        <option value="">Please Select State</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Area</label>
                      <select class="form-control" name="area" id="area">
                        <option value="">--Select Area--</option>
                        <option value="">Please Select City</option>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">


                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="project_location" id="project_location" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Unit Types</label>
                      <select class="form-control" name="unit_types" id="unit_types">
                        <option value="">Select</option>
                        <?php foreach ($unitTypesArray as $bedRooms) {
                        ?>
                          <option value="<?php echo $bedRooms['unit_types_id'] ?>">
                            <?php echo $bedRooms['unti_types_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Price Onwards</label>
                      <input type="text" name="price" class="form-control" id="price">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Units</label>
                      <input type="text" name="total_units" class="form-control" id="total_units">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Land</label>
                      <input type="text" name="total_land_area" class="form-control" id="total_land_area">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Blocks and Towers</label>
                      <input type="text" name="blocks_towers" class="form-control" id="blocks_towers">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Possesion Date</label>
                      <input type="text" name="possesion_date" class="form-control" id="possesion_date">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Type</label>
                      <select class="form-control" name="propertyType" id="propertyType">
                        <option value="">--Select Property Type--</option>
                        <?php
                        foreach ($propertyTypesArray as $propertyTypes) { ?>
                          <option value="<?php echo $propertyTypes['property_types_id'] ?>">
                            <?php echo $propertyTypes['property_types_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Status</label>
                      <select class="form-control" name="propertyStatus" id="propertyStatus">
                        <option value="">--Select Property Status--</option>
                        <?php
                        foreach ($propertyStatusArray as $propertyStatus) { ?>
                          <option value="<?php echo $propertyStatus['property_status_id'] ?>">
                            <?php echo $propertyStatus['property_status_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Upload Banner Image</label>
                      <input type="file" name="banner_image" class="form-control" id="banner_image" onchange="bannerImageSizeValidation()">
                    </div>
                  </div>
                  <div class="col-sm-4" style="display: none;">
                    <div class="form-group">
                      <label>Paste Video Link</label>
                      <input type="text" name="video_link" class="form-control" id="video_link">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>No of Views</label>
                      <input type="text" name="no_of_views" class="form-control" id="no_of_views">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Project Description</label>
                      <textarea id="about_project" name="about_project" class="form-control" rows="4"></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('about_project');
                      </script>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Meta Keywords</label>
                      <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Meta Description</label>
                      <textarea id="meta_description" name="meta_description" class="form-control" rows="4"></textarea>
                    </div>
                  </div>
                </div>

                <hr class="mb-4">

                <div class="clearfix">
                  <div class="float-right">
                    <a href="projects.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="projectAdd" value="SAVE" class="btn btn-success">
                  </div>
                </div>
                <hr class="mb-4">
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      include('footer.php')
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php
  include('script_links.php');
  ?>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
</body>

</html>
<script type="text/javascript">
  function fetchState(val) {
    $.ajax({
      type: "POST",
      url: "fetch_all_table.php",
      data: 'country_id=' + val,
      success: function(data) {
        $("#state").html(data);
      }
    });
  }

  function fetchCity(val) {
    $.ajax({
      type: "POST",
      url: "fetch_all_table.php",
      data: 'state_id=' + val,
      success: function(data) {
        $("#city").html(data);
      }
    });
  }

  function fetcharea(val) {
    $.ajax({
      type: "POST",
      url: "fetch_all_table.php",
      data: 'city_id=' + val,
      success: function(data) {
        $("#area").html(data);
      }
    });
  }

  function bannerImageSizeValidation() {
    var bannerImg = document.getElementById('banner_image');
    // Check if any file is selected. 
    if (bannerImg.files.length > 0) {
      for (var i = 0; i <= bannerImg.files.length - 1; i++) {
        var bannerSize = bannerImg.files.item(i).size;
        var bannerSize = Math.round((bannerSize / 1024));
        // The size of the file.
        if (bannerSize < 100) {
          alert("File size Should Be 100 KB");
        } else if (bannerSize >= 1000) {
          alert("File size too large");
        }
      }
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#projectAddForm").validate({
      rules: {
        builders_name: 'required',
        project_name: 'required',
        country: 'required',
        state: 'required',
        city: 'required',
        area: 'required',
        project_location: 'required',
        unit_types: 'required',
        price: 'required',
        total_units: 'required',
        total_land_area: 'required',
        blocks_towers: 'required',
        possesion_date: 'required',
        propertyType: 'required',
        propertyStatus: 'required',
        banner_image: {
          required: true,
          extension: "webp,jpg,jpeg"
        },
        no_of_views: 'required',
        about_project: 'required',
        meta_keywords: 'required',
        meta_description: 'required'
      },
      messages: {
        builders_name: 'Please Select Builders',
        project_name: 'Please Enter Project Name',
        country: 'Please Select Country ',
        state: 'Please Select State',
        city: 'Please Select City',
        area: 'Please Select Area',
        project_location: 'Please Enter Location',
        unit_types: 'Please Select Bed Rooms ',
        price: 'Please Enter Price',
        total_units: 'Please Enter Units ',
        total_land_area: 'Please Enter Total Area',
        blocks_towers: 'Please Enter Block & Towers',
        possesion_date: 'Please Enter Possesion Date',
        propertyType: 'Please Select Property Type',
        propertyStatus: 'Please Select Property Status',
        banner_image: {
          required: "Please upload file.",
          extension: "Please upload banner in webp, jpg, jpeg format"
        },
        no_of_views: 'Please Enter No of Views ',
        about_project: 'Please Enter Project Description',
        meta_keywords: 'Please Enter Meta Keywords',
        meta_description: 'Please Enter Meta Description'

      }
    })
  })
</script>