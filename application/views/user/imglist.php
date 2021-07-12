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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Product Image</li>
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
                  <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product Image Table</h3>
              </div>
              
              <!-- /.card-body -->
            </div>
            </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Image Table</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th style="width: 200px">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
              
        <?php  if(!empty($img)) { $data = $img; $data = $data[0]; ?>
        <?php  foreach($img as $img1) { ?>
        <tr>
          <td><?php echo $data->name; ?></td>
          <td><img src="<?php echo base_url('/uploads/files/'.$data->imagename); ?>" alt="Image" width="50" height="50"></td>
          <td>
            <a href="<?php echo base_url().'user/Productimage/delete/'.$data->id; ?>" class="btn btn-danger remove">Delete</a>
          </td>

        </tr>
      <?php } } else { ?>

        <tr>
          <td colspan="5">Productimage not Found</td>
        </tr>
      <?php } ?>
      <tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>

            </div>
            <!-- /.card -->
            </section>
            </div>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '/user/Category/delete/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("user/listc"+id).remove();
                  swal("Deleted!", "Your Data has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your Data is safe :)", "error");
        }
      });
     
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
