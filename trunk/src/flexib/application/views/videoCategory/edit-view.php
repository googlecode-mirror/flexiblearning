<div id="videoCategory">
	<div>
		<a href="<?=site_url('videoCategory/admin')?>">« Quay lại danh mục video</a>
	</div>
	<h3>TẠO MỚI DANH MỤC VIDEO</h3>
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
			<textarea name="Description" cols="65"><?=set_value('Description', $videoCategory_model->Description)?></textarea>
		</div>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
	<?php echo form_close(); ?> 
</div>