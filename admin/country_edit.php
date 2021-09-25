<?php
include 'prevent.php';
include 'insert_all_table.php';
$countryId=$_GET['country_id'];
$select_country=mysqli_query($db_connect,"SELECT * FROM country WHERE country_id='$countryId'");
while ($row=mysqli_fetch_array($select_country)) {
  $countryName=$row['country_name'];
  $countryUrl=$row['country_url'];
  $countryDescription=$row['country_description'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Country</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Country Name</label>
                      <input type="text" name="country_name" class="form-control" id="country_name" value="<?php echo $countryName;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Country Url</label>
                      <input type="text" name="country_url" class="form-control" id="country_url" value="<?php echo $countryUrl ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="country_description" name="country_description" class="form-control" rows="4"><?php echo strip_tags($countryDescription) ?></textarea>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="countryEdit" value="SAVE" class="btn btn-success">
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
  <script type="text/javascript">
    $(document).ready(function () {
      $("#myform").validate({
          rules:{
              country_name:"required",
              country_url:"required",
              country_description:"required",
          },
          messages:{
              country_name:"Please Enter Country Name",
              country_url:"Please Enter Country Url",
              country_description:"Please Enter Country Description",
          }
      })
    })
  </script>
</body>

</html>