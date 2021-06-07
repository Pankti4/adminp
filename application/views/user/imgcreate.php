<!DOCTYPE html>
<html lang="en">

<head>
<title>ProductImage</title>
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
              <a href="<?php echo site_url('user/Productimage'); ?>">ProductIamge</a>
            </li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
          <?php //echo APPPATH; ?>
  <div class="container" style="padding-top: 10px;">
    
           <!-- Page Content -->
          <form method="post" id="formid" name="createImg" action="<?php echo base_url().'user/Productimage/create/'.$pid.'';?>" enctype="multipart/form-data">

            <div class="row">

              
              
        <div class="col-md-6">

            <div class="form-group">

                <strong>Image Name:</strong>

                <input type="file" name="imagename[]" class="form-control" multiple>
                <?php echo form_error('imagename');?>

            </div>

        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <input type='submit' name='submit' value='upload'>

                <!-- <a class="btn btn-primary" href="<?php echo base_url('user/Productimage');?>"> Back</a> -->

        </div>

</form>
</div>
<?php  
 
if(!empty($product))
{
  $data = $product; $data = $data[0]; ?>  
<?php  ?>
 <div class="row">
    <div class="col-md-8">
      <table class="table table-striped">
        <tr>
          <th>Product Name</th>
          <th>Image Name</th>
          <!-- <th>Status</th> -->

          <!-- <th width="60">Edit</th> -->
          <th width="100">Delete</th>
        </tr>
        
        <?php 
          //echo '<pre>';print_r($product);
          if(!empty($product)) 
          { 
            foreach($product as $data1) 
            { 
        ?>
        
        <tr>
          <td><?php echo $data1->name; ?></td>
          <td><img src="<?php echo base_url('/uploads/files/'.$data1->imagename); ?>" alt="Image" width="50" height="50"></td>
          <td>
            <a href="<?php echo base_url().'user/Productimage/delete/'.$data1->id; ?>" class="btn btn-danger remove">Delete</a>
          </td>

        </tr>
      <?php } } else { ?>

        <tr>
          <td colspan="5">Productimage not Found</td>
        </tr>
      <?php } ?>

      </table>
    </div>
  </div> 
<?php } else { echo 'No Recoed Found';} ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  $(document).ready(function(){

    // $("#formid").validate({
    //     rules: {
    //         product: "required",
    //         imagename: "required",
    //         // contact_no: "required",
    //     },
    //     messages: {
    //         product: "Choose any product",
    //         imagename: "Upload Image first",
    //         // contact_no: "Please Enter Contact No",            
    //     }
    // });
 
            $('#products').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('productimage/get_product');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                        }
                        $('#products').html(html);
 
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