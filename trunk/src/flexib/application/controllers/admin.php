<?php 
require_once 'base_controller.php';

class Admin extends Base_Controller {
	public function index($page = '') {
		$this->template->load('template_admin', 'dashboard');
	}		
}