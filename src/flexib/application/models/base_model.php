<?php 
abstract class Base_model extends CI_Model {
	abstract protected function getTableName();
	
	/**
	 * 
	 * get all objects by the criteria
	 * @param array $criterias - key => value (key is the field and value is the field's criteria
	 * @param int $limit
	 * @param int $offset
	 * @param array $orders
	 * @param string $joinTable
	 * @param string $joinCriteria
	 * @param string $joinType 
	 * @param array/string $moreProperties
	 */
	public function getAllWhere($criterias, $limit = 0, $offset = 0, $orders = NULL, 
		$joins = NULL, $moreProperties = '', $inCriterias = NULL, $hasState = TRUE) {
		if ($criterias != NULL) {
			$this->db->where($criterias);
		} 
		if ($inCriterias != NULL) {
			foreach($inCriterias as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}
		
		return $this->getAll($limit, $offset, $orders, $joins, $moreProperties, $hasState);
	}
	
	/**
	 * get all objects
	 * @param int $limit - the beginning index of choosing the object)
	 * @param int $offset - the number of elements
	 * @param array $orders - the arrays of fields' name - the list order will be ordered basing on these fields
	 * @param string $joinTable - the join table
	 * @param array $joinCriteria - the array containing the join criteria
	 * @param string $joinType - the type of join (left outer, right outer, inner)
	 * @param array/string $moreProperties - the additional properties getting from the query
	 */
	public function getAll($limit = 0, $offset = 0, $orders = NULL, $joins = NULL, $moreProperties = '', $hasState = TRUE) {
		if ($hasState == TRUE) {
			$stateKey = $this->getStateKey();
			$this->db->where(array($stateKey => 1));
		}
		
		$this->db->from($this->getTableName());
		
		$arrProperties = get_object_vars ($this);
		$arrPropertiesSelect = array();
		foreach ($arrProperties as $key => $value) {
			$arrPropertiesSelect[] = $this->getTableName() . "." . $key;
		}
		$strSelect = implode(",", $arrPropertiesSelect);
		if (is_array($moreProperties)) {
			foreach ($moreProperties as $moreProp) {
				$strSelect .= "," . $moreProp;
			}
		} else {
			if ($moreProperties != '') {
				$strSelect .= "," . $moreProperties;
			}
		}
		$this->db->select($strSelect);
		
		if ($joins != NULL && is_array($joins) && count($joins) > 0) {
			foreach ($joins as $join) {
				$this->db->join($join['table'], $join['criteria'], $join['type']);
			}	
		} 
		
		if ($limit != 0 && $offset != 0) {
			$this->db->limit($offset, $limit);
		} else if ($offset != 0) {
			$this->db->limit($offset);
		}
		
		if ($orders != NULL) {
			foreach ($orders as $key => $order) {
				$this->db->order_by($key, $order);	
			}
		}
		
		$query = $this->db->get();
		return $this->getObjects($query);
	}

	/**
	 * 
	 * get the objects based on the returned query (the query contains a list of objects)
	 * @param unknown_type $query
	 */
	protected function getObjects($query) {
		$objects = array();
		foreach ($query->result(get_class($this)) as $object) {
			$objects[] = $object;
		}
		return $objects;
	}
	
	public function setDataFromInput($data) {
		$className = get_class($this);
		if (isset($data) && is_array($data)) {
			foreach ($data as $key => $value) {
				if (property_exists($className, $key)) {
					$this->$key = $value;
				}
			}
		}
	}
	
	public function getCount($criterias = NULL) {
		$this->db->from($this->getTableName());
		if ($criterias) {
			$this->db->where($criterias);
		}
		return $this->db->count_all_results();
	}
	
	public function save() {
		return $this->db->insert($this->getTableName(), $this);
	}
	
	public function delete() {
		$vars = get_class_vars(get_class($this));
		foreach($vars as $key => $value) {
			$vars[$key] = $this->$key;
		}
		return $this->db->delete($this->getTableName(), $vars); 
	}
}