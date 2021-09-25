<?php
include 'prevent.php';
include('fetch_all_table.php');
include 'insert_all_table.php';
$project_id = $_GET['project_id'];

$select_project = mysqli_query($db_connect, "SELECT *
FROM project_detail AS pd,builders_list AS bl,country AS cr,state AS st,city AS ct,area AS ar,unit_types AS ut,property_types AS pt,property_status AS ps WHERE pd.builders_id=bl.builders_id AND pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND pd.unit_types_id=ut.unit_types_id AND pd.property_types_id=pt.property_types_id AND pd.property_status_id=ps.property_status_id AND pd.project_id='$project_id'");
if ($row = mysqli_fetch_array($select_project)) {
  $builder_name = $row['builders_id'];
  $project_name = $row['project_name'];
  $countryName = $row['country_id'];
  $stateName = $row['state_id'];
  $cityName = $row['city_id'];
  $areaName = $row['area_id'];
  $location = $row['project_location'];
  $unit_type = $row['unit_types_id'];
  $pric = $row['price'];
  $land_area = $row['total_land_area'];
  $total_unit = $row['total_units'];
  $blocks = $row['blocks_towers'];
  $posseion = $row['possesion_date'];
  $about = $row['about_project'];
  $propertyTypeName = $row['property_types_id'];
  $propertyStatusName = $row['property_status_id'];
  $priceRangeId = $row['price_range_id'];
  $banner_image = $row['banner_image'];
  $videoLink = $row['video_link'];
  $metaKeywords = $row['meta_keywords'];
  $metaDescription = $row['meta_description'];
  $views = $row['no_of_views'];
  $banner_Url = "banner_image_uploads/" . $banner_image;
}
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
              <form action="" method="post" name="projectEditForm" id="projectEditForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builders</label>
                      <select class="form-control" name="builders_name" id="builders_name">
                        <option value="">Select</option>
                        <?php
                        foreach ($builders_list as $builders) {
                        ?>
                          <option value="<?php echo $builders['builders_id']; ?>" <?php
                                                                                  if ($builders['builders_id'] == $builder_name) {
                                                                                    echo "selected=selected";
                                                                                  }
                                                                                  ?>>
                            <?php echo $builders['builders_name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                      <input type="text" name="project_name" class="form-control" id="project_name" value="<?php echo $project_name; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control" name="country" id="country" onchange="fetchState(this.value);">
                        <option value="">--Select Country--</option>
                        <?php
                        foreach ($countryArray as $countryList) { ?>
                          <option value="<?php echo $countryList['country_id'] ?>" <?php
                                                                                  if ($countryList['country_id'] == $countryName) {
                                                                                    echo "selected=selected";
                                                                                  }
                                                                                  ?>><?php echo $countryList['country_name'] ?></option>
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
                        <?php
                        foreach ($stateArray as $statesList) { ?>
                          <option value="<?php echo $statesList['state_id'] ?>" <?php
                                                                                if ($statesList['state_id'] == $stateName) {
                                                                                  echo "selected=selected";
                                                                                }
                                                                                ?>><?php echo $statesList['state_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>City</label>
                      <select class="form-control" name="city" id="city" onchange="fetcharea(this.value);">
                        <option value="">--Select City--</option>
                        <?php
                        foreach ($cityArray as $cityList) { ?>
                          <option value="<?php echo $cityList['city_id'] ?>" <?php
                                                                            if ($cityList['city_id'] == $cityName) {
                                                                              echo "selected=selected";
                                                                            }
                                                                            ?>><?php echo $cityList['city_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Area</label>
                      <select class="form-control" name="area" id="area">
                        <option value="">--Select Area--</option>
                        <?php
                        foreach ($areaArray as $areaList) { ?>
                          <option value="<?php echo $areaList['area_id'] ?>" <?php
                                                                            if ($areaList['area_id'] == $areaName) {
                                                                              echo "selected=selected";
                                                                            }
                                                                            ?>><?php echo $areaList['area_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">


                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="project_location" id="project_location" class="form-control" value="<?php echo $location; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Unit Types</label>
                      <select class="form-control" name="unit_types" id="unit_types">
                        <option value="">Select</option>
                        <?php foreach ($unitTypesArray as $bedRooms) {
                        ?>
                          <option value="<?php echo $bedRooms['unit_types_id'] ?>" <?php
                                                                                    if ($bedRooms['unit_types_id'] == $unit_type) {
                                                                                      echo "selected=selected";
                                                                                    } ?>>
                            <?php echo $bedRooms['unti_types_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Price Onwards</label>
                      <input type="text" name="price" class="form-control" id="price" value="<?php echo $pric; ?>">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Units</label>
                      <input type="text" name="total_units" class="form-control" id="total_units" value="<?php echo $total_unit; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Land</label>
                      <input type="text" name="total_land_area" class="form-control" id="total_land_area" value="<?php echo $land_area; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Blocks and Towers</label>
                      <input type="text" name="blocks_towers" class="form-control" id="blocks_towers" value="<?php echo $blocks; ?>">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Possesion Date</label>
                      <input type="text" name="possesion_date" class="form-control" id="possesion_date" value="<?php echo $posseion; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Type</label>
                      <select class="form-control" name="propertyType" id="propertyType">
                        <option value="">--Select Property Type--</option>
                        <?php
                        foreach ($propertyTypesArray as $propertyTypes) { ?>
                          <option value="<?php echo $propertyTypes['property_types_id'] ?>" <?php if ($propertyTypes['property_types_id'] == $propertyTypeName) {
                                                                                              echo "selected==selected";
                                                                                            }
                                                                                            ?>>
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
                          <option value="<?php echo $propertyStatus['property_status_id'] ?>" <?php
                                                                                              if ($propertyStatus['property_status_id'] == $propertyStatusName) {
                                                                                                echo "selected==selected";
                                                                                              }
                                                                                              ?>>
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
                      <label>Video Link</label>
                      <input type="text" name="video_link" class="form-control" id="video_link" value="<?php echo $videoLink; ?>">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Upload Banner Image</label>
                      <input type="file" name="banner_image" class="form-control" id="banner_image">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Old Banner Image</label><br>
                      <a href="<?php echo $banner_Url; ?>" target="_blank" title="view image">
                        <img class="" src="<?php echo $banner_Url; ?>" style="height: 40px;width: auto;">
                      </a>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>No of Views</label>
                      <input type="text" name="no_of_views" class="form-control" id="no_of_views" value="<?php echo $views ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Project Description</label>
                      <textarea id="about_project" name="about_project" class="form-control" rows="4"><?php echo strip_tags($about); ?></textarea>
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
                      <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="6"><?php echo $metaKeywords ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Meta Description</label>
                      <textarea id="meta_description" name="meta_description" class="form-control" rows="6"><?php echo $metaDescription ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">

                <div class="clearfix">
                  <div class="float-right">
                    <a href="projects.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="projectEdit" value="SAVE" class="btn btn-success">
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
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#projectEditForm").validate({
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
          extension: "webp,jpg,jpeg"
        },
        no_of_views: 'required',
        about_project: 'required',
        meta_keywords: 'required'
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
          extension: "Please upload banner in webp, jpg, jpeg format"
        },
        no_of_views: 'Please Enter No of Views ',
        about_project: 'Please Enter About Project',
        meta_keywords: 'Please Enter Meta Keywords'
      }
    })
  })
</script>