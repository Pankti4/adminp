<!DOCTYPE html>
<html lang="en">

<head>
<title>States</title>
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

            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/State'); ?>">State</a>
            </li>
            <li class="breadcrumb-item active">Edit State</li>
          </ol>

          <!-- Page Content -->

<div class="container" style="padding-top: 10px;">
  
  <hr>
  <form method="post" name="editStates" action="<?php echo base_url().'user/State/edit/'.$states['id'];?>">

     <div class="row">
            <div class="col-md-6">       
              
              <div class="form-group">
                     <strong>Country Name:</strong>
                     <select id="country" class="form-control input-lg" name="country">
                        <option value="">Select Country</option>
                        <?php
                           if(!empty($country)){
                             
                               foreach($country as $row){ 
                                   echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                               }
                           }else{
                               echo '<option value="">Country not available</option>';
                           }
                           ?>
                     </select>
                  </div>
 
    
    <div class="col-md-6">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo set_value('name',$states['name']);?>" class="form-control">
        <?php echo form_error('name');?>
      </div>
    </div>

          <div class="col-xs-12 col-sm-12 col-md-12">

          <div class="form-group">

         <strong>Status:</strong>
        <div class="col-md-4">
          <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">InActive</option>
          </select>
        </div>

        </div>

        </div>

      <div class="form-group">
        <button class="btn btn-primary">Update</button>
        <a href="<?php echo base_url().'user/State';?>" class="btn-secondary btn">Cancel</a>
      </div>
    </div> 
  </div>
  </form>
</div>

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