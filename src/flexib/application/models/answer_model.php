<?php
require_once 'abstract_model.php';
class answer extends Abstract_model{
	public $Content;
	public $State = 1;
    protected function getTableName() {
		return 'answer';
	}
	
	public function getText() {
		return $this->config->item('text_answer');
	}  

}