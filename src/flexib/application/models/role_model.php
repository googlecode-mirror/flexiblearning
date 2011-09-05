<?php
require_once 'abstract_model.php';

class Role_model extends Abstract_model {
	public $Name;
	public $Description;
	public $IdLanguage;
	public $State;
		
	protected function getTableName() {
		return 'role';
	}
	
	public function getText() {
		return $this->config->item('text_role');
	}
	
	public function getPermissions($Id = NULL) {
		if ($Id == NULL) {
			$RoleId = $this->Id;			
		} else {
			$RoleId = $Id;
		}
		
		$this->db->select('IdPermission');
		$query = $this->db->get_where('role_accountpermission', array('IdRole' => $RoleId));
		$permissions = array();
		
		foreach ($query->result() as $row) {
			$permissions[] = $row->IdPermission;
		}
		return $permissions;
	}
}