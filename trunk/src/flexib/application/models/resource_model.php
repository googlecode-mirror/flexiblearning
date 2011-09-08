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
	

	public function delete($Id = NULL) {
		if ($Id != NULL) {
			$resource_model = $this->Resource_model->getById($Id);
		} else {
			$resource_model = $this;
		}
		
		if ($resource_model != NULL) {
			if (unlink($resource_model->Path)) {
				return parent::delete($Id);
			}
		}
	}
}