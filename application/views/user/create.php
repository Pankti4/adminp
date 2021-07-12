<?php include APPPATH.'views/user/includes/header.php';?>

      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>General Form</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Country'); ?>">Country</a>
            </li>
            <li class="breadcrumb-item active">Add Country</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
            <!-- /.card -->
            <!-- Horizontal Form -->
            <section class="content">
              <div class="container-fluid">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Country</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" name="createCountries" action="<?php echo base_url().'user/Country/create';?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-md-4">
                      <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
                <?php echo form_error('name');?>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputStatus3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-md-4">
                      <select id="status" class="form-control" name="status">
                        <option value="">Select status</option>
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                     </select>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a class="btn btn-info float-right" href="<?php echo base_url('user/Country');?>"> Back</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          </section>
      </div>


          <?php include APPPATH.'views/user/includes/footer.php';?>
  <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js '); ?>"></script>

  </body>

</html>