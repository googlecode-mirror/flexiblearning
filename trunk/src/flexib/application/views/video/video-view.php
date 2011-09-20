<object type="application/x-shockwave-flash"
	data="<?=base_url() . $this->config->item('flash_object_folder')?>/FLVPlayer_Progressive.swf"
	width="<?=$this->config->item('video_width')?>" height="<?=$this->config->item('video_height')?>">
	<!--<![endif]-->
	<param name="quality" value="high" />
	<param name="wmode" value="opaque" />
	<param name="scale" value="noscale" />
	<param name="salign" value="lt" />
	<param name="FlashVars"
		value="&amp;MM_ComponentVersion=1&amp;skinName=<?=base_url() . $this->config->item('flash_object_folder')?>/Clear_Skin_3&amp;streamName=<?=base_url() . substr($video_model->Path, 0, strrpos($video_model->Path, "."))?>&amp;autoPlay=false&amp;autoRewind=false" />
	<param name="swfversion" value="8,0,0,0" />
	<param name="expressinstall"
		value="<?=$this->config->item('flash_object_folder')?>expressInstall.swf" />
	<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
	<div>
		<h4>Content on this page requires a newer version of Adobe Flash
			Player.</h4>
		<p>
			<a href="http://www.adobe.com/go/getflashplayer"><img
				src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"
				alt="Get Adobe Flash player" />
			</a>
		</p>
	</div>
	<!--[if !IE]>-->
</object>
