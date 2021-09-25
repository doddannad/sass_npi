<?php
include 'prevent.php';
include 'fetch_all_table.php';
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> New Maps</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Maps
              </h6>
            </div>
            <div class="card-body">
              
              <div class="row">
            <div class="col-md-12">
              <form action="" method="post" name="myform" id="myform"enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-12">
                    
                    <span id="error"></span>
                    <table class="table table-bordered" id="add_more_field">
                      <tr>
                        <th>Select Project</th>
                        <th>Lattitude</th>
                        <th>Langitude</th>
                        <th style="text-align: center;">
                          Add More
                        </th>
                      </tr>
                      <tr>
                        <td><select name="project_name[]0" class="form-control project_name"><option value="">Select</option><?php foreach ($project_detail as $project) {?><option value="<?php echo $project['project_id'] ?>"><?php echo $project['project_name'] ?></option><?php }?></select></td>
                        <td><input type="text" name="lat[]0" class="form-control lat" placeholder="Enter Lattitude"></td>
                        <td><input type="text" name="lng[]0" class="form-control lng" placeholder="Enter Langittude"></td>
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
                      <a href="maps.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="mapsAdd" value="SAVE" class="btn btn-success">
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
        $('#add_more_field').append($('<tr><td><select name="project_name[]'+i+'" class="form-control project_name"><option value="">Select</option><?php foreach ($project_detail as $project) {?><option value="<?php echo $project['project_id'] ?>"><?php echo $project['project_name'] ?></option><?php }?></select></td><td><input type="text" name="lat[]'+i+'" class="form-control lat" placeholder="Enter Lattitude"></td><td><input type="text" name="lng[]'+i+'" class="form-control lng" placeholder="Enter Langittude"></td><td style="text-align: center;"><button class="btn btn-danger sm remove"><i class="fa fa-minus"></i></button></td></tr>'));
        i++;
      }
      
      $('#myform').on('submit', function() {
        $('.project_name').each(function() {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Select Project",
            }
          })
        });
        $('.lat').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Lattitude",
            }
          })
        });
        $('.lng').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Langitude",
            }
          })
        });
        if ($("#myform").valid()) {
          
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
</body>

</html>
