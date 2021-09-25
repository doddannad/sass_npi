<?php
include 'prevent.php';
include 'insert_all_table.php';
$builders_id=$_GET['builders_id'];

$select_builders_list=mysqli_query($db_connect,"SELECT * FROM builders_list WHERE builders_id='$builders_id' ");
while ($row=mysqli_fetch_array($select_builders_list)) 
{
  $buildersName=$row['builders_name'];
  $buildersUrl=$row['builders_url'];
  $buildersLogo="files_uploads/".$row['builders_logo'];
  $ongoingProjects=$row['completed_projects'];
  $about_builder=$row['about_group'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Builder</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="builderForm" id="builderForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builder Name</label>
                      <input type="text" name="builders_name" class="form-control" id="builders_name" value="<?php echo $buildersName?>" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builder Url</label>
                      <input type="text" name="builders_url" class="form-control" id="builders_url" required placeholder="Ex: buildres-url" value="<?php echo $buildersUrl ?>" required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Old Logo</label><br>
                      <img src="<?php echo $buildersLogo ?>" style="width: 50px;height: 50px">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Change Logo</label>
                      <input type="file" name="builders_logo" class="form-control" id="builders_logo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Completed Projects</label>
                      <input type="text" name="ongoing_projects" class="form-control" id="ongoing_projects" value="<?php echo $ongoingProjects?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Builders Description</label>
                      <textarea id="about_group" name="about_group" class="form-control" rows="4"><?php echo strip_tags($about_builder) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="builders.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="buildersEdit" value="SAVE" class="btn btn-success">
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
    $("#builderForm").validate({
        rules:{
            builders_name:"required",
            builders_url:"required",
            builders_logo:{
              extension:"webp"
            },
            about_group: "required",
        },
        messages:{
            builders_name:"<span>Please Enter Builder Name</span>",
            builders_url:"Please Enter Builder Url",
            builders_logo:{
              extension:"Please Upload in .webp format"
            },
            about_group: "Please Enter Builder Description",
        }
    })
  })
</script>