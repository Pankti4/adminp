<!DOCTYPE html>
<html lang="en">

<head>
<title>Categories</title>
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
              <a href="<?php echo site_url('user/Dashboard'); ?>">User</a>
            </li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>

          <!-- Page Content -->
          <h1>Categories</h1>
          <hr>
 <div class="container box">
  <br />
  <!-- <h3 align="center">Codeigniter Dynamic Dependent Select Box using Ajax</h3> -->
  <div class="form-group">
   <select name="category" id="category" class="form-control input-lg">
    <option value="">Select Category</option>
    <?php
    foreach($category as $row)
    {
     echo '<option value="'.$row->category_id.'">'.$row->category_name.'</option>';
    }
    ?>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="subcategory" id="subcategory" class="form-control input-lg">
    <option value="">Select Subcategory</option>
   </select>
  </div>
  <br />

<form name="form" method="post" action="">
<a href="<?php echo site_url('user/user_profile'); ?>" class="btn btn-sm btn-danger pull-right">Add</a>
<a href="<?php echo site_url('user/dynamic_dependent'); ?>" class="btn btn-sm btn-danger pull-right">Cancel</a>
</form>

 </div>
</body>
</html>
<script>
$(document).ready(function(){
 $('#category').change(function(){
  var category_id = $('#category').val();
  if(category_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>user/dynamic_dependent/fetch_subcategory",
    method:"POST",
    data:{category_id:category_id},
    success:function(data)
    {
     $('#subcategory').html(data);
    }
   });
  }
  // else
  // {
  //  $('#subcategory').html('<option value="">Select Subcategory</option>');
  // }
 });
</script>

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