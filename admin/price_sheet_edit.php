<?php
include 'prevent.php';
include 'insert_all_table.php';
include 'fetch_all_table.php';
$project_id=$_GET['project_id'];
$selectPriceSheet=mysqli_query($db_connect,"
  SELECT pc.price_sheet_id,pc.project_id,pc.unit_types_id,pc.sqft,pc.price_amount
  FROM price_sheet AS pc
  WHERE pc.project_id='$project_id' ");
$priceSheet = array();
while ($row=mysqli_fetch_array($selectPriceSheet)) 
{
  $projectId=$row['project_id'];
  $priceSheet[]=$row;
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-marker"></i> Edit Price Sheet</h1>
          </div><hr>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Price Sheet
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
                        <th>Total Units</th>
                        <th>Sqft</th>
                        <th>Price</th>
                        <th>Delete</th>
                      </tr>
                      <?php 
                      $i=0;
                      foreach ($priceSheet as $price) {?>
                        <tr>
                          <td>
                            <select name="units_type[]<?php echo $i ?>" class="form-control units_type"> <option value="">Select Units Types</option>
                              <?php foreach ($bedRoomsArray as $bedRooms){?>
                                <option value="<?php echo $bedRooms['bed_rooms_id']; ?>"<?php if ($price['unit_types_id']==$bedRooms['bed_rooms_id']) {
                                  echo "selected=selected";
                                } ?>>
                                <?php echo $bedRooms['bed_rooms_name']; ?>
                                </option><?php }?>
                              </select>
                            </td>
                            <td><input type="text" name="sqft[]<?php echo $i ?>" value="<?php echo $price['sqft']; ?>" class="form-control sqft"></td>
                            <td><input type="text" name="price_amount[]<?php echo $i ?>" value="<?php echo $price['price_amount']; ?>" class="form-control price_amount"></td>
                            <td><button class="btn btn-danger sm delete_priceSheet" type="button" id="priceSheetId_<?php echo $price['price_sheet_id']?>"><i class="fa fa-trash"></i></button></td>
                            <td style="display: none;">
                              <input type="text" name="price_sheet_id[]" value="<?php echo $price['price_sheet_id']; ?>">
                            </td>
                          </tr>
                        <?php $i++; }?>
                  </table>
                  </div>
                </div><hr class="mb-4">

                  <div class="clearfix">
                    <div class="float-right">
                      <a href="price_sheet.php" class="btn btn-default">Cancel</a>
                      <input type="submit" name="priceSheetEdit" value="SAVE" class="btn btn-success">
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
    $('.delete_priceSheet').click(function () {
      var priceSheetId = $(this).attr('id');
      var confirmDelete = confirm("Do you really want to delete..?");    

      if (confirmDelete == true) {
        $.ajax({
          type: "POST",
          url: "delete_process.php",
          data: "priceSheetId="+priceSheetId,
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
    $(document).ready(function() {
      $('#myform').on('submit', function() {
        $('#project_name').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Select Project",
            }
          })
        });
        $('.units_type').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Select Bed Rooms",
            }
          })
        });
        $('.sqft').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Sqft",
            }
          })
        });
        $('.price_amount').each(function() {
          $(this).rules("add", 
          {
            required: true,
            messages: {
              required: "Please Enter Price Amount",
            }
          })
        });
        // prevent default submit action
        // event.preventDefault();
        // test if form is valid 
        if($('#myform').validate().form()) {
          console.log("validates");
        } else {
          console.log("does not validate");
        }
      })
      // set handler for addInput button click
      $(".add").on('click', addMoreRows);
      $("#add_more_field").on('click','.remove',function () {
        $(this).parent().parent().remove();
      })
      // initialize the validator
      $('#myform').validate();
    });
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
    });
  </script>
</body>

</html>


