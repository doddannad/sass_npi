<?php
include 'prevent.php';
include 'insert_all_table.php';
include 'fetch_all_table.php';
$cityId=$_GET['city'];
$selectCity=mysqli_query($db_connect,"SELECT * FROM city WHERE city_id='$cityId'");
while ($row=mysqli_fetch_array($selectCity)) {
  $city_id=$row['city_id'];
  $cityName=$row['city_name'];
  $stateId=$row['state_id'];
  $cityBanner="banner_image_uploads/".$row['city_banner'];
  $aboutCity = $row['city_description'];
  $cityUrl = $row['city_url'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit City</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select State Name</label>
                      <select class="form-control" name="state_name" id="state_name">
                        <option value="">Select State</option>
                        <?php 
                        foreach ($stateArray as $stateList) {?>
                        <option value="<?php echo $stateList['state_id']?>"
                          <?php 
                          if ($stateId==$stateList['state_id']) {
                            echo "selected=selected";
                          }
                          ?>>
                          <?php echo $stateList['state_name']?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>City Name</th>
                      <th>Old Banner</th>
                      <th>Choose New Banner</th>
                      <th>City Url</th>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" name="city_name" class="form-control" placeholder="Enter City Name" value="<?php echo $cityName;?>">
                      </td>
                      <td>
                        <img src="<?php echo $cityBanner;?>" style="width: 50px;height: 50px;">
                      </td>
                      <td>
                        <input type="file" name="city_banner" class="form-control">
                      </td>
                      <td>
                        <input type="text" name="city_url" class="form-control" value="<?php echo $cityUrl ?>"> 
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="about_city" name="about_city" class="form-control" rows="4"><?php echo strip_tags($aboutCity) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="cityEdit" value="SAVE" class="btn btn-success">
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
  <script type="text/javascript">
    $(document).ready(function () {
      $("#myform").validate({
          rules:{
              state_name:"required",
              city_name:"required",
              about_city:"required",
              city_url:"required",
              about_city:"required"
          },
          messages:{
              state_name:"Please Select State",
              city_name:"Please Enter City Name",
              about_city:"Please Enter About City",
              city_url:"Please Enter City Url",
              about_city:"Please Enter City Description"
          }
      })
    })
  </script>
</body>

</html>