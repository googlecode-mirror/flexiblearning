<div id="banner">
	<div>
		<a href="<?=site_url('banner/admin')?>">« Quay lại danh sách banner</a>
	</div>
	<?php
		if ($banner_model->Id == NULL) { 
	?>
		<h3>THÊM BANNER</h3>
	<?php
		} else {
	?>
		<h3>CẬP NHẬT BANNER</h3>
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
	
	<?php
		if ($banner_model->Id != NULL) { 
	?>
		<div class="left">
			<div class="box_center">
				<div class="avatar">
					<img src="<?=base_url() . $banner_model->ResourcePath?>">
				</div>
				<a href="#" id="lnkUploadBanner">Cập nhật banner</a>
				<div id="status"></div>
			</div>	
		</div>
	<?php
		} 
	?>
	
	<div class="left">
		<?php echo form_open(sprintf('banner/edit?%s=%s', SITE, $this->input->get('site')), 
			array('enctype' => 'multipart/form-data')); ?>
			<div class="form-item">
				<label>
					Tên Banner
					<span class="form-required"	title="This field is required.">*</span> 
				</label> 
				<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name', $banner_model->Name) ?>">
			</div>
			
			<div class="form-item">
				<label>Vị trí</label> 
				<select name="Position">
				<?php
					foreach ($positions as $key => $value) {
				?>
					<option value="<?=$key?>" <?=set_select('Position', $key, $banner_model->Position == $key)?>>
						<?=$value?>
					</option>
				<?php 		
					} 
				?>	
				</select>
				<a href="<?=base_url() . $this->config->item('template_banner')?>" class="thickbox">
					Xem các vị trí banner 
				</a>
			</div>
			
			<?php
				if ($banner_model->Id == NULL) { 
			?>
			<div class="form-item">
				<label>
					Banner
					<span class="form-required"	title="This field is required.">*</span>
				</label>
		       	<input type ="file" name="imgBanner" size="20">
	       	</div>
	       	<?php
				} 
	       	?>
       	
			<div class="form-item">
				<label>Đối tác</label> 
				<select name="IdPartner">
				<?php
					foreach ($partners as $partner) {
				?>
					<option value="<?=$partner->Id?>" <?=set_select('IdPartner', $partner->Id, $banner_model->IdPartner == $partner->Id)?>>
						<?=$partner->Name?>
					</option>
				<?php 		
					} 
				?>
				</select>	
			</div>
			
			<div class="form-item">
				<label>Liên kết</label> 
				<input maxlength="256" name="Link" size="65" type="text" value="<?=set_value('Link', $banner_model->Link) ?>">
			</div>
			
			<input type="submit" value="Hoàn tất" />
			<input type="reset" value="Làm lại" />
		<?php echo form_close(); ?>
	</div> 
	<div class="clear"></div>
</div>

<script type="text/javascript">
	var btnUpload=$('#lnkUploadBanner');

	new AjaxUpload(btnUpload, {
		action: '<?=site_url('banner/uploadBanner/' . $banner_model->Id)?>',
		name: 'imgBanner',
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
	            // extension is not allowed 
				$('#status').text('Chỉ tập tin JPG, PNG hoặc GIF được phép upload');
				return false;
			}
			$('#status').text('Đang upload...');
		},
		onComplete: function(file, response){		
			//On completion clear the status
			$('#status').text('');
			//Add uploaded file to list
			if(response != ''){
				$('.avatar img').attr('src', response);
			} else{
				alert('Có lỗi xảy ra. Bạn hãy thử lại', 'Upload hình');
			}
		}
	});
</script>