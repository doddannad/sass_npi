<?php
include 'prevent.php';
include 'insert_all_table.php';
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add City</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select State Name</label>
                      <select class="form-control" name="state_name" id="state_name">
                        <option value="">Select State</option>
                        <?php 
                        foreach ($stateArray as $stateList) {?>
                        <option value="<?php echo $stateList['state_id']?>"><?php echo $stateList['state_name']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>City Name</th>
                      <th>City Banner</th>
                      <th>About City</th>
                      <th>City Url</th>
                      <th>Add More</th>
                    </tr>
                    <tr><td><input type="text" name="city_name[]0" class="form-control city_name" placeholder="Enter City Name"></td><td><input type="file" name="city_banner[]0" class="form-control city_banner"></td><td><textarea class="form-control about_city" name="about_city[]0"></textarea></td><td><input type="text" name="city_url[]0" class="form-control city_url"></td><td><button class="btn btn-primary add" type="button"><i class="fa fa-plus"></i></button></td></tr>
                  </table>
                </div>

                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="cityAdd" value="SAVE" class="btn btn-success">
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
              state_name:"required"
          },
          messages:{
              state_name:"Please Select State"
          }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      var i = 1;
      function addMoreRows() {
        $("#add_more_field").append($('<tr><td><input type="text" name="city_name[]'+i+'" class="form-control city_name" placeholder="Enter City Name"></td><td><input type="file" name="city_banner[]'+i+'" class="form-control city_banner"></td><td><textarea class="form-control about_city" name="about_city[]'+i+'"></textarea></td><td><input type="text" name="city_url[]'+i+'" class="form-control city_url"></td><td><button class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td></tr>'));
        i++;
      }
      $(".add").on('click', addMoreRows);
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      });
      $('#myform').on('submit', function () {
        $('.city_name').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter City Name",
            }
          });
        });

        $('.city_banner').each(function () {
          $(this).rules("add", {
            required: true,
            extension: "webp",
            messages: {
              required: "Please Upload City Banner",
              extension: "Please Upload City Banner in .webp format",
            }
          });
        });
        $('.about_city').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter City Description",
            }
          });
        });
        $('.city_url').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter City Url"
            }
          });
        });
        if ($('#myform').valid()) {
          var city_banner = document.getElementsByClassName('city_banner');
          for (i = 0; i < city_banner.length; i++) {
            city_banner[i].setAttribute("name", "city_banner[]");
          }
          
        }
        else{
          return false;
        }
      });
    });

  </script>
</body>

</html>