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

            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Product'); ?>">Products</a>
            </li>
            <li class="breadcrumb-item active">Add New Products</li>
          </ol>
  <div class="container" style="padding-top: 10px;">
          <!-- Page Content -->
          <form method="post" name="createProducts" action="<?php echo base_url().'user/Product/create';?>">

            <div class="row">
            <div class="col-md-6">       


      <!-- <div class="col-xs-12 col-sm-12 col-md-12"> -->

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
                <?php echo form_error('name');?>

            </div>

            <div class="form-group">
          <strong>Category Name:</strong>
                    <select class="form-control" name="category" id="category" required>
                        <option value="">No Selected</option>
                        <?php foreach($category as $row):?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
 
                <div class="form-group">
                    <strong>Subcategory Name:</strong>
                    <select class="form-control" id="sub_category" name="sub_category" required>
                        <option value="">No Selected</option>
 
                    </select>
                </div>

        <!-- </div> -->

        <!-- <div class="col-xs-12 col-sm-12 col-md-12"> -->

            <div class="form-group">

                <strong>Status:</strong>
        <!-- <div class="col-md-4"> -->
          <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">InActive</option>
          </select>
        <!-- </div> -->

            </div>

        <!-- </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

                <a class="btn btn-primary" href="<?php echo base_url('user/Product');?>"> Back</a>

        </div>


    </div>

</form>
</div>
      <script type="text/javascript">
           jQuery(document).on('change', 'select#category', function (e) {
                e.preventDefault();
                var category = jQuery(this).val();
                getSubcatList(category);
            });
            
            function getSubcatList(category) {
            $.ajax({
                url: '<?php echo base_url('user/Product/getSubcategory'); ?>',
                type: 'post',
                data: {category: category},
                dataType: 'json',
                success: function (json) {
                    var options = '';
                    options +='<option value="">Select Sub Category</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].subcat_id + '">' + json[i].subcat_name + '</option>';
                    }
                    jQuery("select#sub_category").html(options);
         
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }   
                
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