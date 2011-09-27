<?php
require_once 'abstract_Controller.php';

class Message extends Abstract_Controller{
	protected function hasAdminPermission() {
		return TRUE;
	}
	
    protected function getAdminTab() {
		return 6;
	}
	
	protected function getListName() {
		return 'messages';
	}
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Subject', 'lang:message Subject', 'required');
		$this->form_validation->set_rules('Content', 'lang:message Content', 'required');
		$this->form_validation->set_rules('Receiver', 'lang:message Receiver','required' );
	}
	protected function addMoreDataForEditView() {
		$account = $this->Account_model->getAll(0, 0, NULL, NULL, '', '');
		$this->addDataForView('accounts', $account);
		
	}
	
	public function delete($Id = NULL) {
		$IdAccount = $this->Account_model->getLoggedInUserId();
		if (isset($Id) && $Id != NULL) {
			return $this->db->delete($this->getTableName(), array('IdMessage' => $Id, 'IdAccount'=>$IdAccount));
		} else {
			if (!isset($Id)) {
				return parent::delete();
			}
		}
	}
	protected function handleEditValidationSuccess($message, $site = ''){
		$message->State = 1;
		$message->OwnerBy = $this->Account_model->getLoggedInUserId();
		$message->Id = $message->save();
		$result ="";
		if(isset($message->Id)){
			$ReceiverAdd = $this->input->post('Receiver');
		
			$addresses = explode(";",$ReceiverAdd);// wordswarp($ReceiverAdd,";");
			foreach ($addresses as $address){
				if(isset($address)){
					$account_message = new Account_message_model();
					$Account = $this->Account_model->getByEmail($address);
					if($Account!= NULL){
						$account_message->IdAccount = $Account->Id;
						$account_message->IdMessage = $message->Id;	
						$account_message->IsRead = 0;
						//to avoid duplicating entry on "account_message" table
						$query = "SELECT * FROM account_message where IdAccount=? AND IdMessage=?";
						$account_message_temp = $this->db->query($query, array($account_message->IdAccount, $account_message->IdMessage));
						if(!isset($account_message_temp) || $account_message_temp->num_rows()==0){
							$result = $account_message->save();
						}
						
					}
					//$message->Receiver = $message->Receiver . $Account->Email;
					
				}
			}
		 	if ($result != -1) {
	    		if ($site != ADMIN) {
	    			redirect('/' . lcfirst(get_class($this)) . '/view/' . $message->Id);
	    		} else {
	    		
	    		 //parent::handleEditValidationSuccess($message, $site);
				
	    		}
		 	}
		}
		
		parent::handleEditValidationSuccess($message, $site);
	}
	
    protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joins = array('table'=> 'account_message', 'criteria'=> 'account_message.IdMessage = message.Id AND account_message.IdAccount ='.$this->Account_model->getLoggedInUserId(), 'type' => 'join');
		$objects = $this->$className->getAll($from, $nObjPerPage, $orders = NULL,array($joins)  ,NULL , $hasState = TRUE) ;
	
		return $objects;
	}
	
	
}