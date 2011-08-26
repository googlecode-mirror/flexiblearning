<div id="videoCategory">
	<h3>TẠO MỚI DANH MỤC VIDEO</h3>
	<?php
		$strErr = validation_errors();
		if ($strErr != '') {
	?>
		<div class="messages error">
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
	
	<?php echo form_open('videoCategory/edit'); ?>
		<div class="form-item">
			<label> 
				Tên phân loại 
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="60" name="name" size="60" class="form-text required" type="text" value="<?php echo set_value('name') ?>">
		</div>
		<div class="form-item">
			<label> 
				Mô tả
			</label> 
			<input maxlength="60" name="description" size="60" class="form-text required" type="text" value="<?php echo set_value('description') ?>">
		</div>
		<input type="submit" value="Hoàn tất" />
	<?php echo form_close(); ?> 
</div>