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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> Add State</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Country Name</label>
                      <select class="form-control" name="country_name" id="country_name">
                        <option value="">Select Country</option>
                        <?php 
                        foreach ($countryArray as $countryList) {?>
                        <option value="<?php echo $countryList['country_id']?>"><?php echo $countryList['country_name']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <table class="table table-bordered" id="add_more_field">
                    <tr>
                      <th>State Name</th>
                      <th>Url</th>
                      <th>Description</th>
                      <th>State Banner</th>
                      <th>Add More</th>
                    </tr>
                    <tr><td><input type="text" name="state_name[]0" class="form-control state_name" placeholder="Enter State Name"></td><td><input type="text" name="state_url[]0" class="form-control state_url" placeholder="Enter State Url"></td><td><textarea name="state_description[]0" class="form-control state_description"></textarea></td><td><input type="file" name="state_banner[]0" class="form-control state_banner"></td><td><button class="btn btn-primary add" type="button"><i class="fa fa-plus"></i></button></td></tr>
                  </table>

                </div>

                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="location_detail.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="stateAdd" value="SAVE" class="btn btn-success">
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
              country_name:"required"
          },
          messages:{
              country_name:"Please Select Country"
          }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      var i = 1;
      function addMoreRows() {
        $("#add_more_field").append($('<tr><td><input type="text" name="state_name[]'+i+'" class="form-control state_name" placeholder="Enter State Name"></td><td><input type="text" name="state_url[]'+i+'" class="form-control state_url" placeholder="Enter State Url"></td><td><textarea name="state_description[]'+i+'" class="form-control state_description"></textarea></td><td><input type="file" name="state_banner[]'+i+'" class="form-control state_banner"></td><td><button class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td></tr>'));
        i++;
      }

      $('#myform').on('submit', function () {
        $('.state_name').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter State Name",
            }
          });
        });
        $('.state_url').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter State Url",
            }
          });
        });
        $('.state_description').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter State Description"
            }

          });
        });
        $('.state_banner').each(function () {
          $(this).rules("add", {
            required: true,
            extension: "webp",
            messages: {
              required: "Please Upload State Banner",
              extension: "Please Upload State Banner in webp format",
            }
          });
        });
        if ($('#myform').valid()) {
          var state_banner = document.getElementsByClassName('state_banner');
          for (i = 0; i < state_banner.length; i++) {
            state_banner[i].setAttribute("name", "state_banner[]");
          }
          
        }
        else {
          return false;
        }
        $('#myform').validate().form();
      })
      $(".add").on('click', addMoreRows);
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      })
    })
  </script>

</body>

</html>
