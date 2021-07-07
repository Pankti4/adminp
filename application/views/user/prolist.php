
   <?php include APPPATH.'views/user/includes/header.php';?>

  

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

          <form method="get" action="Product/index">
                <div class="form-group">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by Product Name" value="<?php echo $this->input->get('searchKeyword'); ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-primary submit" value="Search">
                        

                        <a href="<?php echo base_url(). "index.php/user/Product"; ?>" class="btn btn-primary">Refresh</a>


                    </div>
                </div>
            </form>


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
      <table class="table" id="datatable">
                    <thead>
      <!-- <table class="table table-striped"> -->
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
                            </thead>
                      <tbody>
                      </tbody>

      </table>

      
      <p><?php echo $pagination; ?></p> 

    </div>
  </div>  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Product/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>



<script>
    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this Product ?'))

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
