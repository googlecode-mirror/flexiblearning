<?php
require_once 'abstract_Controller.php';

class VideoSurvey extends Abstract_Controller {
    protected function getAdminTab() {
		return 9;
	}
	
	protected function getListName() {
		return 'videoSurveys';
	}
}