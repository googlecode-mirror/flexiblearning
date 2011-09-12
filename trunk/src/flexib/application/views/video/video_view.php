<object id="MediaPlayer1" 
	width="<?=$this->config->item('video_width')?>" 
	height="<?=$this->config->item('video_height')?>"
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
        src="<?=base_url() . $video_model->Path?>" 
        autostart="<?=$this->config->item('video_auto_start')?>"
        align="middle" width="<?=$this->config->item('video_width')?>" height="<?=$this->config->item('video_height')?>" defaultframe="rightFrame"
        showstatusbar="true">
    </embed>
</object>