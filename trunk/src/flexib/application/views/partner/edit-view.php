
<div id="partner">
	<div>
		<a href="<?=site_url('partner/admin')?>">« Quay lại danh sách đối tác</a>
	</div>
	<?php
		if ($partner_model->Id == NULL) { 
	?>
		<h3>THÊM ĐỐI TÁC</h3>
	<?php
		} else {
	?>
		<h3>CẬP NHẬT ĐỐI TÁC</h3>
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
	    	
	<?php echo form_open(sprintf('partner/edit/%s?%s=%s', $partner_model->Id, SITE, $this->input->get('site')), 
		array('enctype' => 'multipart/form-data')); ?>
		 <div class ="form-item">   
        	<?php 
        		if(isset($partner_model->Id)){
        			if(isset($resources)){
        		   		foreach ($resources as $resource){
        		   			
        					if($resource->Id == $partner_model->IdLogo){
        						
        	?>
        	 <img id="imgLogo" src="<?=base_url() .$resource->Path ?>" width = '200' height = '200'>
        	<div>
        		
        		<a href="#" id='imgUploadLogo'>Thay đổi logo</a>
        	</div>
        	<div id="status"></div>
        	<br></br>
        	<?php
        		
        					}
        		   		}
        			}
        		}
        	 ?>
		</div>
		<div class="form-item">
			<label>
				Tên Công Ty Đối Tác
				<span class="form-required"	title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="Name" size="65" type="text" value="<?=set_value('Name', $partner_model->Name)?>" />
		</div>
		<div class="form-item">
			<label>Địa chỉ</label> 
			<input maxlength="256" name="Address" size="65" type="text" value="<?=set_value('Address', $partner_model->Address)?>" />
		</div>
		<div class="form-item">
			<label>
				Điện Thoại
				<span class="form-required" title="This field is required.">*</span> 
			</label> 
			<input maxlength="256" name="Tel" value="<?=set_value('Tel', $partner_model->Tel)?>">
		</div>
		<div class="form-item">
			<label>Email</label> 
			<input maxlength="256" name="Email" size="65" value="<?=set_value('Email', $partner_model->Email)?>">
		</div>
		<div class="form-item">
			<label>Liên kết</label> 
			<input maxlength="256" name="Link" size="65" value="<?=set_value('Link', $partner_model->Link)?>">
		</div>
       	<div class ="form-item">
       	<?php 
       	if(!isset($partner_model->Id)){
       		
       	
       	?><label>Logo</label>
       	<input type ="file" name="imgLink" size="20">
       
       	</div>
   
       	<?php }
       		else{
       	
       	?>
       		
       	<?php 
       		}
       	?>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
		
       	<?php echo form_close(); ?> 

</div>
<script type="text/javascript">
	var btnUpload=$('#imgUploadLogo');

	new AjaxUpload(btnUpload, {
		action: '<?=site_url('partner/uploadLogo/' . $partner_model->Id)?>',
		name: 'Logo',
		onSubmit: function(file, ext){
			 if (! (ext && /^(<?=$this->config->item('img_allowed_type')?>)$/.test(ext))){ 
	            // extension is not allowed 
				$('#status').text('Chỉ tập tin <?=$this->config->item('img_allowed_type')?> được phép upload');
					return false;
			}
			$('#status').text('Đang upload...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			$('#status').text('');
			//Add uploaded file to list
			
			if(response != ''){
				location.reload(true);
			} else{
				alert('Có lỗi xảy ra. Bạn hãy thử lại', 'Upload Logo');
			}
		}
	});
</script>
