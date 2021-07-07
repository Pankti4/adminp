<?php include APPPATH.'views/user/includes/header.php';?>

      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Category</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                  <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Category Table</h3>
              </div>
              <div class="card-body">
                  <form method="get" action="Category/index">
                  <div class="col-md-3">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by Category Name" value="<?php echo $this->input->get('searchKeyword'); ?>">
                  </div>
                  <div class="col-md-6">
                        <input type="submit" name="submitSearch" class="btn btn-primary submit " value="Search">
                        <a href="<?php echo base_url(). 'user/Category'; ?>" class="btn btn-primary ">Refresh</a>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Table</h3>
                
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>

                  


                    <tr>
                        <th style="width: 10px">Name</th>
                        <th>Status</th>
                        <th width="60">ADD</th>
                        <th width="60">Edit</th>
                       <th style="width: 40px">Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                        <?php if(!empty($categories)) { foreach($categories as $categories) { ?>
                        <tr>
                        <td><?php echo $categories['name']?></td>
                        <td>
                                       <?php 
                              if($categories['status']==1)
                              {
                                ?>

                                <div class="label label-success">
                                  <strong>Active</strong>
                                </div>

                                <?php
                              }elseif ($categories['status']==0){
                                ?>

                                <div class="label label-danger">
                                  <strong>InActive</strong>
                                </div>

                                <?php
                              }
                                ?>

                      </td>
                      <td>
                        <a href="<?php echo base_url().'user/Category/create';?>" class="btn btn-primary">Add</a>
                      </td>

                      <td>
                        <a href="<?php echo base_url().'user/Category/edit/'.$categories['id']?>" class="btn btn-primary">Edit</a>
                      </td>

                      <td>
                        <a href="<?php echo base_url().'user/Category/delete/'.$categories['id']?>" class="btn btn-danger remove">Delete</a>
                      </td>

                    </tr>
                        <?php } } else { ?>

                    <tr>
                      <td colspan="5">Categories not Found</td>
                    </tr>
                  <?php } ?>


                    <!-- <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        <ki/div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr> -->
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <!-- <ul class="pagination pagination-sm m-0 float-right"> -->
                  <p><?php echo $pagination; ?></p>
                <!-- </ul> -->
              </div>

            </div>
            <!-- /.card -->
            </section>
            </div>
<script>
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        if(confirm('Are you sure to remove this State ?'))
        {
            $.ajax({
               url: 'user/Category/delete/'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert(" removed successfully");  
               }
            });
        }
    });
</script>

<?php include APPPATH.'views/user/includes/footer.php';?>
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js '); ?>"></script>
</body>
</html>
