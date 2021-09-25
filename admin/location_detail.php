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
            <h1 class="h3 mb-0 text-gray-800">Country List</h1>
            <a href="country_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Country</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Country List
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Country Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($countryArray as $country)
                  {$i++;?>
                  <tr>
                    <th><?php echo $i ?></th>
                    <td><?php echo $country['country_name']?></td>
                    <td><?php echo $country['country_url'] ?></td>
                    <td><?php echo substr( $country['country_description'], 0, 100) ?></td>
                    <td>
                      <a href="country_edit.php?country_id=<?php echo $country['country_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_country" id="countryId_<?php echo $country['country_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">State List</h1>
            <a href="state_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New State</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                State
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="stateDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>State Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($stateArray as $stateList)
                  {
                  $i++;
                  if (!empty($stateList['state_description'])) {
                    $stateDescription = "DONE";
                  }
                  else if (empty($stateList['state_description'])){
                    $stateDescription = "NA";
                  }
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $stateList['state_name']?></td>
                    <td><?php echo $stateList['state_url'] ?></td>
                    <td><?php echo $stateDescription ?>
                    </td>
                    <td>
                      <a href="state_edit.php?state_id=<?php echo $stateList['state_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_state" id="stateId_<?php echo $stateList['state_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">City List</h1>
            <a href="city_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New City</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                City
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="cityDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>City Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($cityArray as $cityList)
                  {
                  $i++;
                  if (!empty($cityList['city_description'])) {
                    $cityDescription = "DONE";
                  }
                  else if (empty($cityList['city_description'])){
                    $cityDescription = "NA";
                  }
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $cityList['city_name']?></td>
                    <td><?php echo $cityList['city_url'] ?></td>
                    <td><?php echo $cityDescription  ?></td>
                    <td>
                      <a href="city_edit.php?city=<?php echo $cityList['city_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_city" id="cityId_<?php echo $cityList['city_id']?>"><span><i class="fa fa-trash"></i></span></a>
                    </td>
                  </tr>
                  <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Area List</h1>
            <a href="area_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Area</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Area
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="areaDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Area Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i=0;
                  foreach ($areaArray as $areaList)
                  {
                    $i++;
                    if (!empty($areaList['area_description'])) {
                      $areaDescription = "DONE";
                    }
                    else if (empty($areaList['area_description'])){
                      $areaDescription = "NA";
                    }
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $areaList['area_name']?></td>
                    <td><?php echo $areaList['area_url']?></td>
                    <td><?php echo $areaDescription ?></td>
                    <td>
                      <a href="area_edit.php?area=<?php echo $areaList['area_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      | 
                      <a href="#" class="delete_area" id="areaId_<?php echo $areaList['area_id']?>"><span><i class="fa fa-trash"></i></span></a>
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
    $("#stateDataTable").DataTable();
    $("#cityDataTable").DataTable();
    $("#areaDataTable").DataTable();
  })
</script>
<script type="text/javascript">
  $('.delete_country').click(function () {
    var countryId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "countryId="+countryId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_state').click(function () {
    var stateId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "stateId="+stateId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_city').click(function () {
    var cityId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "cityId="+cityId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })

  $('.delete_area').click(function () {
    var areaId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "areaId="+areaId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>