<?php
include 'prevent.php';
include 'insert_all_table.php';
$property_type_id=$_GET['property_types_id'];
$select_propertyTypes=mysqli_query($db_connect,"SELECT * FROM property_types WHERE property_types_id='$property_type_id'");
while ($row=mysqli_fetch_array($select_propertyTypes)) {
  $propertyTypeName=$row['property_types_name'];
  $propertyTypeUrl=$row['property_types_url'];
  $propertyTypeDescription=$row['property_types_description'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Edit Property Types</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Types Name</label>
                      <input type="text" name="property_types_name" class="form-control" id="property_types_name" value="<?php echo $propertyTypeName;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Types Url</label>
                      <input type="text" name="property_types_url" class="form-control" id="property_types_url" value="<?php echo $propertyTypeUrl ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="property_types_description" name="property_types_description" class="form-control" rows="4"><?php echo strip_tags($propertyTypeDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="propertystaus.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="propertyTypes_Edit" value="SAVE" class="btn btn-success">
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
          property_types_name:"required",
          property_types_url:"required",
          property_types_description:"required"
        },
        messages:{
          property_types_name:"<span>Please Enter Property Type Name</span>",
          property_types_url:"<span>Please Enter Property Type Url</span>",
          property_types_description:"Please Enter Property Type Description"
        }
      })
    })
  </script>
</body>

</html>
