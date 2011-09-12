<div id="videoCategory">
	<div>
		<a href="<?=site_url('videoCategory/admin')?>">« Quay lại danh mục video</a>
	</div>
	
	<?php
		if ($videoCategory_model->Id == NULL) {	 
	?>
		<h3>TẠO MỚI DANH MỤC VIDEO</h3>
	<?php
		} else {
	?>
		<h3>CẬP NHẬT DANH MỤC VIDEO</h3>
	<?php 		
		} 
	?>
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
		<div class="ui-state-error">
			<?=$err?>
		</div>
	<?php
		} 
	?>	
	<?php echo form_open(sprintf('videoCategory/edit/%s?%s=%s', $videoCategory_model->Id, SITE, $this->input->get('site')), 
		array('name' => 'videoCategory')); ?>
		<div class="form-item">
			<label>
				Tên phân loại
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name', $videoCategory_model->Name) ?>"/>
		</div>
		<div class="form-item">
			<label>	Mô tả</label> 
			<?php
				include_once "lib/ckeditor/ckeditor.php";
	
				// Create a class instance.
				$CKEditor = new CKEditor();
	
				// Path to the CKEditor directory.
				$CKEditor->basePath = '/ckeditor/';
					
				// Create a textarea element and attach CKEditor to it.
				$CKEditor->editor("Description", set_value('Description', $videoCategory_model->Description),
					$this->config->item('config_admin_ck_editor'));
			?>
		</div>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
	<?php echo form_close(); ?> 
</div>