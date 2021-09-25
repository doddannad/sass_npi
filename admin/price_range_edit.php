<?php
include 'prevent.php';
include('insert_all_table.php');
include 'fetch_all_table.php';
$price_range_id=$_GET['price_range_id'];
$selectPriceRange=mysqli_query($db_connect,"SELECT * FROM price_range WHERE price_range_id='$price_range_id'");
while ($row=mysqli_fetch_array($selectPriceRange)) {
  $rangeName=$row['price_range_name'];
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Price Range</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Price Range</label>
                      <input type="text" name="price_range" class="form-control" id="price_range" value="<?php echo $rangeName;?>">
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="price_range.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="priceRangeEdit" value="SAVE" class="btn btn-success">
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
            project_name:"required",
            price_range:"required"
        },
        messages:{
            project_name:"Please Select Project",
            price_range:"Please Enter Price Range"
        }
    })
  })
</script>
