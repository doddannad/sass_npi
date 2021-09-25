<?php
include 'prevent.php';
include 'db_config.php';
$fetchProjects = "SELECT * FROM project_detail ORDER BY project_id DESC";
$projectsArray = $db_connect->query($fetchProjects);

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
                        <h1 class="h3 mb-0 text-gray-800">Mobile Banners</h1>
                        <a href="compressor_mobile_banner.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-refresh fa-sm text-white-50"></i> Make Mobile Banners</a>
                    </div>
                    <hr>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Mobile Banners
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
                                    foreach ($projectsArray as $projects) {
                                        $projectsID = $projects['project_id'];
                                        $projectsName = $projects['project_name'];
                                        $mobileBanner = 'banner_image_uploads/banner_mobile/' . $projects['banner_image'];
                                        if (file_exists($mobileBanner)) {
                                            $mobileBanner = "Yes";
                                        } else {
                                            $mobileBanner = "No";
                                        }
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $projectsName ?></td>
                                            <td>
                                                <?php echo $mobileBanner ?>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
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