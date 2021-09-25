<?php
include 'prevent.php';
include('fetch_all_table.php');
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> New Units Configurations</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Unit Configurations
              </h6>
            </div>
            <div class="card-body">
              
              <div class="row">
            <div class="col-md-12">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builders</label>
                      <select class="form-control" name="builders_name" id="builders_name" onchange="fetchProject(this.value);">
                        <option value="">Select</option>
                        <?php 
                        foreach ($builders_list as $builders) {
                          ?>
                          <option value="<?php echo $builders['builders_id']; ?>">
                            <?php echo $builders['builders_name']; ?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                      <select class="form-control" name="project_name" id="project_name">
                        <option value="">Select</option>
                        <option value="">Please Select Builders First</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <span id="error"></span>
                    <table class="table table-bordered" id="add_more_field">
                      <tr>
                        <th>Bed Rooms</th>
                        <th>Super Builtup Area</th>
                        <th>Carpet Area</th>
                        <th>Floor Plan</th>
                        <th>
                          Add More Rows
                        </th>
                      </tr>
                      <tr>
                        <td>
                          <select name="units_type[]0" class="form-control units_type">
                            <option value="">Select Units Types</option>
                            <?php foreach ($bedRoomsArray as $bedRooms){?>
                              <option value="<?php echo $bedRooms['bed_rooms_id']; ?>"><?php echo $bedRooms['bed_rooms_name']; ?>
                            </option>
                            <?php }?>
                        </select>
                        </td>
                        <td>
                          <input type="text" name="super_builtup_area[]0" class="form-control super_builtup_area" placeholder="Enter Super Builtup Area">
                        </td>
                        <td>
                          <input type="text" name="carpet_area[]0" class="form-control carpet_area" placeholder="Enter Carpet Area">
                        </td>
                        <td><input type="file" name="floor_plan[]0" class="form-control floor_plan" placeholder="Floor Plans"></td>
                        <td style="text-align: center;">
                          <button class="btn btn-primary btn sm add" name="add" type="button">
                            <span class="fa fa-plus"></span>
                          </button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="units_config.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="unitConfigAdd" value="SAVE" class="btn btn-success">
                    </div>
                  </div>                
              </form>
            </div>
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
  <script type="text/javascript">

    $(document).ready(function () {
      
      $("#myform").validate({
        rules:{
          builders_name:"required",
          project_name:"required"
        },
        messages:{
          builders_name:"<span>Please Select Builders</span>",
          project_name:"Please Select Project"
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      var i = 1;
      function addMoreRows() {
        $("#add_more_field").append($('<tr><td><select name="units_type[]'+i+'" class="form-control units_type"><option value="">Select Units Types</option><?php foreach ($bedRoomsArray as $bedRooms){?><option value="<?php echo $bedRooms['bed_rooms_id']; ?>"><?php echo $bedRooms['bed_rooms_name']; ?></option><?php }?></select></td><td><input type="text" name="super_builtup_area[]'+i+'" class="form-control super_builtup_area" placeholder="Enter Super Builtup Area"></td><td><input type="text" name="carpet_area[]'+i+'" class="form-control carpet_area" placeholder="Enter Carpet Area"></td><td><input type="file" name="floor_plan[]'+i+'" class="form-control floor_plan" placeholder="Floor Plans"></td><td style="text-align: center;"><button class="btn btn-danger sm remove"><i class="fa fa-minus"></i></button></td></tr>'));
        i++;
      }
      
      $('#myform').on('submit', function() {
        $('.units_type').each(function() {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Select Bed Rooms",
            }
          })
        });
        $('.super_builtup_area').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter Super Builtup Area",
            }
          })
        })
        $('.carpet_area').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Enter Carpet Area",
            }
          })
        })
        $('.floor_plan').each(function () {
          $(this).rules("add", {
            required: true,
            extension: "webp",
            messages: {
              required: "Please Upload Floor Plan",
              extension: "Please Upload Floor Plan in .webp formate",
            }
          })
        })
        if ($("#myform").valid()) {
          var floor_plan = document.getElementsByClassName('floor_plan');
          for (i = 0; i < floor_plan.length; i++) {
            floor_plan[i].setAttribute("name", "floor_plan[]");
          }
        }
        else{
          return false;
        }
        $('#myform').validate().form();

      });
      $(".add").on('click', addMoreRows);
      
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      })
      
    })
  </script>

  <script type="text/javascript">
    function fetchProject(val) {
      $.ajax({
        type: "POST",
        url: "fetch_all_table.php",
        data: "builders_id="+val,
        success:function (data) {
          $("#project_name").html(data);
        }
      })
    }
  </script>
</body>

</html>
