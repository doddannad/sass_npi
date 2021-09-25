<?php
include 'prevent.php';
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Property Types</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Types Name</label>
                      <input type="text" name="property_types_name" class="form-control" id="property_types_name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Property Types Url</label>
                      <input type="text" name="property_types_url" class="form-control" id="property_types_url">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="property_types_description" name="property_types_description" class="form-control" rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="propertystaus.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="propertyTypes_Add" value="SAVE" class="btn btn-success">
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