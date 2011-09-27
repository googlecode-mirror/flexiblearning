<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>::FLEXIB_LEARNING::</title>

<link rel="stylesheet" href="<?=base_url()?>css/redmond/jquery-ui-1.8.16.custom.css">
<link rel="stylesheet" href="<?=base_url()?>css/admin.css">
<link rel="stylesheet" href="<?=base_url()?>css/site.css">

<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ui/i18n/jquery.ui.datepicker-vi.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/utility.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="<?=base_url() . $this->config->item('flash_object_folder')?>/Scripts/swfobject_modified.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function(){
		var urls = [
		    		'<?=site_url('admin')?>',
		    		'<?=site_url('account/admin')?>',
		    		'<?=site_url('banner/admin')?>',
		    		'<?=site_url('partner/admin')?>',
		    		'<?=site_url('videoCategory/admin')?>',
		    		'<?=site_url('video/admin')?>',
		    		'<?=site_url('message/admin')?>',
		    		'<?=site_url('videoNotification/admin')?>',
		    		'<?=site_url('videoDocument/admin')?>',
		    		'<?=site_url('videoSurvey/admin')?>'
		    		];
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
	<div class="left">
		<h2>ADMIN FLEXIBLEARNING</h2>
	</div>
	<div class="right">
		Chào bạn&nbsp;<a href="#"><?=$this->session->userdata(USERNAME_LOGIN)?></a>
		&nbsp;<a href="<?=site_url('account/logout')?>">Đăng xuất</a>
	</div>
	<div class="clear"></div>
	
	<div id="admin">
		<div id="tabs">
			<ul>
				<li><a href="#dashboard">Dashboard</a></li>
				<li><a href="#account">Account</a></li>
				<li><a href="#banner">Banner</a></li>
				<li><a href="#partner">Ðối tác</a></li>
				<li><a href="#videoCategory">Danh mục video</a></li>
				<li><a href="#video">Video</a></li>
				<li><a href="#message">Hộp tin nhắn</a></li>
				<li><a href="#videoNotification">Thông báo video</a></li>
				<li><a href="#videoDocument">Tài liệu video</a></li>
				<li><a href="#videoSurvey">Bảng điều tra câu hỏi</a></li>
			</ul>
			<?=$contents?>
		</div>
	</div>
</body>
</html>