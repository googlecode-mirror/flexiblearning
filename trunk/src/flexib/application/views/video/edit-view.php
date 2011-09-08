<div id="video">
	<div>
		<a href="<?=site_url('video/admin')?>">« Quay lại quản lý video</a>
	</div>
	<h3>TẠO MỚI VIDEO</h3>
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
	
	<div class="left">
		<div class="box_center">
			<div class="video">
				<object id="MediaPlayer1" width="<?=$this->config->item('video_width')?>" height="<?=$this->config->item('video_height')?>"
					classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"
					codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701"
					standby="Loading Microsoft® Windows® Media Player components..."
					type="application/x-oleobject" align="middle">
					<param name="FileName" value="<?=base_url() . $video_model->Path?>">
					<param name="ShowStatusBar" value="True">
					<param name="DefaultFrame" value="mainFrame">
					<param name="autostart" value="<?=$this->config->item('video_auto_start')?>">
					<embed type="application/x-mplayer2"
						pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"
						src="<?=base_url() . $video_model->Path?>" autostart="<?=$this->config->item('video_auto_start')?>"
						align="middle" width="<?=$this->config->item('video_width')?>" height="<?=$this->config->item('video_height')?>" defaultframe="rightFrame"
						showstatusbar="true">
					</embed>
				</object>
			</div>
		</div>
	</div>
	<div class="left">
		<?php echo form_open(sprintf('video/edit/%s?%s=%s', $video_model->Id, SITE, $this->input->get('site')), 
			array('method' => 'post', 'enctype' => 'multipart/form-data'))?>
			<div class="form-item">
				<label>
					Tên video
					<span class="form-required"	title="This field is required.">*</span> 
				</label> 
				<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name', $video_model->Name) ?>" />
			</div>
			
			<div class="form-item">
				<label>Mô tả</label> 
				<textarea name="Description" cols="65"><?=set_value('Description', $video_model->Description)?></textarea>
			</div>
			
			<div class="form-item">
				<label>
					Giá
					<span class="form-required"	title="This field is required.">*</span>
				</label> 
				<input name="Price" size="65" type="text" value="<?=set_value('Price', $video_model->Price) ?>" />
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
			
			<input type="submit" value="Hoàn tất" />
			<input type="reset" value="Làm lại" />
		<?php echo form_close(); ?>
	</div> 
	<div class="clear"></div>
</div>