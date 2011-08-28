<?php 
require_once 'base_controller.php';

class Admin extends Base_Controller {
	public function index() {
		if ($this->Account_model->authorize() == USER_AUTHENTIC_SUCCESS_FLAG) {
			$this->template->load('template_admin', 'dashboard', $this->getDataForView());
		} else {
			$UserName = $this->input->cookie($this->config->item('username_cookie'));
			$Password = $this->input->cookie($this->config->item('password_cookie'));
			$this->load->view('login', array(
										'current_url' => current_url(),
										'UserName' => $UserName,
										'Password' => $Password
			));
		}
	}	

	protected function getAdminTab() {
		return 0;
	}
}