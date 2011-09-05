<?php
require_once 'abstract_model.php';

class Profession_model extends Abstract_model {
	public $Name;
	public $State = 1;
		
	protected function getTableName() {
		return 'profession';
	}
	
	public function getText() {
		return $this->config->item('text_profession');
	}
}