<?php
include 'prevent.php';
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <b>Total Projects</b>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><strong><a href="" class="btn btn-info counter-count"><?php echo $totalProjects?></a></strong></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <b>Total Builders</b>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><strong><a href="" class="btn btn-primary counter-count"><?php echo $totalBuilders?></a></strong></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <b>Total Citys</b>
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <strong><a href="" class="btn btn-success counter-count">
                              <?php echo $totalCitys?>
                            </a></strong>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-archway fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Comments -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <b><a href="comments.php" >Comments</a></b>
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <strong><a href="comments.php" class="btn btn-warning counter-count">
                              <?php echo $countNoOfComment?>
                            </a></strong>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>

          <div class="row">
            <div class="col-md-12">
              <!-- Dash Board Tables -->

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Builders Wise</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Builders Name</th>
                          <th>Number of Projects</th>
                        </tr>
                      </thead>
                      <?php
                      foreach ($countBuilderWiseProjectsArray as $countBuildresProjects) {?>
                      <tr>
                        <td><?php echo $countBuildresProjects['builders_name'];?></td>
                        <td>
                          <a href="" class="btn btn-dark btn-md counter-count" style="border-radius: 50%;">
                            <?php echo $countBuildresProjects['buildersProjects'];?>               
                          </a>
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div>            
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">State Wise</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>State Name</th>
                          <th>Number of Projects</th>
                        </tr>
                      </thead>
                      <?php
                      foreach ($countStateWiseProjectsArray as $countStateProjects) {?>
                      <tr>
                        <td><?php echo $countStateProjects['state_name'];?></td>
                        <td>
                          <a href="" class="btn btn-dark btn-md counter-count" style="border-radius: 50%;">
                            <?php echo $countStateProjects['stateProjects'];?>               
                          </a>
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div>            
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">City Wise</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>City Name</th>
                          <th>Number of Projects</th>
                        </tr>
                      </thead>
                      <?php
                      foreach ($countCityWiseProjectsArray as $countCityProjects) {?>
                      <tr>
                        <td><?php echo $countCityProjects['city_name'];?></td>
                        <td>
                          <a href="" class="btn btn-dark btn-md counter-count" style="border-radius: 50%;">
                            <?php echo $countCityProjects['cityProjects'];?>               
                          </a>
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div>            
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Area List</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Area Name</th>
                          <th>Number of Projects</th>
                        </tr>
                      </thead>
                      <?php
                      foreach ($countAreaWiseProjectsArray as $countAreaProjects) {?>
                      <tr>
                        <td><?php echo $countAreaProjects['area_name'];?></td>
                        <td>
                          <a href="" class="btn btn-dark btn-md counter-count" style="border-radius: 50%;">
                            <?php echo $countAreaProjects['areaProjects'];?>               
                          </a>
                        </td>
                      </tr>
                      <?php }?>
                    </table>
                  </div>
                </div>            
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      include 'footer.php';
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  

  <?php
  include 'script_links.php';
  ?>

</body>

</html>

<script type="text/javascript">
  $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable1').DataTable();
  });
  $(document).ready(function() {
    $('#dataTable2').DataTable();
  });
  $(document).ready(function() {
    $('#dataTable3').DataTable();
  });
  $(document).ready(function() {
    $('#dataTable4').DataTable();
  });
  $(document).ready(function() {
    $('#dataTable5').DataTable();
  });
</script>
