<?php
include 'prevent.php';
include 'insert_all_table.php';
include 'fetch_all_table.php';
$areaId=$_GET['area'];
$selectCity=mysqli_query($db_connect,"SELECT * FROM area WHERE area_id='$areaId'");
while ($row=mysqli_fetch_array($selectCity)) {
  $area_id=$row['area_id'];
  $areaName=$row['area_name'];
  $areaUrl=$row['area_url'];
  $areaDescription=$row['area_description'];
  $cityId=$row['city_id'];
  $areaBanner="banner_image_uploads/".$row['area_banner'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Area</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select City Name</label>
                      <select class="form-control" name="city_name" id="city_name">
                        <option value="">Select City</option>
                        <?php 
                        foreach ($cityArray as $cityList) {?>
                        <option value="<?php echo $cityList['city_id']?>"
                        	<?php
                        	if ($cityId==$cityList['city_id']) {
                        		echo "selected==selected";
                        	}
                        	?>>
                        	<?php echo $cityList['city_name']?>
                        </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>Area Name</th>
                      <th>Url</th>
                      <th>Old Banner</th>
                      <th>Choose New Banner</th>
                    </tr>
                    <tr>
                    	<td>
                    		<input type="text" name="area_name" class="form-control" placeholder="Enter Area Name" value="<?php echo $areaName?>">
                    	</td>
                      <td>
                        <input type="text" name="area_url" class="form-control" placeholder="Enter Area Name" value="<?php echo $areaUrl?>">
                      </td>
                    	<td>
                    		<img src="<?php echo $areaBanner;?>" style="width: 50px;height: 50px;">
                    	</td>
                    	<td>
                    		<input type="file" name="area_banner" class="form-control">
                    	</td>
                    </tr>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="area_description" name="area_description" class="form-control" rows="4"><?php echo strip_tags($areaDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="areaEdit" value="SAVE" class="btn btn-success">
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
              city_name:"required",
              area_name:"required",
              area_url:"required",
              area_description:"required"
          },
          messages:{
              city_name:"Please Select City",
              area_name:"Please Enter Area Name",
              area_url:"Please Enter Area Url",
              area_description:"Please Enter Area Description"
          }
      })
    })
  </script>
</body>

</html>