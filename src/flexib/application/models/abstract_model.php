<?php
require_once 'base_model.php';
 
abstract class Abstract_model extends Base_model {
	public $Id;
	public $CreatedDate;
	public $UpdatedDate;
	public $CreatedBy = 1;
	public $UpdatedBy = 1;
	
	abstract public function getText();
	
	public function getStateKey() {
		return 'State';	
	}
	
	public function getDisplayField() {
		return 'Name';
	}
	
	public function getDisplayName(){
		$displayField = $this->getDisplayField();
		return $this->$displayField;
	}

	public function delete($Id = NULL) {
		if (isset($Id) && $Id != NULL) {
			return $this->db->delete($this->getTableName(), array('Id' => $Id));
		} else {
			return parent::delete();
		}
	}
	
	public function delete_temp($Id = NULL) {
		$className = get_class($this);
		if (isset($Id) && $Id != NULL) {
			if (property_exists($className, $this->getStateKey())) {
				return $this->db->update($this->getTableName(), array($this->getStateKey() => 0), array('Id' => $Id));
			} else {
				return $this->db->delete($this->getTableName(), array('Id' => $Id));				
			}
		} else {
			return parent::delete();
		}
	}
		
	public function getById($Id) {
		$query = $this->db->get_where($this->getTableName(), array('Id' => $Id), 1, 0);
		$objects = $query->result(get_class($this));
		if (count($objects) > 0) {
			return $objects[0];		
		} else {
			return FALSE;
		}
	}
	
	/**
	 * save (create new or update) the current object to database
	 * if the object's id is not existed, it will insert this object to database, otherwise it will update the object
	 * the object's id will be returned (if the operation is successful, otherwise, -1 will be returned)
	 */
	public function save() {
		$this->UpdatedDate = now();
		if (!isset($this->Id)) {
			$this->CreatedDate = now();
			$vars = $this->generateArrayFromObj(); 
			if ($this->db->insert($this->getTableName(), $vars)) {
				$this->Id = $this->db->insert_id();
				return $this->Id;
			}
			return -1;
		} else {
			$this->db->where('Id', $this->Id);
			$vars = $this->generateArrayFromObj();
			if ($this->db->update($this->getTableName(), $vars)) {
				return $this->Id;
			} 
			return -1;
		} 
	}
	
	private function generateArrayFromObj() {
		$vars = get_class_vars(get_class($this));
		foreach($vars as $key => $value) {
			$vars[$key] = $this->$key;
		}
		return $vars;
	}
}