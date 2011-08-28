<?php
require_once 'abstract_model.php';
class banner_model extends Abstract_model{
	public $Name;
	public $Position;
	public $IdResource;
	public $State = 1;
    protected function getTableName() {
		return 'banner';
	}
	
	public function getText() {
		return $this->config->item('text_banner');
	}
	
}