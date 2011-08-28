<?php
require_once 'abstract_Controller.php';
class Question extends Abstract_Controller{
    protected function getAdminTab() {
		return 6;
	}
	
	protected function getListName() {
		return 'questions';
	}
}