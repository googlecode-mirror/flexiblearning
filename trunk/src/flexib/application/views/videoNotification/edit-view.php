


<div id="videoNotification">
 	<div>
		<a href="<?=site_url('videoNotification/admin')?>">« Quay lại danh mục các thông báo </a>
	</div>
	<?php
		if($videoNotification_model->Id == NULL){
			
		
	?>
	<h3>TẠO MỚI THÔNG BÁO</h3>
	<?php
		} 
		else{
	?>
	<h3>CẬP NHẬT THÔNG BÁO</h3>
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
	<?=form_open(sprintf('videoNotification/edit/%s?%s=%s', $videoNotification_model->Id, SITE, $this->input->get('site')), 
		array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
	
	<div >
		<label>Tiêu Đề:</label> 
		<input maxlength="256" name="Title" size="65" type="text" value="<?=set_value('Title', $videoNotification_model->Title)?>" />
	</div>
	
	<div class="form-item">
	Nội Dung:
	<!-- <textarea name="Content" cols="30"><?=set_value('Content', $videoNotification_model->Content) ?></textarea>-->
	<?php
		include_once "lib/ckeditor/ckeditor.php";
		$CKEditor = new CKEditor();
		$CKEditor->basePath = '/ckeditor/';
					
		// Create a textarea element and attach CKEditor to it.
		$CKEditor->editor("Content", set_value('Content', $videoNotification_model->Content), 
		$this->config->item('config_admin_ck_editor'));
		
				
	?>
	</div>
	<div class="form-item">
			<label>
				 Video
			</label> 
			
			<select name="IdVideoOption">
			<?php
				if (isset($videos)) {
					foreach ($videos as $video) {
					
			?>
						<option  value="<?=$video->Id?>" 
							<?=set_select('IdVideoOption', $video->Id, $videoNotification_model->Id !=NULL && $videoNotification_model->IdVideo == $video->Id)?>>
							<?=$video->Name?>
							
						</option>
												
			<?php 		
							
					} 
				}
			?>
			</select>
		
					
		</div>
		<?php
			if($videoNotification_model->IdAccount == $this->session->userdata(USERID_LOGIN) ||$videoNotification_model->Id == NULL){ 
		?>
		<input type="submit" value="Hoàn Tất" />
		<?php
			} 
		?>
	
	<?php echo form_close(); ?>
  
</div>	

