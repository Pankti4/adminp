   <?php include APPPATH.'views/user/includes/header.php';?>
      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <div id="content-wrapper">
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
            <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
        </div>

    </div>

</div>


<div class="container" style="padding-top: 10px;"> 
  <div class="row">
    <div class="col-md-12">
      <?php
      $success = $this->session->userdata('success');
      if($success != "")
      {
      ?>
      <div class="alert alert-success"><?php echo $success;?></div>
      <?php 
      }
      ?>

      <?php
      $failure = $this->session->userdata('failure');
      if($failure != "")
      {
      ?>
      <div class="alert alert-danger"><?php echo $failure;?></div>
      <?php 
      }
      ?>
    </div>
  </div>


<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product Table</h3>
              </div>
          <?php
                // if (isset($error)){
                //     echo $error;
                // }
            ?>
            
          <!-- <a href="<?php echo base_url().'user/Productimage/create';?>" class="btn btn-primary">Add New ProductImage</a> -->
        </div>
      </div>
      <hr>
    </div>
  </div>  
  </section>   

  <div class="col-md-12">
  <div class="card">
   <div class="card-header">
    <h3 class="card-title">Product Table</h3>
      <div class="col-12 text-right">
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Image Name</th>
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
      </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
        </div>
            <!-- /.card -->
          </div>
            </section>
            </div>
<script>


    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this State ?'))

        {

            $.ajax({

               url: 'Productimage/delete/'+id,

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