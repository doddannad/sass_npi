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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-plus"></i> New Files Uploads</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                File Details
              </h6>
            </div>
            <div class="card-body">
              
              <div class="row">
            <div class="col-md-12">
              <form action="" method="post" name="myform" id="myform" onsubmit="return validateform()" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Builders</label>
                      <select class="form-control" name="builders_name" onchange="fetch_project(this.value);">
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
                        foreach ($projects as $project) {?>
                          <option value="<?php echo $project['project_id'] ?>">
                            <?php echo $project['project_name'] ?>
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
                        <th>Choose Types</th>
                        <th>Choose Files</th>
                        <th>
                          Add More Rows
                        </th>
                      </tr>
                      <tr>
                        <td><select name="file_types[]0" class="form-control file_types"><option value="">Select File Types</option><?php foreach ($fileTypesArray as $files_types){?><option value="<?php echo $files_types['file_id']?>"><?php echo $files_types['file_name']?></option><?php }?></select></td>
                        <td><input type="file" name="uploadfiles[]0" class="form-control uploadfiles"></td>
                        <td><button class="btn btn-primary btn sm add" name="add" type="button">
                          <span class="fa fa-plus"></span>
                        </button></td>
                      </tr>
                    </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="uploads.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="imagesAdd" value="SAVE" class="btn btn-success">
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
    $(document).ready(function () 
    {
      var i = 1;
      function addMoreRows() {
        var html='';
        html +='<tr>';
        html +='<td><select name="file_types[]'+i+'" class="form-control file_types"><option value="">Select File Types</option><?php foreach ($fileTypesArray as $files_types){?><option value="<?php echo $files_types['file_id']?>"><?php echo $files_types['file_name']?></option><?php }?></select></td>';
        html +='<td><input type="file" name="uploadfiles[]'+i+'" class="form-control uploadfiles"></td>';
        html +='<td><button class="btn btn-danger remove" name="remove"><span class="fa fa-minus"></span></button></td></tr>';

        $("#add_more_field").append(html);
        i++;
      }
      $('#myform').on('submit', function () {
        $('.file_types').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Select File Type",
            }
          });
        });
        $('.uploadfiles').each(function () {
          $(this).rules("add", {
            required: true,
            messages: {
              required: "Please Upload File",
            }
          });
        });
        if ($('#myform').valid()) {
          var uploadfiles = document.getElementsByClassName('uploadfiles');
          for (i = 0; i < uploadfiles.length; i++) {
            uploadfiles[i].setAttribute("name", "uploadfiles[]");
          }
        }
        else{
          return false;
        }
      });
      $('.add').on('click',addMoreRows)
      // Remove
      $(document).on('click','.remove',function () {
        $(this).closest('tr').remove();
      })
    })
  </script>
  <script type="text/javascript">
    function fetch_project(val) {
      $.ajax({
        type: "POST",
        url:"fetch_all_table.php",
        data:'builders_id='+val,
        success:function (data) {
          $("#project_name").html(data);
        }
      })
    }
  </script>

</body>

</html>