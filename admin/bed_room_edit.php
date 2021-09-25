<?php
include 'prevent.php';
include('insert_all_table.php');
$bedRoomId=$_GET['bed_rooms_id'];
$select_bedRooms=mysqli_query($db_connect,"SELECT * FROM bed_rooms WHERE bed_rooms_id='$bedRoomId'");
while ($row=mysqli_fetch_array($select_bedRooms)) {
  $bedroomName=$row['bed_rooms_name'];
  $bedroomUrl=$row['bed_rooms_url'];
  $bedroomDescription=$row['bed_rooms_description'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Bed Rooms</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Bed Room</label>
                      <input type="text" name="bed_rooms_name" class="form-control" id="bed_rooms_name" value="<?php echo $bedroomName;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Bed Room Url</label>
                      <input type="text" name="bed_rooms_url" class="form-control" id="bed_rooms_url" value="<?php echo $bedroomUrl?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="bed_rooms_description" name="bed_rooms_description" class="form-control" rows="4"><?php echo strip_tags($bedroomDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="types.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="bedRoomEdit" value="SAVE" class="btn btn-success">
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
        bed_rooms_name:"required",
        bed_rooms_url:"required",
        bed_rooms_description:"required"
      },
      messages:{
        bed_rooms_name:"<span>Please Enter Bed Room Name</span>",
        bed_rooms_url:"<span>Please Enter Bed Room Url</span>",
        bed_rooms_description:"Please Enter Bed Room Description"
      }
    })
  })
</script>
