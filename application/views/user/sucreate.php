<!DOCTYPE html>
<html lang="en">

<head>
<title>Subcategory</title>
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
              <a href="<?php echo site_url('user/Subcate'); ?>">Subcategory</a>
            </li>
            <li class="breadcrumb-item active">Add New Subcategory</li>
          </ol>
  <div class="container" style="padding-top: 10px;">
          <!-- Page Content -->
          <form method="post" name="createSubcategories" action="<?php echo base_url().'user/Subcate/create';?>">

            <div class="row">
            <div class="col-md-6">       
              
              <div class="form-group">
                     <strong>Category Name:</strong>
                     <select id="category" class="form-control input-lg" name="category">
                        <option value="">Select Category</option>
                        <?php
                           if(!empty($category)){
                             
                               foreach($category as $row){ 
                                   echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                               }
                           }else{
                               echo '<option value="">Category not available</option>';
                           }
                           ?>
                     </select>
                  </div>

        <div class="col-md-6">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
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

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

                <a class="btn btn-primary" href="<?php echo base_url('user/Subcate');?>"> Back</a>

        </div>


    </div>

</form>
</div>

<script>

  $(document).ready(function(){
 
            $('#categories').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('subcategory/get_categories');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].category_id+'>'+data[i].category_name+'</option>';
                        }
                        $('#categories').html(html);
 
                    }
                });
                return false;
            }); 
             
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