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
            <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Product Table</h3>
              </div>
              <div class="card-body">

                  <form method="get" action="Product/index">
                  <div class="col-md-3">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by SubCategory Name" value="<?php echo $this->input->get('searchKeyword'); ?>">
                  </div>
                  <div class="col-md-6">
                        <input type="submit" name="submitSearch" class="btn btn-primary submit " value="Search">
                        <a href="<?php echo base_url(). 'user/Product'; ?>" class="btn btn-primary ">Refresh</a>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Table</h3>
                <div class="col-12 text-right">
          <a href="<?php echo base_url().'user/Product/create';?>" class="btn btn-primary">Add New Product</a>
        </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">

                <?php if ($this->session->flashdata('success')) { ?>
                  <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                    </div>


                  <?php } ?>

                <!---- Error Message ---->

                  <?php if ($this->session->flashdata('error')) { ?>
                      <p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>

                <?php } ?>


                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Subctaegory Name</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th width="60">Image</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($products)) { foreach($products as $pr) { ?>
                    <td><?php echo $pr['catname']?></td>
                    <td><?php echo $pr['subcatname']?></td>
                    <td><?php echo $pr['name'];?></td>
                    <td>
                      <?php 
                              if($pr['status']==1)
                              {
                                ?>

                                <div class="label label-success">
                                  <strong>Active</strong>
                                </div>

                                <?php
                               }
                                elseif ($pr['status']==0){
                                ?>

                                <div class="label label-danger">
                                  <strong>InActive</strong>
                                </div>

                                <?php
                                }
                                ?>
                    </td>
                    <td>
                    <a href="<?php echo base_url().'user/Productimage/create/'.$pr['id']?>" class="btn btn-primary">Image</a>
                    </td>
                      <td>
                        <a href="<?php echo base_url().'user/Product/edit/'.$pr['id']?>" class="btn btn-primary">Edit</a>
                        <a href="<?php echo base_url().'user/Product/delete/'.$pr['id']?>" class="btn btn-danger remove">Delete</a>
                      </td>
                    </tr>
                        <?php } } else { ?>

                    <tr>
                      <td colspan="5">Product not Found</td>
                    </tr>
                  <?php } ?>
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

 <script type="text/javascript">

    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        if(confirm('Are you sure to remove this Product ?'))
        {
          $.ajax({
               url: '/user/Product/'+id,
               type: 'DELETE',
               error: function() 
               {
                  alert('removed successfully');

               },

               success: function(data) 
               {
                    $("#"+id).remove();

                    alert(" removed successfully");  
               }

            });

        }

    });


</script>



<!-- <script type="text/javascript">
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
    
</script> -->


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
