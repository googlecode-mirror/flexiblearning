<?php
require_once 'abstract_model.php';

class Resource_model extends Abstract_model{
	public $Path;
	
    protected function getTableName() {
		return 'resource';
	}
	
	public function getText() {
		return $this->config->item('text_resource');
	}
}