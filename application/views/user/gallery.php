<!DOCTYPE html>
<html lang="en">

<head>
<title>Add Products</title>
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
            <li class="breadcrumb-item active">Add Products</li>
          </ol>

          <!-- Page Content -->
          <h1>Add Products</h1>
          <hr>

<div class="container">
    <h2>Multiple Images Management</h2>
	
    <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="col-md-12 head">
            <h5><?php echo $title; ?></h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="<?php echo base_url('user/manage_gallery/add'); ?>" class="btn btn-success"><i class="plus"></i> New Gallery</a>
            </div>
        </div>
        
        <!-- Data list table --> 
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th width="5%">#</th>
                    <th width="10%"></th>
                    <th width="40%">Title</th>
                    <th width="19%">Created</th>
                    <th width="8%">Status</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($gallery)){ $i=0;  
                    foreach($gallery as $row){ $i++; 
                        $defaultImage = !empty($row['default_image'])?'<img src="'.base_url().'uploads/images/'.$row['default_image'].'" alt="" />':''; 
                        $statusLink = ($row['status'] == 1)?site_url('manage_gallery/block/'.$row['id']):site_url('manage_gallery/unblock/'.$row['id']);  
                        $statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active';  
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $defaultImage; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
                    <td>
                        <a href="<?php echo base_url('user/manage_gallery/view/'.$row['id']); ?>" class="btn btn-primary">view</a>
                        <a href="<?php echo base_url('user/manage_gallery/edit/'.$row['id']); ?>" class="btn btn-warning">edit</a>
                        <a href="<?php echo base_url('user/manage_gallery/delete/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="6">No gallery found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

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