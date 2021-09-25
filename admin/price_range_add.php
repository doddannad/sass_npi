<?php
include 'prevent.php';
include('insert_all_table.php');
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Price Range</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>Price Range</th>
                      <th>Add More</th>
                    </tr>
                    <tr><td><input type="text" name="price_range[]" class="form-control" placeholder="Enter price range"></td><td><button type="button" class="btn btn-info add"><i class="fa fa-plus"></i></button></td></tr>
                  </table>
                </div>
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="price_range.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="priceRangeAdd" value="SAVE" class="btn btn-success">
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
    $(".add").click(function () {
      $("#add_more_field").append('<tr><td><input type="text" name="price_range[]" class="form-control" placeholder="Price Range Name"></td><td><button type="button" class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td></tr>');
    })
    $("#add_more_field").on('click','.remove',function () {
      $(this).parent().parent().remove();
    })
  })
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#myform").validate({
        rules:{
            project_name:"required",
            "price_range[]":"required"
        },
        messages:{
            project_name:"Please Select Project",
            "price_range[]":"Please Enter Price Range"
        }
    })
  })
</script>