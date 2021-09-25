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
            <h1 class="h3 mb-0 text-gray-800">Proerty Types</h1>
            <a href="propertyTypes_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Property Types</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Proerty Types List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($propertyTypesArray as $propertyTypes) {$i++;?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $propertyTypes['property_types_name']?></td>
                    <td><?php echo $propertyTypes['property_types_url']?></td>
                    <td><?php echo $propertyTypes['property_types_description']?></td>
                    <td>
                      <a href="propertyTypes_edit.php?property_types_id=<?php echo $propertyTypes['property_types_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_propertyTypes" id="propertyTypesId_<?php echo $propertyTypes['property_types_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Property Status</h1>
            <a href="propertyStatus_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Property Status</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Property Status List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($propertyStatusArray as $propertyStatus) {$i++;?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $propertyStatus['property_status_name']?></td>
                    <td><?php echo $propertyStatus['property_status_url']?></td>
                    <td><?php echo $propertyStatus['property_status_description']?></td>
                    <td>
                      <a href="propertyStatus_edit.php?property_status_id=<?php echo $propertyStatus['property_status_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_propertyStatus" id="propertyStatusId_<?php echo $propertyStatus['property_status_id']?>"><span><i class="fa fa-trash"></i></span></a>
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
  $(document).ready(function () {
    $("#dataTable1").DataTable();
  })
</script>
<script type="text/javascript">
  $('.delete_propertyTypes').click(function () {
    var propertyTypeId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "propertyTypeId="+propertyTypeId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_propertyStatus').click(function () {
    var propertyStatusId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "propertyStatusId="+propertyStatusId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>