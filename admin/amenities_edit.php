<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';
$project_id=$_GET['project_id'];

$selectAmenitiesList=mysqli_query($db_connect,"
  SELECT am.amenities_id,am.project_id,am.amenities_name
  FROM amenities AS am
  WHERE am.project_id='$project_id' ");
$amenitiesListArray = array();
while ($row=mysqli_fetch_array($selectAmenitiesList)) 
{
  $projectId=$row['project_id'];
  $amenitiesListArray[]=$row;
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Amenities</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Amenities
              </h6>
            </div>
            <div class="card-body">
              
              <div class="row">
            <div class="col-md-12">
              <form action="" method="post" name="myform" id="" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builders</label>
                      <select class="form-control" name="builders_name" onchange="fetch_project(this.value);">
                        <option value="">Select</option>
                        <?php 
                        foreach ($builders_list as $builders) {
                          ?>
                          <option value="<?php echo $builders['builders_id']; ?>">
                            <?php echo $builders['builders_name']; ?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                      <select class="form-control" name="project_name" id="project_name">
                        <option value="">Select</option>
                        <?php
                        foreach ($project_detail as $project) {?>
                          <option value="<?php echo $project['project_id'] ?>"
                            <?php
                            if ($project['project_id']==$projectId) {
                              echo "selected==selecteds";
                            }
                            ?>>
                            <?php echo $project['project_name'] ?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    
                    <span id="error"></span>
                    <table class="table table-bordered" id="add_more_field">
                      <tr>
                        <th>Add Amenities</th>
                      </tr>
                      <?php
                      foreach ($amenitiesListArray as $amenitiesList) {?>
                      <tr>
                        <td>
                          <input type="text" name="amenitiesName[]" class="form-control" placeholder="Enter Amenities" value="<?php echo $amenitiesList['amenities_name']; ?>">
                        </td>
                        <td style="display: none;">
                          <input type="text" name="amenities_id[]" class="form-control" value="<?php echo $amenitiesList['amenities_id']; ?>">
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="amenities.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="amenitiesEdit" value="SAVE" class="btn btn-success">
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

</body>

</html>
<script type="text/javascript">
  $(document).ready(function () {
    $(".add").click(function () {
      $("#add_more_field").append('<tr><td><input type="text" name="amenitiesName[]" class="form-control" placeholder="Enter Amenities"></td><td style="text-align: center;"><button class="btn btn-danger sm remove"><i class="fa fa-trash"></i></button></td></tr>');
    })
    $("#add_more_field").on('click','.remove',function () {
      $(this).parent().parent().remove();
    })
  })
</script>

<script type="text/javascript">
  function fetch_project(val) {
    $.ajax({
      type:"POST",
      url:"fetch_all_table.php",
      data:"builders_id="+val,
      success:function (data) {
        $("#project_name").html(data);
      }
    })
  }
</script>