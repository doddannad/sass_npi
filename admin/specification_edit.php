<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';
$project_id=$_GET['project_id'];
$selectSpecificationsList=mysqli_query($db_connect,"
  SELECT sp.specifications_id,sp.project_id,sp.specification_name,sp.description
  FROM specifications AS sp
  WHERE sp.project_id='$project_id' ");
$specificationsListArray = array();
while ($row=mysqli_fetch_array($selectSpecificationsList)) 
{
  $projectId=$row['project_id'];
  $specificationsListArray[]=$row;
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Specifications</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Specifications
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
                      <select class="form-control" name="builders_name" onchange="fetch_project(this.value)">
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
                              echo "selected==selected";
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
                        <th>Specification Name</th>
                        <th>Describe Specification</th>
                      </tr>
                      <?php
                      foreach ($specificationsListArray as $specificationsList) {?>
                      <tr>
                        <td><input type="text" name="specification_name[]" class="form-control" placeholder="Specification Name" value="<?php echo $specificationsList['specification_name']?>"></td>
                        <td><textarea class="form-control" name="specification_description[]" placeholder="Describe Specification"><?php echo $specificationsList['description']?></textarea>
                        </td>
                        <td style="display: none;">
                          <input type="text" name="specifications_id[]" value="<?php echo $specificationsList['specifications_id']?>" class="form-control">
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="amenities.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="specificationEdit" value="SAVE" class="btn btn-success">
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
      $("#add_more_field").append('<tr><td><input type="text" name="specification_name[]" class="form-control" placeholder="Specification Name"></td><td><textarea class="form-control" name="specification_description[]" placeholder="Describe Specification"></textarea></td><td style="text-align: center;"><button class="btn btn-danger remove" name="remove"><span class="fa fa-trash"></span></button></td></tr>');
    })
    $("#add_more_field").on('click','.remove',function () {
      $(this).parent().parent().remove();
    })
  })
</script>

<script type="text/javascript">
  function fetch_project(val) {
    $.ajax({
      type:"post",
      url:"fetch_all_table.php",
      data:"builders_id="+val,
      success:function (data) {
        $("#project_name").html(data);
      }
    })
  }
</script>