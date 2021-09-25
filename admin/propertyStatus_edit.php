<?php
include 'prevent.php';
include 'insert_all_table.php';
$statusId=$_GET['property_status_id'];
$selectStatus=mysqli_query($db_connect,"SELECT * FROM property_status WHERE property_status_id='$statusId' ");
while ($row=mysqli_fetch_array($selectStatus)) {
  $statusName=$row['property_status_name'];
  $statusUrl=$row['property_status_url'];
  $statusDescription=$row['property_status_description'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Property Status</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Status Name</label>
                      <input type="text" name="property_status_name" class="form-control" id="property_status_name" value="<?php echo $statusName;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Status Url</label>
                      <input type="text" name="property_status_url" class="form-control" id="property_status_url" value="<?php echo $statusUrl ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="property_status_description" name="property_status_description" class="form-control"><?php echo strip_tags($statusDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="propertystaus.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="propertyStaus_Edit" value="SAVE" class="btn btn-success">
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
          property_status_name:"required",
          property_status_url:"required",
          property_status_description:"required"
        },
        messages:{
          property_status_name:"<span>Please Enter Property Status Name</span>",
          property_status_url:"<span>Please Enter Property Status Url</span>",
          property_status_description:"Please Enter Property Status Description"
        }
      })
    })
  </script>
</body>

</html>