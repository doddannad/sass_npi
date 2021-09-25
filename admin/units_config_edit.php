<?php
include 'prevent.php';
include('fetch_all_table.php');
include 'insert_all_table.php';
$project_id=$_GET['project_id'];
$select_configuration=mysqli_query($db_connect,"SELECT * FROM unit_configuration AS uc WHERE uc.project_id='$project_id' ");
$unit_configurations = array();
while ($row=mysqli_fetch_array($select_configuration)) 
{
  $projectId=$row['project_id'];
  $unit_configurations[]=$row;
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Units Configurations</h1>
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
                        <?php 
                        foreach ($project_detail as $projects) {?>
                        <option value="<?php echo $projects['project_id'];?>"
                          <?php
                          if ($projects['project_id']==$projectId) {
                            echo "selected==selected";
                          }
                          ?>>
                          <?php echo $projects['project_name'];?>
                        </option>
                        <?php }?>
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
                        <th>Upload Floor Plan</th>
                        <th>Floor Plan</th>
                        <th>Delete</th>
                      </tr>
                      <?php
                      $i=0;
                      foreach ($unit_configurations as $unitConfigs) {?>
                        <tr>
                        <td>
                          <select name="units_type[]<?php echo $i ?>" class="form-control units_type">
                            <option value="">Select Bed Room</option>
                            <?php foreach ($bedRoomsArray as $bedRooms){?>
                              <option value="<?php echo $bedRooms['bed_rooms_id']; ?>"
                                <?php
                                if ($bedRooms['bed_rooms_id']==$unitConfigs['unit_types_id']) {
                                  echo "selected==selected";
                                }?>>
                                <?php echo $bedRooms['bed_rooms_name']; ?>
                            </option>
                            <?php }?>
                          </select>
                        </td>
                        <td>
                          <input type="text" name="super_builtup_area[]<?php echo $i ?>" class="form-control super_builtup_area" placeholder="Super Builtup Area" value="<?php echo $unitConfigs['super_builtup_area']?>">
                        </td>
                        <td>
                          <input type="text" name="carpet_area[]<?php echo $i ?>" class="form-control carpet_area" placeholder="Carpet Area" value="<?php echo $unitConfigs['carpet_area']?>">
                        </td>
                        <td>
                          <input type="file" name="floor_plan[]<?php echo $i ?>" class="form-control floor_plan">
                        </td>
                        <td>
                          <img src="files_uploads/<?php echo $unitConfigs['floor_plan'] ?>" width="50" height="50" alt="Floor Plan">
                        </td>
                        <td>
                          <button class="btn btn-danger sm delete_UnitConfig" type="button" id="unitConfigId_<?php echo $unitConfigs['unit_configuration_id']?>"><i class="fa fa-trash"></i></button></td>
                        <td style="display: none;">
                          <input type="text" name="unit_configuration_id[]" class="form-control" value="<?php echo $unitConfigs['unit_configuration_id']?>">
                        </td>
                      </tr>
                      <?php $i++;}?>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="units_config.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="unitConfigEdit" value="SAVE" class="btn btn-success">
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
      $('#myform').on('submit', function() {
        $('.units_type').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Select Bed Rooms",
            }
          })
        });
        $('.super_builtup_area').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Builtup Area",
            }
          })
        });
        $('.carpet_area').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Carpet Area",
            }
          })
        });
        $('.floor_plan').each(function() {
          $(this).rules("add", 
          {
            extension:"webp",
            messages: {
              extension: "Please Upload Floor Plan in .webp formate",
            }
          })
        });
      // prevent default submit action
      // event.preventDefault();
      // test if form is valid 
      // if($('#myform').validate().form()) {
      //   console.log("validates");
      // } else {
      //   console.log("does not validate");
      // }
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
    })
      // set handler for addInput button click
      $(".add").on('click', addMoreRows);
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      })
      
    })
  </script>
</body>

</html>
<script type="text/javascript">
  $(document).ready(function () {
    
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
  $('.delete_UnitConfig').click(function () {
    var unitConfigId = $(this).attr('id');
    var confirmDelete = confirm("Do you really want to delete..?");    
    
    if (confirmDelete == true) {
      $.ajax({
        type: "POST",
        url: "delete_process.php",
        data: "unitConfigId="+unitConfigId,
        success:function (data) {
          alert(data);
          location.reload();
        }
      })
    }
    else{}    
  })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#myform").validate({
      rules:{
        project_name:"required"
      },
      messages:{
        project_name:"Please Select Project"
      }
    })
  })
</script>