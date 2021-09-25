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
            <h1 class="h3 mb-0 text-gray-800">Recomonded Projects</h1>
            <div>
              <button class="btn btn-danger clearRecommonded">CLEAR PROJECT </button>
              <a href="group_recomanded_properties.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">ADD TO RECOMMONDED PROJECT</a>
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
	                    </tr>
	                  </thead>
	                  <?php foreach ($recommondedArray as $recommonded) {
                      foreach ($projectsArray as $projects) {
                        if ($recommonded['project_id']==$projects['project_id']) {
                          $recommondedProjects = $projects['project_name'];
                        }
                      }
                      ?>
	                    <tr>
	                      <td><?php echo $recommondedProjects ?></td>
	                    </tr> 
	                  <?php }?>                 
	                </table>
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
    $(document).on('click', '.clearRecommonded', function () {
      cnfrm = confirm("Do You Really Want to Clear Recommonded Projects ?");
      if (cnfrm==true) {
        window.location.href = "recommonded_delete.php";
      }
      else{
        
      }
    })
  });
</script>
