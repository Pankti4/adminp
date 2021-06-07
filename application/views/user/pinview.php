<!DOCTYPE html>
<html lang="en">

<head>
<title>Pincode</title>
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

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">User</a>
            </li>
            <li class="breadcrumb-item active">Pincode</li>
          </ol>

          <!-- Page Content -->
          <h1>Pincode</h1>
          <hr>
  <div class="container">
    
    <br><br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
      Add Record
    </button><br><br>


  <form id="createForm">
    <!-- Modal -->
    <div class="modal fade" id="createModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            
              <div class="form-group">
              <label>Pincode</label>
              <input type="text" class="form-control" placeholder="pincode" name="pincode">
           </div>
           <div class="form-group">
              <label>ls_cod</label>
              <input type="text" class="form-control" placeholder="ls_cod" name="ls_cod">
           </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
     </form>

    <table id="example1" class="display table">
        <thead>
            <tr>
                <th>Pincode</th>
                <th>ls_cod</th>
            </tr>
        </thead>

    </table>
  </div>


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <script type="text/javascript">
  
    //inserting data into database code start here

    $("#createForm").submit(function(event) {
      event.preventDefault();
      $.ajax({
              url: "<?php echo base_url('user/Pin/create'); ?>",
              data: $("#createForm").serialize(),
              type: "post",
              async: false,
              dataType: 'json',
              success: function(response){
                
                  $('#createModal').modal('hide');
                  $('#createForm')[0].reset();
                  alert('Successfully inserted');
                 $('#example1').DataTable().ajax.reload();
                },
             error: function()
             {
              alert("error");
             }
          });
    });

    //inserting data into database code end here


    //displaying data on page start here
    $(document).ready(function(){
      $('#example1').DataTable({
        "ajax" : "<?php echo base_url('user/Pin/fetchDatafromDatabase'); ?>",
        "order": [],
      });
    });
    //displaying data on page end here

  </script>
</body>
</html>