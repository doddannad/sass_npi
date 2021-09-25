<?php
include 'prevent.php';
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
            <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
            <div>
              <a href="advt_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Advertise</a>
              <a href="blog_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Blog</a>
            </div>
          </div><hr>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Blog List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Blog Title</th>
                      <th>Blog Meta Keyword</th>
                      <th>Blog Meta Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    foreach ($blogArray as $blogs) {
                      if (!empty($blogs['blog_meta_key'] AND $blogs['blog_meta_desc'])) {
                        $blogKey = substr($blogs['blog_meta_key'], 0, 50).'...';
                        $blogDesc = substr($blogs['blog_meta_desc'], 0, 50).'...';
                      }
                      else if (empty($blogs['blog_meta_key'] AND $blogs['blog_meta_desc'])){
                        $blogKey = '';
                        $blogDesc = '';
                      }
                    ?>
                    <tr>
                      <td><?php echo $blogs['project_name']; ?></td>
                      <td><?php echo $blogs['blog_title']; ?></td>
                      <td><?php echo $blogKey ?></td>
                      <td><?php echo $blogDesc ?></td>
                      <td>
                        <a href="blog_edit.php?blog_id=<?php echo $blogs['blog_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      </td>
                    </tr>
                    <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Advertisements List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="advtDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Advt Title</th>
                      <th>Advt Url</th>
                      <th>Advt Banner</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    $i=0;
                    foreach ($advtArray as $advt) {
                      $i++;
                      $advtBanner="advt_banners/".$advt['advt_banner'];
                      ?>
                    <tr>
                      <th><?php echo $i ?></th>
                      <td><?php echo $advt['advt_title']; ?></td>
                      <td><?php echo $advt['advt_url']; ?></td>
                      <td><img src="<?php echo $advtBanner ?>" style="width: 50px;height: 50px;"></td>
                      <td>
                        <a href="advt_edit.php?advt_id=<?php echo $advt['advt_id']?>"><span><i class="fa fa-edit"></i></span> Edit</a>
                      </td>
                    </tr>
                    <?php }?>
                </table>
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

</body>

</html>
<script type="text/javascript">
  $(document).ready(function () {
    $("#advtDataTable").DataTable();
  })
</script>