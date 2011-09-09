<?php
require_once 'abstract_Controller.php';

class VideoCategory extends Abstract_Controller {
	protected function getAdminTab() {
		return 4;
	}
	
	protected function getListName() {
		return 'videoCategories';
	}
	
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'lang:video category name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Description', 'Mô tả', 'trim|xss_clean');
	}
	
	protected function hasAdminPermission() {
		$accountPermissions = $this->Account_model->getLoggedInUserPermissions();
		if (is_array($accountPermissions)) {
			return in_array(VIDEO_CATEGORY_FULL, $accountPermissions);
		}
	}
}