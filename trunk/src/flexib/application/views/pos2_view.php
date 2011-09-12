<div>
<?php
	if (isset($banners) && $banners != NULL) {
		foreach($banners as $banner) {
?>
		<div>
			<a href="<?=$banner->Link?>" title="<?=$banner->Name?>" style="float:left">
				<img src="<?=base_url() . $banner->Path?>" width="210px" />
			</a>
		</div>			
<?php
		}
?>
		<div style="clear:both"></div>	
<?php 		
	} else {
?>
		POS2
<?php 		
	}	 
?>
</div>