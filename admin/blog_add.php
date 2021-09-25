<?php
include 'prevent.php';
include 'fetch_all_table.php';
include 'insert_all_table.php';

// set default timezone
date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

$current_date = "$date/$month/$year $hour:$min:$sec";
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-pen"></i> Edit
             Blog</h1>
          </div><hr class="mb-4">
          <div class="row">
            <div class="col-md-12 col-lg">
              <form action="" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Builder</label>
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
                      <label>Select Project</label>
                      <select class="form-control" name="project_name" id="project_name">
                        <option value="">Select</option>
                        <?php
                        foreach ($project_detail as $project) {?>
                          <option value="<?php echo $project['project_id'] ?>">
                            <?php echo $project['project_name'] ?>
                          </option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Blog Title</label>
                      <input type="text" name="blog_title" class="form-control" id="blog_title">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Blog Url</label>
                      <input type="text" name="blog_url" class="form-control" id="blog_url">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Blog Banner</label>
                      <input type="file" name="blog_banner" class="form-control" id="blog_banner">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Your Name</label>
                      <input type="text" name="blog_writer" class="form-control" id="blog_writer">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Blog Content</label>
                      <textarea id="blog_content" name="blog_content" class="form-control"></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('blog_content');
                      </script>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Blog Meta Keyword</label>
                      <textarea id="blog_meta_key" name="blog_meta_key" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Blog Meta Discription</label>
                      <textarea id="blog_meta_desc" name="blog_meta_desc" class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <hr class="mb-4">
                
                <div class="clearfix">
                  <div class="float-right">
                    <a href="blogs.php" class="btn btn-default">Cancel</a>
                    <input type="submit" name="blogAdd" value="SAVE" class="btn btn-success">
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

<script type="text/javascript">
  $(document).ready(function () {
    $("#myform").validate({
        rules:{
            project_name:"required",
            blog_title:"required",
            blog_url:"required",
            blog_banner:"required",
            blog_writer:"required",
            blog_meta_key:"required",
            blog_meta_desc:"required"
        },
        messages:{
            project_name:"Please Select Project",
            blog_title:"Please Enter Title",
            blog_url:"Please Enter Url",
            blog_banner:"Please Upload Banner",
            blog_writer:"Please Enter Author Name",
            blog_meta_key:"Please Enter Meta Keyword",
            blog_meta_desc:"Please Enter Meta Description"
        }
    })
  })
</script>