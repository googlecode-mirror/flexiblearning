<?php
require_once 'abstract_Controller.php';

class VideoNotification extends Abstract_Controller {
    protected function getAdminTab() {
		return 7;
	}
	
	protected function getListName() {
		return 'videoNotifications';
	}
}