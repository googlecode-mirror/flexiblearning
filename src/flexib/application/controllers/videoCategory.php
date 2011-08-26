<?php
require_once 'abstract_Controller.php';

class VideoCategory extends Abstract_Controller {
	protected function getAdminTab() {
		return 4;
	}
	
	protected function getListName() {
		return 'videoCategories';
	}
}