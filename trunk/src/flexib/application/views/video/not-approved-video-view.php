<h3>DANH SÁCH VIDEO CHƯA ĐƯỢC DUYỆT</h3>
<div class="video-list">
	<div>
		Số video chưa được duyệt : <?=$this->pagination->total_rows?>
	</div>
	<br />
<?php
	for ($i = 0; $i < count($notApprovedVideos); $i++) {
		$video = $notApprovedVideos[$i];
?>
	<div class="video_box">
		<a href="#"><?=$video->Name?></a>
		<img class="thumbnail_video" src="<?=base_url() . $video->ThumbnailPath?>" />
		<form action="<?=site_url(sprintf('video/approve/%d?%s=%s', $video->Id, SITE, ADMIN))?>" method="post">
		<?=form_open(sprintf('video/approve/%d?%s=%s', $video->Id, SITE, ADMIN))?>
			<button type="submit" class="ui-icon-approved" title="Duyệt video"></button>
			<input type="hidden" name="currentUrl" />
		<?=form_close()?>
	</div>
<?php 		
		if (($i + 1) % 3 == 0) {
?>
			<div class="clear"></div>			
<?php 			
		}
	} 
?>
	<div class="clear"></div>
	<?php
		if ($page_links != '') { 
	?>
		<div class="box_center page">
			<?=$page_links?>
		</div>
	<?php
		} 
	?>
</div>

<script type="text/javascript">
	$('.page a').click(function() {
		var url = $(this).attr('href');
		$('#not-approved-video').load(url);
		return false;
	});
	$('input[name=currentUrl]').val(location.href);
</script>