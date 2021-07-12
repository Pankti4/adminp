   <?php include APPPATH.'views/user/includes/header.php';?>
      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>General Form</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/City'); ?>">City</a>
            </li>
            <li class="breadcrumb-item active">Edit City</li>
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
                <h3 class="card-title">Edit City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <hr>
  <?php  $data = $cities->result(); $data = $data[0]; ?>
  <form method="post" name="editCities" action="<?php echo base_url().'user/City/edit/'.$data->id;?>">
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputName3" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-md-4">
                    <select id="country" class="form-control" name="country">
                        <option value="">Select Country</option>
                        <?php
                           if(!empty($country)){
                             
                               foreach($country as $row)
                               { 
                                   if($ct['country_id'] == $row->id){ $c = 'selected'; } else { $c = '';}
                                   echo '<option value="'.$row->id.'" '.$c.'>'.$row->name.'</option>';
                               }
                           }else{
                               echo '<option value="">Country not available</option>';
                           }
                           ?>
                     </select>
                     </div>
                     </div>

                <div class="form-group row">
                <label for="inputStatus3" class="col-sm-2 col-form-label">State Name</label>
                <div class="col-md-4">
                    <select class="form-control" id="state" name="state" required>
                        <option value="">No Selected</option>
 
                    </select>
                </div>
              </div>

              <div class="form-group row">
                     <label for="inputName3" class="col-sm-2 col-form-label">City Name</label>
                     <div class="col-md-4">
                    <input type="text" name="name" value="<?php echo set_value('name',$data->name);?>" class="form-control">
                           <?php echo form_error('name');?>
                  </div>
                </div>


              <div class="form-group row">
                    <label for="inputStatus3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-md-4">
                       <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                      </select> 
                    </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a class="btn btn-info float-right" href="<?php echo base_url().'user/City';?>"> Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>

        </section>
      </div>

<script type="text/javascript">
            $(document).ready(function(){
                /* Populate data to state dropdown */
                $('#country').on('change',function(){
                    var countryID = $(this).val();
                    if(countryID){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo base_url('user/City/getStates'); ?>',
                            data:'country_id='+countryID,
                            success:function(data){
                                $('#state').html('<option value="">Select State</option>'); 
                                var dataObj = jQuery.parseJSON(data);
                                if(dataObj){
                                    $(dataObj).each(function(){
                                        var option = $('<option />');
                                        option.attr('value', this.id).text(this.name);           
                                        $('#state').append(option);
                                    });
                                }else{
                                    $('#state').html('<option value="">State not available</option>');
                                }
                            }
                        }); 
                    }else{
                        $('#state').html('<option value="">Select country first</option>');
                        $('#city').html('<option value="">Select state first</option>'); 
                    }
                });
                
                /* Populate data to city dropdown */
                $('#state').on('change',function(){
                    var stateID = $(this).val();
                    if(stateID){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo base_url('user/dropdowns/getCities'); ?>',
                            data:'state_id='+stateID,
                            success:function(data){
                                $('#city').html('<option value="">Select City</option>'); 
                                var dataObj = jQuery.parseJSON(data);
                                if(dataObj){
                                    $(dataObj).each(function(){
                                        var option = $('<option />');
                                        option.attr('value', this.id).text(this.name);           
                                        $('#city').append(option);
                                    });
                                }else{
                                    $('#city').html('<option value="">City not available</option>');
                                }
                            }
                        }); 
                    }else{
                        $('#city').html('<option value="">Select state first</option>'); 
                    }
                });
            });
         </script>
















<script type="text/javascript">
           jQuery(document).on('change', 'select#country', function (e) {
                e.preventDefault();
                var country = jQuery(this).val();
                getStateList(country);
            });
            
            function getStateList(country) {
            $.ajax({
                url: '<?php echo base_url('user/City/getState'); ?>',
                type: 'post',
                data: {country: country},
                dataType: 'json',
                success: function (json) {
                    var options = '';
                    options +='<option value="">Select State</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].state_id + '">' + json[i].state_name + '</option>';
                    }
                    jQuery("select#state").html(options);
         
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