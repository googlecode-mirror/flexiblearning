<div id="videoDocument">
    <div>
		<a href="<?=site_url('videoDocument/admin')?>">« Quay lại danh mục tài liệu </a>
	</div>
	<?php
		if($videoDocument_model->Id == NULL){
			
		
	?>
	<h3>TẠO MỚI TÀI LIỆU</h3>
	<?php
		} 
		else{
	?>
	<h3>CẬP NHẬT TÀI LIỆU</h3>
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
	<?=form_open(sprintf('videoDocument/edit/%s?%s=%s', $videoDocument_model->Id, SITE, $this->input->get('site')), 
		array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
		<div class="form-item">
			<label>
				Tiêu đề tài liệu
				
			</label> 
			<input maxlength="256" name="Subject" size="65" type="text" value="<?=set_value('Subject', $videoDocument_model->Subject)?>" />
		</div>
		
		<div class="form-item">
			<label>
				Mô tả tài liệu
			</label> 
			<input maxlength="256" name="Description" size="65" type="text" value="<?=set_value('Description', $videoDocument_model->Description) ?>" />
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
							<?=set_select('IdVideoOption', $video->Id, $videoDocument_model->Id != NULL && $video->Id == $videoDocument_model->IdVideo)?>>
							<?=$video->Name?>
							
						</option>
												
			<?php 		
							
					} 
				}
			?>
			</select>
		
					
		</div>
		
		<?php
			if ($videoDocument_model->Id == NULL) { 
		?>
		<div class="form-item">
			<label>
				Upload Tài Liệu
				<span class="form-required"	title="This field is required.">*</span>
			</label> 
			<input name="uplDocument" type="file" size=20 />
		</div>
		
		<?php
			} else{
				
			
		?>	
		<a href="#" id="docDocument" >Cập Nhật Tài liệu</a>
		<div id="status"></div>
		<div id="NameDocumentFile">
			<label>Tài liệu hiện tại:<?=$videoDocument_model->FileName ?> </label>
		</div>
		<?php }?>	
		<div class="checkbox">
			<input type="checkbox" value="<?=set_value('check1', 1)?>" name="check1"  <?=($videoDocument_model->Approved == 1)?'checked value="1"':'uncheked value="0"'?>/><label for="check1">Đã duyệt</label>
		</div>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
	<?php echo form_close(); ?>

</div>


