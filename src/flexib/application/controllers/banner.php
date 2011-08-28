<?php
require_once 'abstract_Controller.php';

class Banner extends Abstract_Controller {
    protected function getAdminTab() {
		return 2;
	}
	
	protected function getListName() {
		return 'banners';
	}
}