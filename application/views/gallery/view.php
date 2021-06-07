<!-- <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5><?php echo !empty($gallery['title'])?$gallery['title']:''; ?></h5>
			
            <?php if(!empty($gallery['images'])){ ?>
                <div class="gallery-img">
                <?php foreach($gallery['images'] as $imgRow){ ?>
                    <div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
                        <img src="<?php echo base_url('uploads/images/'.$imgRow['file_name']); ?>">
                        <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
        <a href="<?php echo base_url('user/manage_gallery'); ?>" class="btn btn-primary">Back to List</a>
    </div>
</div>
    <script>
function deleteImage(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "<?php echo base_url('user/manage_gallery/deleteImage'); ?>", {id:id}, function(resp) {
            if(resp == 'ok'){
                $('#imgb_'+id).remove();
                alert('The image has been removed from the gallery');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
    }
}
</script>