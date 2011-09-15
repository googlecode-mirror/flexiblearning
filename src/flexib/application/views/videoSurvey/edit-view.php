<div id="videoSurvey">
    <div>
		<a href="<?=site_url('videoSurvey/admin')?>">« Quay lại danh mục bảng điều tra </a>
	</div>
	<h3>TẠO MỚI BẢNG ĐIỀU TRA</h3>
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
	<?php echo form_open(sprintf('videoSurvey/edit/%s?%s=%s', $videoSurvey_model->Id, SITE, $this->input->get('site')), 
		array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
		<div class="form-item">
			<label>
				Tên Survey
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name', $videoSurvey_model->Name) ?>" />
		</div>
		
		
		<div class="form-item">
			<label>
				 video
				
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			
			<select name="IdVideo">
			<?php
				if (isset($videos)) {
					foreach ($videos as $video) {
						if($video->Approved == 1){
			?>
						<option value="<?=$video->Id?>" 
							<?=set_select('Id', $video->Id,$videoSurvey_model->Id !=NULL && $video->Id == $videoSurvey_model->IdVideo)?>>
							<?=$video->Name?>
							
						</option>
			
												
			<?php 						}
					} 
				}
			?>
			</select>
		</div>
		<?php
			if ($videoSurvey_model->Id == NULL) { 
		?>
		<div class="form-item">
			<label>
				Upload Survey
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<input name="uplSurvey" type="file" size=20 />
		</div>
		
		<?php
			}
			else{
			
		?>		
		
		
		<a href="#" id="docSurvey" >Cập Nhật Bảng khảo sát</a>
		<div id="status"></div>
		<div id="NameSurveyFile">
			<label>Bảng khảo sát hiện tại:<?=$videoSurvey_model->FileName ?> </label>
		</div>
		<?php }?>
		<div class="checkbox">
			<input type="checkbox" value="<?=set_value('check1', 1)?>" name="check1" <?=($videoSurvey_model->Approved==1)?'checked':'unchecked' ?>/><label for="check1">Đã duyệt</label>
		</div>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
		
	<?php echo form_close(); ?>
</div>

<script type="text/javascript">
	var btnUpload=$('#docSurvey');

	new AjaxUpload(btnUpload, {
		action: '<?=site_url('videoSurvey/uploadSurvey/' . $videoSurvey_model->Id)?>',
		name: 'fileSurvey',
		onSubmit: function(file, ext){
			 
			$('#status').text('Đang upload...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			
			//Add uploaded file to list
			if(response != ''){
				location.reload(true);
				$('#status').text('upload thành công');
				
			} else{
				alert('Có lỗi xảy ra. Bạn hãy thử lại', 'Upload Survey');
			}
		}
	});
</script>