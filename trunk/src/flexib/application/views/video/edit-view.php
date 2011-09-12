<div id="video">
	<div>
		<a href="<?=site_url('video/admin')?>">« Quay lại quản lý video</a>
	</div>
	<?php
		if ($video_model->Id == NULL) { 
	?>
	<h3>TẠO MỚI VIDEO</h3>
	<?php
		} else {
	?>
	<h3>CẬP NHẬT VIDEO</h3>
	<?php 			
		} 
	?>
	<?php
		$strErr = validation_errors();
		if ($strErr != '') {
	?>
		<div class="ui-state-error margin_bottom">
			<?=$strErr?>
		</div>
	<?php
		} 
	?>
	
	<?php
		if (isset($err) && $err != '') {  
	?>
		<div class="ui-state-error margin_bottom">
			<?=$err?>
		</div>
	<?php
		} 
	?>	
	
	<?php
		if ($video_model->Id != NULL) { 
	?>
		<div class="left">
			<div class="box_center">
				<div id="video_view">
					<?php
						require_once 'video_view.php'; 
					?>
				</div>
				<a href="#" id="lnkUploadVideo">Cập nhật video</a>
				<div id="status"></div>
			</div>
		</div>
	<?php
		} 
	?>
	
	<div class="left">
		<?php
			if ($video_model->Id && $video_model->Approved == 0) {
		?>
			    <div class="ui-state-error-text">Video này chưa được duyệt</div>			
		<?php 		
			} 
		?>
		<?php echo form_open(sprintf('video/edit/%s?%s=%s', $video_model->Id, SITE, $this->input->get('site')), 
			array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
			<div class="form-item">
				<label>
					Tên video
					<span class="form-required"	title="This field is required.">*</span> 
				</label> 
				<input maxlength="256" name="Name" type="text" value="<?=set_value('Name', $video_model->Name) ?>" />
			</div>
			
			<div class="form-item">
				<label>Mô tả</label> 
				<textarea name="Description" cols="30"><?=set_value('Description', $video_model->Description)?></textarea>
			</div>
			
			<div class="form-item">
				<label>
					Giá
					<span class="form-required"	title="This field is required.">*</span>
				</label> 
				<input name="Price" type="text" value="<?=set_value('Price', $video_model->Price) ?>" />
			</div>
			
			<div class="form-item">
				<label>
					Phân loại
					<span class="form-required"	title="This field is required.">*</span>
				</label> 
				<select name="IdCategory">
				<?php
					if (isset($videoCategories)) {
						foreach ($videoCategories as $videoCategory) {
				?>
							<option value="<?=$videoCategory->Id?>" 
								<?=set_select('IdCategory', $videoCategory->Id, $videoCategory->Id == $video_model->IdCategory)?>>
								<?=$videoCategory->Name?>
							</option>
				<?php 						
						} 
					}
				?>
				</select>
			</div>
			
			<?php
				if ($video_model->Id == NULL) { 
			?>
			<div class="form-item">
				<label>
					Upload video
					<span class="form-required"	title="This field is required.">*</span>
				</label> 
				<input name="uplVideo" type="file" size=20 />
			</div>
			<?php
				} 
			?>
			
			<?php
				 if ($this->input->get('site') == ADMIN) {
			?>
			<div class="form-item">
				<input name="Approved" type="checkbox" value="1" 
					<?=set_checkbox('Approved', 1, $video_model->Approved == 1); ?>>
					Duyệt video				
				</input>
			</div>
			<?php
				 } 
			?>
			
			<input type="submit" value="Hoàn tất" />
			<input type="reset" value="Làm lại" />
		<?php echo form_close(); ?>
	</div> 
	<div class="clear"></div>
</div>

<script type="text/javascript">
	var btnUpload=$('#lnkUploadVideo');

	new AjaxUpload(btnUpload, {
		action: '<?=site_url('video/uploadVideo/' . $video_model->Id)?>',
		name: 'fileVideo',
		onSubmit: function(file, ext){
			 if (! (ext && /^(<?=$this->config->item('video_allowed_type')?>)$/.test(ext))){ 
	            // extension is not allowed 
				$('#status').text('Chỉ tập tin <?=$this->config->item('video_allowed_type_text')?> được phép upload');
				return false;
			}
			$('#status').text('Đang upload...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			$('#status').text('');
			//Add uploaded file to list
			if(response != ''){
				$('#video_view').load('<?=site_url('video/loadVideo/' . $video_model->Id)?>');
			} else{
				alert('Có lỗi xảy ra. Bạn hãy thử lại', 'Upload video');
			}
		}
	});
</script>