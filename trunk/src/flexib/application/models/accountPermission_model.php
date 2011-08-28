<?php
require_once 'base_model.php';

class AccountPermission_model extends Base_model {
	public $Id;
	public $Permission;
	public $Description;
		
	protected function getTableName() {
		return 'accountpermission';
	}
	
	public function getText() {
		return $this->config->item('role_account');
	}
}