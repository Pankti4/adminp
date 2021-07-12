<?php include APPPATH.'views/user/includes/header.php';?>

      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
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
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Productimage'); ?>">Product Image</a>
            </li>
            <li class="breadcrumb-item active">Add Product Image</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
            <!-- /.card -->
            <!-- Horizontal Form -->
            <section class="content">
              <div class="container-fluid">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add New Product Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form method="post" id="formid" name="createImg" action="<?php echo base_url().'user/Productimage/create/'.$pid.'';?>" enctype="multipart/form-data">

                <div class="card-body">
                  <table class="table table-bordered">
                    <label for="inputName3" class="col-sm-2 col-form-label">Image Name</label>
                    <div class="col-md-4">
                      <input type="file" name="imagename[]" class="form-control" multiple>
                     <?php echo form_error('imagename');?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputName3" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-md-4">
                     <input type='submit' name='submit' value='upload'>
                    </div>
                  </div>
                      
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



                <!-- /.card-body -->
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>

          </section>
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
 <?php include APPPATH.'views/user/includes/footer.php';?>