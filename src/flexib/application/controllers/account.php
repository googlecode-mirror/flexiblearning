<?php
require_once 'abstract_Controller.php';

class Account extends Abstract_Controller {
	protected function getAdminTab() {
		return 0;
	}
	
	public function login() {
		$url = $this->input->post('CurrentUrl');	
		if ($this->Account_model->authorize() != USER_AUTHENTIC_SUCCESS_FLAG) {
			$this->form_validation->set_rules('UserName', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('Password', 'Password', 'required');
			
			if ($this->form_validation->run() == TRUE) {
				$this->Account_model->authenticate($this->input->post('Remember'), 
					$this->input->post('UserName'), $this->input->post('Password'));
			} 
		} 
		redirect($url);	
	}
	
	public function logout() {
		if ($this->Account_model->authorize() == USER_AUTHENTIC_SUCCESS_FLAG) {
			$this->Account_model->unAuthenticate();
			redirect(site_url());	
		}
	}
}