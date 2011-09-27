<?php
require_once 'abstract_model.php';

class Message_model extends Abstract_model {
	public $Subject;
	public $Content;
	public $State;
	
	public $OwnerBy;
	public $Receiver;

	public static function getStateKey() {
		return NULL;	
	}
	
	protected function getTableName() {
		return 'message';
	}
	
	public function getText() {
		return $this->config->item('text_message');
	}
	public static function getDisplayField() {
		return 'Subject';
	}
	
	
}