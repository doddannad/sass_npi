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
            <h1 class="h3 mb-0 text-gray-800">Projects Price</h1>
            <a href="projects_price_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Projects Price</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Projects Price
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl.No</th>
                      <th>Project Name</th>
                      <th>Price Range</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($projectsPriceRangeArray as $projectsPriceRange)
                  {$i++;?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $projectsPriceRange['project_name']?></td>
                    <td><?php echo $projectsPriceRange['price_range_name']?></td>
                    <td>
                      <a href="projects_price_edit.php?project_id=<?php echo $projectsPriceRange['project_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Price Ranges</h1>
            <a href="price_range_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Price Ranges</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Price Ranges
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl.No</th>
                      <th>Project Range</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($priceRangeArray as $priceRange)
                  {$i++;?>
                  <tr>
                    <td><?php echo $i ?>
                    <td><?php echo $priceRange['price_range_name']?></td>
                    <td>
                      <a href="price_range_edit.php?price_range_id=<?php echo $priceRange['price_range_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_priceRange" id="priceRangeId_<?php echo $priceRange['price_range_id']?>"><span><i class="fa fa-trash"></i></span></a>
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
  $('.delete_priceRange').click(function () {
    var priceRangeId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "priceRangeId="+priceRangeId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>