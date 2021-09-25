<?php
include 'prevent.php';
include 'db_config.php';
$fetchThumbnails = mysqli_query($db_connect, "SELECT * FROM thumbnails AS tbn, project_detail AS pd WHERE tbn.project_id=pd.project_id ORDER BY tbn.project_id DESC ");
$thumbnailsArray = array();
while ($row = mysqli_fetch_array($fetchThumbnails)) {
  $thumbnailsArray[] = $row;
}

$bytes = '';
function getFileSize($bytes)
{
  if ($bytes >= 1073741824)
  {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }
  elseif ($bytes >= 1048576)
  {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  }
  elseif ($bytes >= 1024)
  {
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  }
  elseif ($bytes > 1)
  {
    $bytes = $bytes . ' bytes';
  }
  elseif ($bytes == 1)
  {
    $bytes = $bytes . ' byte';
  }
  else
  {
    $bytes = '0 bytes';
  }

  return $bytes;
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
            <h1 class="h3 mb-0 text-gray-800">Thumbnails</h1>
            <a href="compressor.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Resize Image</a>
          </div><hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                Thumbnails
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Project</th>
                      <th>Thubnail</th>
                    </tr>
                  </thead>
                  <?php
                  $i = 0;
                  foreach ($thumbnailsArray as $thumbnails) {
                    $i++;
                    $thumbnailsUrl = "thumbnails/".$thumbnails['thumbnails_img'];
                    $bytes = filesize($thumbnailsUrl);
                    $filesize = getFileSize($bytes);
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $thumbnails['project_name'] ?></td>
                    <td>
                      <img src="<?php echo $thumbnailsUrl ?>"> <??>
                      <p><?php echo $filesize ?></p>
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
