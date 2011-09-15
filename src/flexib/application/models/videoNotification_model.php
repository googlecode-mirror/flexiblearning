<?php
require_once 'abstract_model.php';

class VideoNotification_model extends Abstract_model {
	public $Title;
	public $Content;
	public $IdLanguage = 1;
	public $State = 1;
	public $IdVideo;
	public $IdAccount;
	
	protected function getTableName() {
		return 'videoNotification';
	}
	
	public function getText() {
		return $this->config->item('text_videoNotification');
	}
	public static function getDisplayField() {
		return 'Title';
	}
}