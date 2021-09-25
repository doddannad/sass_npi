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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add Area</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select City Name</label>
                      <select class="form-control" name="city_name" id="city_name">
                        <option value="">Select City</option>
                        <?php 
                        foreach ($cityArray as $cityList) {?>
                        <option value="<?php echo $cityList['city_id']?>"><?php echo $cityList['city_name']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>Area Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>Area Banner</th>
                      <th>Add More</th>
                    </tr>
                    <tr><td><input type="text" name="area_name[]0" class="form-control area_name" placeholder="Enter Area Name"></td><td><input type="text" name="area_url[]0" class="form-control area_url" placeholder="Enter Area Url"></td><td><textarea placeholder="Description" name="area_description[]0" class="form-control area_description"></textarea></td><td><input type="file" name="area_banner[]0" class="form-control area_banner"></td><td><button class="btn btn-primary add" type="button"><i class="fa fa-plus"></i></button></td></tr>
                  </table>
                </div>

                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="areaAdd" value="SAVE" class="btn btn-success">
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
          city_name:"required"
        },
        messages:{
          city_name:"Please Select City"
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      var i = 1;
      function addMoreRows() {
        $("#add_more_field").append($('<tr><td><input type="text" name="area_name[]'+i+'" class="form-control area_name" placeholder="Enter Area Name"></td><td><input type="text" name="area_url[]'+i+'" class="form-control area_url" placeholder="Enter Area Url"></td><td><textarea placeholder="Description" name="area_description[]'+i+'" class="form-control area_description"></textarea></td><td><input type="file" name="area_banner[]'+i+'" class="form-control area_banner"></td><td><button class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td></tr>'));
        i++;
      }
      $(".add").on('click', addMoreRows);
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      });

      $('#myform').on('submit', function () {
        $('.area_name').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter Area Name",
            }
          });
        });
        $('.area_url').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter Area Url",
            }
          });
        });
        $('.area_description').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter Area Description",
            }
          });
        });
        $('.area_banner').each(function () {
          $(this).rules("add", {
            required: true,
            extension: "webp",
            messages: {
              required: "Please Upload Area Banner",
              extension: "Please Upload Area Banner in .webp format",
            }
          });
        });
        if ($("#myform").valid()) {
          var area_banner = document.getElementsByClassName('area_banner');
          for(i = 0; i < area_banner.length; i++){
            area_banner[i].setAttribute("name", "area_banner[]");
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