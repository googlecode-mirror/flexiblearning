
<div id="partner">
	<div>
		<a href="<?=site_url('partner/admin')?>">« Quay lại danh sách đối tác</a>
	</div>
	<h3>THÊM ĐỐI TÁC</h3>
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
		if (isset($err) && $err != '') {  
	?>
		<div class="messages error">
			<?=$err?>
		</div>
	<?php
		} 
	?>	
	<?php echo form_open(sprintf('partner/edit?%s=%s', SITE, $this->input->get('site')), 
		array('enctype' => 'multipart/form-data')); ?>
		<div class="form-item">
			<label>
				Tên Công Ty Đối Tác
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name') ?>">
		</div>
		<div class="form-item">
			<label>	Địa chỉ</label> 
			<textarea name="Address" cols="65"><?=set_value('Address')?></textarea>
		</div>
		<div class="form-item">
			<label>	Điện Thoại</label> 
			<textarea name="Tel" cols="65"><?=set_value('Tel')?></textarea>
		</div>
		<div class="form-item">
			<label>	Email</label> 
			<textarea name="Email" cols="65"><?=set_value('Email')?></textarea>
		</div>
		<div class="form-item">
			<label>	Link</label> 
			<textarea name="Link" cols="65"><?=set_value('Link')?></textarea>
		</div>
        <div class ="form-item">   
        	<label>Logo</label>
			<input type="file" name="imgLink" size="20" />
        
		</div>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
	<?php echo form_close(); ?> 
</div>