<?php
require_once 'abstract_model.php';
class Video_model extends Abstract_model{
	public $Name;
	public $Description;
	public $NumView = 0;
	public $Ranking = 0;
	public $NumRanking = 0;
	public $Price = 0;
	public $IdLanguage = 1;
	public $IdCategory;
	public $IdResource;
	public $State = 1;
	public $OwnerBy;
	
	protected function getTableName() {
		return 'video';
	}
	
	public function getText() {
		return $this->config->item('text_video');
	}
}