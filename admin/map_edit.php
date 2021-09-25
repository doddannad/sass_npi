<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';
$project_id=$_GET['project_id'];
$selectMap=mysqli_query($db_connect,"
  SELECT ld.location_id,ld.project_id,ld.lat,ld.lng
  FROM location_detail AS ld WHERE ld.project_id='$project_id'
   ");
while ($row=mysqli_fetch_array($selectMap)) {
  $location_id=$row['location_id'];
  $projectId=$row['project_id'];
  $latt=$row['lat'];
  $lngg=$row['lng'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Edit Maps</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Maps
              </h6>
            </div>
            <div class="card-body">
              
              <div class="row">
            <div class="col-md-12">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    
                    <span id="error"></span>
                    <table class="table table-bordered" id="add_more_field">
                      <tr>
                        <th>Select Project</th>
                        <th>Lattitude</th>
                        <th>Langitude</th>
                      </tr>
                      <tr>
                        <td><select class="form-control" name="project_name" ><option value="">Select</option><?php foreach ($project_detail as $project) {?><option value="<?php echo $project['project_id'] ?>"
                          <?php if ($project['project_id']==$projectId) {
                          echo "selected=selected";
                        } ?>><?php echo $project['project_name'] ?></option><?php }?></select></td>
                        <td><input type="text" name="lat" class="form-control" placeholder="Enter Lattitude" value="<?php echo $latt;?>"></td>
                        <td><input type="text" name="lng" class="form-control" placeholder="Enter Langittude" value="<?php echo $lngg;?>"></td>
                        <td style="display: none;"><input type="text" name="location_id" class="form-control" value="<?php echo $location_id;?>"></td>
                      </tr>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="maps.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="mapsEdit" value="SAVE" class="btn btn-success">
                    </div>
                  </div>                
              </form>
            </div>
          </div>

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
          project_name:"required",
          lat:"required",
          lng:"required"
        },
        messages:{
          project_name:"Please Select Project",
          lat:"Please Enter Lattitude",
          lng:"Please Enter Langitude"
        }
      })
    })
  </script>
</body>

</html>