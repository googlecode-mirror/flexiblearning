<?php
require_once 'abstract_model.php';
class banner_model extends Abstract_model{
	public $Name;
	public $Position;
	public $IdResource;
	public $IdPartner;
	public $State = 1;
	public $Link;
	
    protected function getTableName() {
		return 'banner';
	}
	
	public function getText() {
		return $this->config->item('text_banner');
	}
	
}