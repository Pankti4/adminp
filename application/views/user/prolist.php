<!DOCTYPE html>
<html lang="en">

<head>
<title>Products</title>
<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>

  </head>

  <body id="page-top">

   <?php include APPPATH.'views/user/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Products</li>
          </ol>

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
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-6"></div>
        <div class="col-6 text-right">
          <a href="<?php echo base_url().'user/Product/create';?>" class="btn btn-primary">Add New Products</a>
        </div>
      </div>
      <hr>
    </div>
  </div>

  
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <tr>
          <th>Category Name</th>
          <th>SubCategory Name</th>

          <th>Name</th>
          <th>Status</th>

          <th width="60">Image</th>
          <th width="60">Edit</th>
          <th width="100">Delete</th>
        </tr>
        
        <?php if(!empty($products)) { foreach($products as $products) { 
          if($products->status == 1) { $status = 'Active'; } else { $status = 'InActive';}
          ?>
        <tr>
          <td><?php echo $products->catname;?></td>
          <td><?php echo $products->subcatname;?></td>
          <td><?php echo $products->name;?></td>
          <td><strong><?php echo $status; ?></strong></td>

          <td>
            <a href="<?php echo base_url().'user/Productimage/create/'.$products->id?>" class="btn btn-primary">Image</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Product/edit/'.$products->id?>" class="btn btn-primary">Edit</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Product/delete/'.$products->id?>" class="btn btn-danger remove">Delete</a>
          </td>

        </tr>
      <?php } } else { ?>

        <tr>
          <td colspan="5">Products not Found</td>
        </tr>
      <?php } ?>

      </table>

      <p><?php echo $links; ?></p>

    </div>
  </div>  
</div>
          
<script>
    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this State ?'))

        {

            $.ajax({

               url: 'Product/delete/'+id,

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

        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     <?php include APPPATH.'views/user/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

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