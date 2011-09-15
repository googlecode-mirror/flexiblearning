<?php
require_once 'abstract_model.php';

class VideoDocument_model extends Abstract_model {
	public $Subject;
	public $Description;
	public $IdLanguage = 1;
	public $IdResource = 1;
	public $State = 1;
	public $Approved = 0;
	public $FileName;
	
	protected function getTableName() {
		return 'videoDocument';
	}
	
	public function getText() {
		return $this->config->item('text_videoDocument');
	}
	
	public static function getDisplayField() {
		return 'Subject';
	}
}