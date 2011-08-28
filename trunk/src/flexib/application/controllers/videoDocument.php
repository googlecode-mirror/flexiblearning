<?php
require_once 'abstract_Controller.php';

class VideoDocument extends Abstract_Controller {
    protected function getAdminTab() {
		return 8;
	}
	
	protected function getListName() {
		return 'videoDocuments';
	}
}