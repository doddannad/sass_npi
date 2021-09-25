<?php
include 'prevent.php';
include 'insert_all_table.php';
$units_id=$_GET['units_id'];
$select_units_id=mysqli_query($db_connect,"SELECT * FROM unit_types WHERE unit_types_id='$units_id'");
while ($row=mysqli_fetch_array($select_units_id)) {
  $units_types_name=$row['unti_types_name'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Units</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Units Name</label>
                      <input type="text" name="unti_types_name" class="form-control" id="builders_name" value="<?php echo $units_types_name;?>">
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="types.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="unitsEdit" value="SAVE" class="btn btn-success">
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
        unti_types_name:"required"
      },
      messages:{
        unti_types_name:"<span>Please Enter Unit Type Name</span>"
      }
    })
  })
</script>