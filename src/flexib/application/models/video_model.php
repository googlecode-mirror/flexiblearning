<?php
require_once 'abstract_model.php';
class Video_model extends Abstract_model{
	public $Name;
	public $NumView;
	public $Ranking = 0;
	public $Price = 1;
	public $IdLanguage = 1;
	public $State;
	
	protected function getTableName() {
		return 'video';
	}
	
	public function getText() {
		return $this->config->item('text_video');
	}
}