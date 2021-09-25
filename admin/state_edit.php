<?php
include 'prevent.php';
include 'insert_all_table.php';
include 'fetch_all_table.php';
$state_Id=$_GET['state_id'];
$selectState=mysqli_query($db_connect,"
  SELECT * FROM state WHERE state_id='$state_Id'");
while ($row=mysqli_fetch_array($selectState)) {
  $stateId=$row['state_id'];
  $stateName=$row['state_name'];
  $stateUrl=$row['state_url'];
  $stateDescription=$row['state_description'];
  $countryId=$row['country_id'];
  $stateBanner=$row['state_banner'];

  $stateBannerUrl="banner_image_uploads/".$stateBanner;
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit State</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Country Name</label>
                      <select class="form-control" name="country_name" id="country_name">
                        <option value="">Select Country</option>
                        <?php 
                        foreach ($countryArray as $countryList) {?>
                        <option value="<?php echo $countryList['country_id']?>"
                          <?php
                          if ($countryId==$countryList['country_id']) {
                            echo "selected==selected";
                          }
                          ?>>
                          <?php echo $countryList['country_name']?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>State Name</th>
                      <th>Url</th>
                      <th>Old Banner</th>
                      <th>Choose New Banner</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" name="state_name" class="form-control" placeholder="Enter State Name" value="<?php echo $stateName;?>">
                      </td>
                      <td>
                        <input type="text" name="state_url" class="form-control" placeholder="Enter State Url" value="<?php echo $stateUrl ?>">
                      </td>
                      <td>
                        <img src="<?php echo $stateBannerUrl;?>" style="width: 50px;height: 50px;">
                      </td>
                      <td>
                        <input type="file" name="state_banner" class="form-control" >
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>State Description</label>
                      <textarea id="state_description" name="state_description" class="form-control" rows="4"><?php echo strip_tags($stateDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="stateEdit" value="SAVE" class="btn btn-success">
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
  $(document).ready(function () {
    $("#myform").validate({
        rules:{
            country_name:"required",
            state_name:"required",
            state_url:"required",
            state_description:"required"
        },
        messages:{
            country_name:"Please Select Country",
            state_name:"Please Enter State Name",
            state_url:"Please Enter State Url",
            state_description:"Please Enter State Description"
        }
    })
  })
</script>