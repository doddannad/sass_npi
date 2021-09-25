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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-search"></i> Search Properties</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select City</label>
                      <select class="form-control" id="city">
                        <option value="">--Select--</option>
                        <?php
                        foreach ($cityArray as $city) {
                          ?>
                          <option value="<?php echo $city['city_id']; ?>">
                            <?php echo $city['city_name']; ?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Enter Keywords</label>
                      <!-- <select class="form-control" id="project_name"></select> -->
                      <input type="text" name="searchKeyword" class="form-control" id="searchKeyword" placeholder="Ex: Projects Name, Builders, City, etc.">
                    </div>
                  </div>
                </div>
                
                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="dash_board.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="" value="Search" class="btn btn-success">
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
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</body>

</html>
<script type="text/javascript">
  $(document).ready(function () {
    $("#city").change(function () {
      $("#searchKeyword").autocomplete({
        minLength: 1,
        source: function (query, process) {
          var res=$("#city").val();
          $.ajax({
            url:'fetch_autofill.php',
            type:'GET',
            data:"src="+res + "&value=" + $("#searchKeyword").val(),
            dataType:'JSON',
            async:true,
            success:function (data) {
              process(data);
            }
          })
        }
    })
  })
</script>

