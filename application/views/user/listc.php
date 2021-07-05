<!DOCTYPE html>
<html lang="en">

<head>
<title>Category</title>
<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>
<?php echo link_tag('assests/css/sb-admin.css'); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
            <li class="breadcrumb-item active">Category</li>
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


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div> -->

              <form method="get" action="Category/index">
                <div class="form-group">
                    <input type="text" name="searchKeyword" class="form-control" placeholder="Search by Category Name" value="<?php echo $this->input->get('searchKeyword'); ?>">
                    <div class="input-group-append">
                        <input type="submit" name="submitSearch" class="btn btn-primary submit" value="Search">
                        

                        <a href="<?php echo base_url(). "user/Category"; ?>" class="btn btn-primary">Refresh</a>
                    </div>
                </div>
            </form>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
          <th>Name</th>
          <th>Status</th>
          <th width="60">ADD</th>
          <th width="60">Edit</th>
          <th width="100">Delete</th>
        </tr>

        <?php if(!empty($categories)) { foreach($categories as $categories) { ?>
        <tr>
          <td><?php echo $categories['name']?></td>
          <td>
                           <?php 
                  if($categories['status']==1)
                  {
                    ?>

                    <div class="label label-success">
                      <strong>Active</strong>
                    </div>

                    <?php
                  }elseif ($categories['status']==0){
                    ?>

                    <div class="label label-danger">
                      <strong>InActive</strong>
                    </div>

                    <?php
                  }
                    ?>

          </td>
          <td>
            <a href="<?php echo base_url().'user/Category/create';?>" class="btn btn-primary">Add</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Category/edit/'.$categories['id']?>" class="btn btn-primary">Edit</a>
          </td>

          <td>
            <a href="<?php echo base_url().'user/Category/delete/'.$categories['id']?>" class="btn btn-danger remove">Delete</a>
          </td>

        </tr>
      <?php } } else { ?>

        <tr>
          <td colspan="5">Categories not Found</td>
        </tr>
      <?php } ?>

      </table>


      <p><?php echo $pagination; ?></p> 

    </div>
  </div>  
</div>

                    

<script>


    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this State ?'))

        {

            $.ajax({

               url: 'Category/delete/'+id,

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