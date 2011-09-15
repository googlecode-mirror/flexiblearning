<?php
require_once 'abstract_model.php';
class VideoSurvey_model extends Abstract_model{
	public $Name;
	public $IdResource;
	public $State = 1;
	public $IdLanguage = 1;
	public $IdVideo;
	public $Approved;
	public $FileName;
    protected function getTableName() {
		return 'videosurvey';
	}
	
	public function getText() {
		return $this->config->item('text_videosurvey');
	}
	
}