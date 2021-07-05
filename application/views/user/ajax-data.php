<!-- Display posts list -->
<?php if(!empty($posts)){ foreach($posts as $row){ ?>
	<div class="list-item"><a href="#"><?php echo $row["title"]; ?></a></div>
<?php } }else{ ?>
	<p>Post(s) not found...</p>
<?php } ?>

<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>