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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->


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


  <?php echo form_open("user/Product/searchUser" , ['class' => 'form-inline']); ?>
            <div class="form-group">

              <input type="text" class="form-control" id="searchuser" name="search" placeholder="Type a name">
            </div>
            <button type="submit" name="searchBtn" class="btn btn-primary submit">Search</button>
            <!-- <button class="btn btn-default more" href="<?php echo site_url('user/Product') ?>">Refresh</button> -->
        <?php echo form_close(); ?>
        <?php echo '<h3 style="color: #26324E;">'.$message.'</h3>';?>



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
        
        <?php 
          if(!empty($products)) 
          { 
            //echo '<pre>';print_r($products);
            foreach($products as $pr) 
            { 
               
           if($pr['status'] == 1) { $status = 'Active'; } else { $status = 'InActive';}
          ?>
        <tr>
          <td><?php echo $pr['catname'];?></td>
          <td><?php echo $pr['subcatname'];?></td>
          <td><?php echo $pr['name'];?></td>
          <td><strong><?php echo $status; ?></strong></td>

          <td>
            <a href="<?php echo base_url().'user/Productimage/create/'.$pr['id']?>" class="btn btn-primary">Image</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Product/edit/'.$pr['id']?>" class="btn btn-primary">Edit</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Product/delete/'.$pr['id']?>" class="btn btn-danger remove">Delete</a>
          </td>

        </tr>
      <?php } } else { ?>

        <tr>
          <td colspan="5">Products not Found</td>
        </tr>
      <?php } ?>

      </table>

      <!-- <div class="pagination">
      <?php echo $this->pagination->create_links(); ?> 
      </div> --> 
      
      <p><?php echo $links; ?></p> 

    </div>
  </div>  
</div>
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<script>
    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this PRoduct ?'))

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