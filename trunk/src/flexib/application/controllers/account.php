<?php
require_once 'abstract_controller.php';

class Account extends Abstract_Controller {
	protected function getAdminTab() {
		return 1;
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
	
	protected function hasAdminPermission() {
		$accountPermissions = $this->Account_model->getLoggedInUserPermissions();
		if (is_array($accountPermissions)) {
			return in_array(ACCOUNT_FULL, $accountPermissions);
		}
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$joinRole = array('table'=> 'role', 'criteria'=> 'account.IdRole = role.Id', 'type' => 'join');
		$objects = $this->Account_model->getAll($from, $nObjPerPage, 
			array('UpdatedDate' => 'desc'), array($joinRole), 
			array('role.Name as RoleName'), TRUE);
			
		return $objects;
	}
	
	protected function addMoreDataForEditView() {
		$nationalities = $this->Nationality_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', FALSE);
		$this->addDataForView('nationalities', $nationalities);
		
		$professions = $this->Profession_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', TRUE);
		$this->addDataForView('professions', $professions);
		
		$roles = $this->Role_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', TRUE);
		$this->addDataForView('roles', $roles);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see application/controllers/Abstract_Controller::setFormValidationForEditView()
	 */
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('UserName', 'lang:username', 'required|xss_clean');
		
		if ($this->uri->segment(3) == '') {
			$this->form_validation->set_rules('Password', 'lang:password', 'trim|required|md5|xss_clean');
		}
		
		$this->form_validation->set_rules('FullName', 'lang:fullname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('DateOfBirth', 'lang:date of birth', 'required');
		$this->form_validation->set_rules('Address', 'lang:address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Email', 'lang:email', 'required|valid_email');
		$this->form_validation->set_rules('EnabledFullName', 'EnabledFullName', '');
		$this->form_validation->set_rules('EnabledDateOfBirth', 'EnabledDateOfBirth', '');
		$this->form_validation->set_rules('EnabledAddress', 'EnabledAddress', '');
		$this->form_validation->set_rules('EnabledNationality', 'EnabledNationality', '');
		$this->form_validation->set_rules('EnabledTel', 'EnabledTel', '');
		$this->form_validation->set_rules('EnabledEmail', 'EnabledEmail', '');
		$this->form_validation->set_rules('EnabledProfession', 'EnabledProfession', '');
		$this->form_validation->set_rules('EnabledFavorite', 'EnabledFavorite', '');
	}
	
	protected function handleEditValidationSuccess($account, $site = '') {
		if ($account->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/account';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = $this->config->item('img_allowed_type');
			$uplConfig['max_size'] = $this->config->item('img_max_size');
			$uplConfig['max_width'] = $this->config->item('img_max_width');
			$uplConfig['max_height'] = $this->config->item('img_max_height');
	
			$this->load->library('upload', $uplConfig);
	
			if ($this->upload->do_upload('imgAvatar')) {
				$data = $this->upload->data();
	
				$resource = new Resource_model();
				$resource->Path = $uplPath . '/' . $data['file_name'];
				$resourceId = $resource->save();
			} else {
				$this->addDataForView('err', $this->upload->display_errors('<div>', '</div>'));
				$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
				return;
			}
		    if (isset($resourceId)) {
		    	$account->AvatarId = $resourceId;
		    }
		}
	    parent::handleEditValidationSuccess($account, $site);
	}
}