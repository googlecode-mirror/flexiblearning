
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
        					if($resource->Id == $partner_model->LogoId){
        	?>
        	 <img src="<?=base_url() .$resource->Path ?>" width = '200' height = '200'>
        	
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
   
       	<?php }?>
		<input type="submit" value="Hoàn tất" />
		<input type="reset" value="Làm lại" />
		
       	<?php echo form_close(); ?> 

</div>