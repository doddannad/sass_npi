<?php
include 'prevent.php';
include 'fetch_all_table.php';
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
            <h1 class="h3 mb-0 text-gray-800">Bed Rooms</h1>
            <a href="bed_room_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Bed Rooms</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Bed Rooms List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>BHK Name</th>
                      <th>BHK URL</th>
                      <th>BHK DESCRIPTION</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0; 
                  foreach ($bedRoomsArray as $bedRooms)
                  {
                    $i++;
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $bedRooms['bed_rooms_name'];?></td>
                    <td><?php echo $bedRooms['bed_rooms_url'];?></td>
                    <td><?php echo $bedRooms['bed_rooms_description'];?></td>
                    <td>
                      <a href="bed_room_edit.php?bed_rooms_id=<?php echo $bedRooms['bed_rooms_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_bedRooms" id="bedRoomsId_<?php echo $bedRooms['bed_rooms_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Unit Types</h1>
            <a href="units_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Units Types</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Unit Types List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="unitTypedataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Units Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php 
                  foreach ($unitTypesArray as $unitTypes)
                  {?>
                  <tr>
                    <td><?php echo $unitTypes['unti_types_name'];?></td>
                    <td>
                      <a href="units_edit.php?units_id=<?php echo $unitTypes['unit_types_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | <a href="#" class="delete_unitTypes" id="unitTypesId_<?php echo $unitTypes['unit_types_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">File Types</h1>
            <a href="fileTypes_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New File Types</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                File Types List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Files Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php 
                  foreach ($fileTypesArray as $fileTypes)
                  {?>
                  <tr>
                    <td><?php echo $fileTypes['file_name'];?></td>
                    <td>
                      <a href="fileTypes_edit.php?file_id=<?php echo $fileTypes['file_id']?>"><span><i class="fa fa-edit"></i></.span> Edit</a>
                      | <a href="#" class="delete_fileTypes" id="fileTypesId_<?php echo $fileTypes['file_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
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
  $(document).ready(function() {
    $('#dataTable1').DataTable();
    $('#unitTypedataTable').DataTable();
  });
</script>

<script type="text/javascript">
  $('.delete_bedRooms').click(function () {
    var bedRoomsId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "bedRoomsId="+bedRoomsId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_unitTypes').click(function () {
    var unitTypeId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "unitTypeId="+unitTypeId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_fileTypes').click(function () {
    var fileTypeId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "fileTypeId="+fileTypeId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>