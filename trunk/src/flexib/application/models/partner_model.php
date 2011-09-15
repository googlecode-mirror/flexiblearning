<?php
require_once 'abstract_model.php';

class Partner_model extends Abstract_model{
	public $Name;
	public $Address;
	public $Email;
	public $Tel;
	public $IdLogo;
	public $Link;
	public $State = 1;
	
    protected function getTableName() {
		return 'partner';
	}
	
	public function getText() {
		return $this->config->item('text_partner');
	}
}