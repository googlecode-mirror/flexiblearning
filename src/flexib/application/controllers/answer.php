<?php
require_once 'abstract_Controller.php';
class Answer extends Abstract_Controller{
    protected function getAdminTab() {
		return 6;
	}
	
	protected function getListName() {
		return 'answers';
	}
}