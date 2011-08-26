<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>::FLEXIB_LEARNING::</title>

<link rel="stylesheet" href="<?=base_url()?>css/base/jquery.ui.all.css">
<link rel="stylesheet" href="<?=base_url()?>css/admin.css">

<script src="<?=base_url()?>js/jquery-1.5.1.js"></script>

<script src="<?=base_url()?>js/ui/jquery-ui-1.8.14.custom.js"></script>
<script>
	$(document).ready(function(){
		var urls = [
		    		'<?=site_url('admin')?>',
		    		'<?=site_url('account/admin')?>',
		    		'<?=site_url('banner/admin')?>',
		    		'<?=site_url('partner/admin')?>',
		    		'<?=site_url('videoCategory/admin')?>',
		    		'<?=site_url('video/admin')?>',
		    		'<?=site_url('question/admin')?>',
		    		'<?=site_url('videoNotification/admin')?>',
		    		'<?=site_url('videoDocument/admin')?>',
		    		'<?=site_url('videoSurvey/admin')?>'
		    		]
		$("#tabs").tabs({
			select: function(event, ui) {
				url = urls[ui.index];
				location.href = url;
			},
			selected : <?=$tab?>
		});
	});
	</script>
</head>
<body>
	<h2>ADMIN FLEXIBLEARNING</h2>
	<div id="admin">
		<div id="tabs">
			<ul>
				<li><a href="#dashboard">Dashboard</a></li>
				<li><a href="#account">Account</a></li>
				<li><a href="#banner">Banner</a></li>
				<li><a href="#partner">Ðối tác</a></li>
				<li><a href="#videoCategory">Danh mục video</a></li>
				<li><a href="#video">Video</a></li>
				<li><a href="#question">Hỏi dáp video</a></li>
				<li><a href="#videoNotification">Thông báo video</a></li>
				<li><a href="#videoDocument">Tài liệu video</a></li>
				<li><a href="#videoSurvey">Bảng điều tra câu hỏi</a></li>
			</ul>
			<?=$contents?>
		</div>
	</div>
</body>
</html>
