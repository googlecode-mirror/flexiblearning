<div id="account">
	<div>
		<a href="<?=site_url('account/admin')?>">« Quay lại quản lý account</a>
	</div>
	<h3>TẠO ACCOUNT</h3>
	<?php
		$strErr = validation_errors();
		if ($strErr != '') {
	?>
		<div class="ui-state-error">
			<?=$strErr?>
		</div>
	<?php
		} 
	?>
	
	<?php
		if (isset($errorMessage) && $errorMessage != '') {  
	?>
		<div class="ui-state-error">
			<?=$err?>
		</div>
	<?php
		} 
	?>	
	<?php echo form_open(sprintf('account/edit/%s?%s=%s', $account_model->Id, SITE, $this->input->get('site')), 
		array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
		<div class="form-item">
			<label>
				Tên đăng nhập
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input name="UserName" type="text" value="<?=set_value('UserName', $account_model->UserName) ?>" />
		</div>
		
		<div class="form-item">
			<label>
				Mật khẩu
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input name="Password" type="password" autocomplete="off" />
			<input type="button" value="Lấy mật khẩu ngẫu nhiên" id="generateBtn" />
			<input type="button" value="Hiển thị mật khẩu" id="showPwdBtn" />
			<span id="showPwd"></span>
		</div>
		
		<div class="form-item">
			<label>
				Họ và tên
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="FullName" ype="text" value="<?=set_value('FullName', $account_model->FullName) ?>" />
		</div>
		
		<div class="form-item">
			<label>
				Ngày sinh
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<input type="text" name="DateOfBirth" 
				value="<?=set_value('DateOfBirth',  date($this->config->item('date_format'),$account_model->DateOfBirth))?>" >
		</div>
		
		<div class="form-item">
			<label>
				Địa chỉ
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<input maxlength="256" size="65" name="Address" type="text" value="<?=set_value('Address', $account_model->Address) ?>" />
		</div>
		
		<div class="form-item">
			<label>
				Quốc tịch
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<select name="IdNationality">
			<?php
				foreach($nationalities as $nationality) {
			?>
					<option value="<?=$nationality->Id?>"><?=$nationality->Name?></option>
			<?php 		
				} 
			?>
			</select>
		</div>
		
		<div class="form-item">
			<label>
				Điện thoại
			</label> 
			<input name="Tel" type="text" value="<?=set_value('Tel', $account_model->Tel)?>" />
		</div>
		
		<div class="form-item">
			<label>
				Email
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<input name="Email" type="text" value="<?=set_value('Email', $account_model->Email)?>" />
		</div>
		
		<div class="form-item">
			<label>
				Nghề nghiệp
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<select name="IdProfession">
			<?php
				foreach ($professions as $profession) {
			?>
					<option value="<?=$profession->Id?>" 
						<?=set_select('IdProfession', $profession->Id, $account_model->IdProfession == $profession->Id)?>>
						<?=$profession->Name?>
					</option>
			<?php 		
				} 
			?>
			</select>
		</div>
		
		<div class="form-item">
			<label>
				Yêu thích
			</label> 
			<input name="Favorite" type="text" size="65" maxlength="256" value="<?=set_value('Favorite', $account_model->Favorite)?>" />
		</div>
		
		<?php
			if ($account_model->Id == NULL) { 
		?>
		<div class="form-item">
			<label>
				Avatar
			</label> 
			<input name="imgAvatar" type="file" />
		</div>
		<?php
			} 
		?>
		
		<div class="form-item">
			<label>
				Vai trò
			</label> 
			<select name="IdRole">
			<?php
				foreach ($roles as $role) {
			?>
				<option value="<?=$role->Id?>"><?=$role->Name?></option>
			<?php 		
				} 
			?>
			</select>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledFullName" value="1" 
			<?=set_checkbox('EnabledFullName', 1, $account_model->EnabledFullName == 1); ?>>
				Hiển thị họ và tên
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledDateOfBirth" value="1" 
			<?php echo set_checkbox('EnabledDateOfBirth', 1, $account_model->EnabledDateOfBirth == 1); ?>>
				Hiển thị ngày sinh
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledAddress" value="1" 
			<?php echo set_checkbox('EnabledAddress', 1, $account_model->EnabledAddress == 1); ?>>
				Hiển thị địa chỉ
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledNationality" value="1" 
			<?php echo set_checkbox('EnabledNationality', 1, $account_model->EnabledNationality == 1); ?>>
				Hiển thị quốc tịch
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledTel" value="1" 
			<?php echo set_checkbox('EnabledTel', 1, $account_model->EnabledTel == 1); ?>>
				Hiển thị điện thoại
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledEmail" value="1" 
			<?php echo set_checkbox('EnabledEmail', 1, $account_model->EnabledEmail == 1); ?>>
				Hiển thị email
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledProfession" value="1" 
			<?php echo set_checkbox('EnabledProfession', 1, $account_model->EnabledProfession == 1); ?>>
				Hiển thị nghề nghiệp
			</input>
		</div>
		
		<div class="form-item">
			<input type="checkbox" name="EnabledFavorite" value="1" 
			<?php echo set_checkbox('EnabledFavorite', 1, $account_model->EnabledFavorite == 1); ?>>
				Hiển thị sở thích
			</input>
		</div>
		
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
	<?php echo form_close(); ?> 
</div>

<script type="text/javascript">
	$("input[name=DateOfBirth]").datepicker({
		dateFormat : '<?=$this->config->item('date_format_client')?>',
		changeMonth : true,
		changeYear : true,
		yearRange: '1960:2011'
	});

	$('#generateBtn').click(function() {
		$('input[name=Password]').val($.randomString(10));
	});
	
	$('#showPwdBtn').click(function() {
		$('#showPwd').text($('input[name=Password]').val());
	});
</script>