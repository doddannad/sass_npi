<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';

// set default timezone
date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

$current_date = "$date/$month/$year $hour:$min:$sec";
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Create Advertisements</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Advt Title</label>
                      <input type="text" name="advt_title" class="form-control" id="advt_title">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Advt Url</label>
                      <input type="text" name="advt_url" class="form-control" id="advt_url">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>advt Banner</label>
                      <input type="file" name="advt_banner" class="form-control" id="advt_banner">
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="blogs.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="advtAdd" value="SAVE" class="btn btn-success">
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
  function fetch_project(val) {
    $.ajax({
      type: "POST",
      url:"fetch_all_table.php",
      data:'builders_id='+val,
      success:function (data) {
        $("#project_name").html(data);
      }
    })
  }
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#myform").validate({
        rules:{
            advt_title:"required",
            advt_url:"required",
            advt_banner:"required"
        },
        messages:{
            advt_title:"Please Enter Advertise Title",
            advt_url:"Please Enter Advertise Url",
            advt_banner:"Please Upload Advertise Banner"
        }
    })
  })
</script>