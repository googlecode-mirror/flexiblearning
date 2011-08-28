<?php
require_once 'abstract_model.php';

class Account_model extends Abstract_model {
	public $FullName;
	public $DateOfBirth;
	public $Address;
	public $IdNationality;
	public $Tel;
	public $Email;
	public $UserName;
	public $Password;
	public $IdProfession;
	public $Favorite;
	public $AvatarId;
	public $IdRole;
	public $EnabledFullName;
	public $EnabledDateOfBirth;
	public $EnabledAddress;
	public $EnabledNationality;
	public $EnabledTel;
	public $EnabledEmail;
	public $EnabledProfession;
	public $EnabledFavorite;
	public $LastLoginDate;
	
	protected function getTableName() {
		return 'account';
	}
	
	public function getText() {
		return $this->config->item('text_account');
	}
	
	public function authorize() {
		return $this->session->userdata(USER_AUTHENTIC_COOKIE);
	}
	
	private function setCookieForLoggedInUser($UserName, $Password) {
		$this->input->set_cookie($this->config->item('username_cookie'), $UserName, 0);
		$this->input->set_cookie($this->config->item('password_cookie'), $Password, 0);
	}
	
	private function unsetCookieForLoggedInUser() {
		delete_cookie($this->config->item('username_cookie'));
		delete_cookie($this->config->item('password_cookie'));
	}
	
	public function authenticate($IsRemember, $UserName, $Password) {
		$md5Password = md5($Password);
		$query=$this->db->where("UserName", $UserName);
		$query=$this->db->where("Password", $md5Password);
		$query=$this->db->limit(1,0);  
		$query=$this->db->get($this->getTableName());

		if ($query->num_rows() == 1) {
			$accounts = $query->result(get_class($this));
			$account = $accounts[0];
			$account->LastLoginDate = now();
			$account->save();
			
			$this->session->set_userdata(USER_AUTHENTIC_COOKIE, USER_AUTHENTIC_SUCCESS_FLAG);
			$this->session->set_userdata(USERNAME_LOGIN, $UserName);
			$this->session->set_userdata(USERID_LOGIN, $account->Id);
			
			$accountPermissions = $this->Role_model->getPermissions($account->IdRole);
			$this->session->set_userdata(USERPERMISSION_LOGIN, $accountPermissions);
			
			if ($IsRemember) {
				$this->setCookieForLoggedInUser($UserName, $Password);
			} else {
				$this->unsetCookieForLoggedInUser();
			}
			
			return TRUE;
		} else {
			$this->session->set_userdata(USER_AUTHENTIC_COOKIE, USER_AUTHENTIC_UNSUCCESS_FLAG);
		} 
		 
		return FALSE;
	}
	
	public function unAuthenticate() {
		$userLoggedIn = array(USERNAME_LOGIN => '', USERID_LOGIN => '', USER_AUTHENTIC_COOKIE => '', USERPERMISSION_LOGIN => '');
		$this->session->unset_userdata($userLoggedIn);
		
		//$this->unsetCookieForLoggedInUser();
	}
	
	public function getLoggedInUserPermissions() {
		if ($this->authorize() == USER_AUTHENTIC_SUCCESS_FLAG) {
			return $this->session->userdata(USERPERMISSION_LOGIN);
		}
		return FALSE;
	}
	
	public function getLoggedInUserId() {
		return $this->session->userdata(USERID_LOGIN);
	}
}