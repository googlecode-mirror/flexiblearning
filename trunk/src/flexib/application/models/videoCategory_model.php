<?php
require_once 'abstract_model.php';

class VideoCategory_model extends Abstract_model {
	public $Name;
	public $Description;
	public $IdLanguage = 1;
	public $State = 1;
	
	protected function getTableName() {
		return 'videocategory';
	}
	
	public function getText() {
		return $this->config->item('text_videoCategory');
	}
}