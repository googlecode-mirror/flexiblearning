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

	public function delete($id = NULL) {
		if (isset($id) && $id != NULL) {
			return $this->db->delete($this->getTableName(), array('id' => $id));
		} else {
			return parent::delete();
		}
	}
	
	public function delete_temp($id = NULL) {
		$className = get_class($this);
		if (isset($id) && $id != NULL) {
			if (property_exists($className, $this->getStateKey())) {
				return $this->db->update($this->getTableName(), array($this->getStateKey() => 0), array('id' => $id));
			} else {
				return $this->db->delete($this->getTableName(), array('id' => $id));				
			}
		} else {
			return parent::delete();
		}
	}
		
	public function getById($id) {
		$query = $this->db->get_where($this->getTableName(), array('id' => $id), 1, 0);
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
		$this->updatedDate = now();
		if (!isset($this->id)) {
			$this->createdDate = now();
			$vars = $this->generateArrayFromObj(); 
			if ($this->db->insert($this->getTableName(), $vars)) {
				$this->id = $this->db->insert_id();
				return $this->id;
			}
			return -1;
		} else {
			$this->db->where('id', $this->id);
			$vars = $this->generateArrayFromObj();
			if ($this->db->update($this->getTableName(), $vars)) {
				return $this->id;
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