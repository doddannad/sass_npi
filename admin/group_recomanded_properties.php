<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';
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
            <h1 class="h3 mb-0 text-gray-800">Group to Recomonded Projects</h1>
            <div>
              <a href="recomanded__recent_properties.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">RECOMONDED PROJECT</a>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Projects List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="" method="POST">
                	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                  <thead>
	                    <tr>
	                      <th>Project Name</th>
	                      <th>Location</th>
	                      <th>Unit Types</th>
	                      <th>Price Onwrds</th>
	                      <th>Property Type</th>
	                      <th>SELECT</th>
	                    </tr>
	                  </thead>
	                  <?php foreach ($project_detail as $projects) {?>
	                    <tr>
	                      <td><?php echo $projects['project_name'];?></td>
	                      <td><?php echo $projects['project_location'];?></td>
	                      <td><?php echo $projects['unti_types_name'];?></td>
	                      <td><?php echo $projects['price'];?></td>
	                      <td><?php echo $projects['property_types_name'];?></td>
	                      <td>
	                      	<input type="checkbox" class="form-control" id="" name="recomondsProjects[]" value="<?php echo $projects['project_id'] ?>">
	                      </td>
	                    </tr> 
	                  <?php }?>                 
	                </table>
	                <hr>
	                <div class="clearfix">
	                	<div class="float-right">
	                		<button class="btn btn-primary" name="saveRecomonded">SAVE</button>
	                	</div>
	                </div>
	                <hr>
                </form>
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
    $('#recentProjectDataTable').DataTable();
  });
</script>