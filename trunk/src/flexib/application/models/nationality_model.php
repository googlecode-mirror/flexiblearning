<?php
require_once 'abstract_model.php';

class Nationality_model extends Abstract_model {
	public $Name;

	public static function getStateKey() {
		return NULL;	
	}
	
	protected function getTableName() {
		return 'nationality';
	}
	
	public function getText() {
		return $this->config->item('text_nationality');
	}
}