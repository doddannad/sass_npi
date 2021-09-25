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
            <h1 class="h3 mb-0 text-gray-800">Builders</h1>
            <a href="builder_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Builder</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Builders List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Builders Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    foreach ($builders_list as $builders) {
                      ?>
                    <tr>
                      <td><?php echo $builders['builders_name']; ?></td>
                      <td>
                        <a href="builder_edit.php?builders_id=<?php echo $builders['builders_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                        | <button class="btn btn-danger sm delete_builder" type="button" id="builderId_<?php echo $builders['builders_id'];?>"><i class="fa fa-trash"></i></button>
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
  $('.delete_builder').click(function () {
    var builderId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "builderId="+builderId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>