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
            <h1 class="h3 mb-0 text-gray-800">Comments</h1>
            <!-- <a href="builder_add.php" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Builder</a> -->
          </div><hr>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Comments List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="allCommentsTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Project Name</th>
                      <th>Rating</th>
                      <th>Comment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    foreach ($commentsArray as $comments) {
                      ?>
                    <tr>
                      <td><?php echo $comments['comment_sender_name']; ?></td>
                      <td><?php echo $comments['project_name']; ?></td>
                      <td><?php echo $comments['ratings']; ?> Star</td>
                      <td><?php echo $comments['comment']; ?></td>
                      <td>
                        <a href="" style="color: blue;" class="approve" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-check"></i> Approve</span> 
                        </a> 
                        <span style="color: #000;border: 3px #000;padding: 1rem;">|</span>  
                        <a href="" style="color: red;" class="reject" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-ban" aria-hidden="true"></i> Reject</span>
                        </a>
                      </td>
                    </tr>
                    <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Approved Comments List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="approvedCommentsTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Project Name</th>
                      <th>Rating</th>
                      <th>Comment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    foreach ($approvedCommentsArray as $comments) {
                      ?>
                    <tr>
                      <td><?php echo $comments['comment_sender_name']; ?></td>
                      <td><?php echo $comments['project_name']; ?></td>
                      <td><?php echo $comments['ratings']; ?> Star</td>
                      <td><?php echo $comments['comment']; ?></td>
                      <td>
                        <!-- <a href="" style="color: blue;" class="approve" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-check"></i> Approve</span> 
                        </a> 
                        <span style="color: #000;border: 3px #000;padding: 1rem;">|</span> -->  
                        <a href="" style="color: red;" class="reject" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-ban" aria-hidden="true"></i> Reject</span>
                        </a>
                      </td>
                    </tr>
                    <?php }?>
                </table>
              </div>
            </div>            
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rejected Comments List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="rejectedCommentsTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Project Name</th>
                      <th>Rating</th>
                      <th>Comment</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <?php
                    foreach ($rejectedCommentsArray as $comments) {
                      ?>
                    <tr>
                      <td><?php echo $comments['comment_sender_name']; ?></td>
                      <td><?php echo $comments['project_name']; ?></td>
                      <td><?php echo $comments['ratings']; ?> Star</td>
                      <td><?php echo $comments['comment']; ?></td>
                      <td>
                        <a href="" style="color: blue;" class="approve" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-check"></i> Approve</span> 
                        </a> 
                        <!-- <span style="color: #000;border: 3px #000;padding: 1rem;">|</span>  
                        <a href="" style="color: red;" class="reject" id="<?php echo $comments['comment_id']?>">
                          <span><i class="fa fa-trash" aria-hidden="true"></i> Reject</span>
                        </a> -->
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
    $(document).on('click','.approve',function () {
      var commentsId=$(this).attr("id");
      $.ajax({
        url:"comment_update.php",
        method:"POST",
        data:{commentApprove_id:commentsId},
        success:function(data){
          alert('Comment Approved');
        }
      });
    });
    $(document).on('click','.reject',function () {
      if (confirm('Do you really want to reject Comment..?')) {
        var commentsId=$(this).attr("id");
        $.ajax({
          url:"comment_update.php",
          method:"POST",
          data:{commentReject_id:commentsId},
          success:function(data){
            alert('Comment Rejected');
          }
        });
      }
    });
    $(document).on('click','.delete',function () {
      if (confirm('Do you really want to permanently delete Comment..?')) {
        var commentsId=$(this).attr("id");
        $.ajax({
          url:"comment_update.php",
          method:"POST",
          data:{commentDelete_id:commentsId},
          success:function(data){
            alert('Comment Deleted');
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#allCommentsTable').DataTable();
  });
  $(document).ready(function() {
    $('#approvedCommentsTable').DataTable();
  });
  $(document).ready(function() {
    $('#rejectedCommentsTable').DataTable();
  });
</script>