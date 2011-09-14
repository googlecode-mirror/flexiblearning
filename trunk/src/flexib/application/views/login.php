<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>::FLEXIB_LEARNING::</title>
	
	<link rel="stylesheet" href="<?=base_url()?>css/redmond/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" href="<?=base_url()?>css/site.css">
	<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js"></script>
</head>

<body>
	<div class="ui-widget ui-corner-all login-form">
	    <div class="ui-widget-header ui-corner-all">Đăng nhập</div>
		<div class="ui-widget-content">
	    	<?=form_open('account/login')?>
				<div class="form-item">
					<label> 
						Tên đăng nhập
						<span class="form-required"	title="This field is required.">*</span> 
					</label> 
					<input maxlength="256" name="UserName" type="text" value="<?=$UserName?>" />
				</div>
				<div class="form-item">
					<label> 
						Mật khẩu
						<span class="form-required"	title="This field is required.">*</span> 
					</label> 
					<input maxlength="256" name="Password" type="password" value="<?=$Password?>" />
				</div>
				<div class="form-item">
					<input type="checkbox" name="Remember" />Ghi nhớ đăng nhập
				</div>
				<div class="form-item">
					<input type="hidden" name="CurrentUrl" value="<?=$current_url?>" />
					<input type="submit" value="Đăng nhập" />
				</div>
			</form>
	    </div>  
	</div>
</body>