<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script>
function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('user/Posts/ajaxPaginationData/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').show();
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>

<!-- Search form -->
<div class="post-search-panel">
	<input type="text" id="keywords" placeholder="Type keywords to filter posts" onkeyup="searchFilter();"/>
	<select id="sortBy" onchange="searchFilter();">
		<option value="">Sort by Title</option>
		<option value="asc">Ascending</option>
		<option value="desc">Descending</option>
	</select>
</div>

<div class="post-list" id="dataList">
	<!-- Display posts list -->
	<?php if(!empty($posts)){ foreach($posts as $row){ ?>
		<div class="list-item"><a href="#"><?php echo $row["title"]; ?></a></div>
	<?php } }else{ ?>
		<p>Post(s) not found...</p>
	<?php } ?>
	
	<!-- Render pagination links -->
	<?php echo $this->ajax_pagination->create_links(); ?>
</div>

<!-- Loading Image -->
<div class="loading" style="display: none;">
	<div class="content"><img src="<?php echo base_url('assets/images/loading.gif'); ?>"/></div>
</div>