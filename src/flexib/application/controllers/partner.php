<?php
require_once 'abstract_Controller.php';

class Partner extends Abstract_Controller{
	protected $template_admin = 'template_admin';
    protected function getAdminTab() {
		return 3;
	}
	
	protected function getListName() {
		return 'partners';
	}
    protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'Tên Đối Tác', 'trim|required|xss_clean');
		
	}
	protected function handleEditValidationSuccess($object, $site = ''){
		$uplPath = $this->config->item('resource_folder') . '/logo';

		$uplConfig['upload_path'] = $uplPath;
		$uplConfig['allowed_types'] = '*';

		$this->load->library('upload', $uplConfig);

		if ($this->upload->do_upload('imgLink')) {
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
	    	$object->LogoId = $resourceId;
	    	$objectId = $object->save();
	    	
	 	    $object->Id = $resourceId;
	    }
	    
	    if ($objectId != -1) {
	    	if ($site != ADMIN) {
	    		redirect('/' . lcfirst(get_class($this)) . '/view/' . $objectId);
	    	} else {
	    		$this->prepareDataForAdminListView();
	    		$this->loadViewForAdminEditSuccessfully($object);
	    	}
	    }
	}
	
    protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joins = array('table'=> 'resource', 'criteria'=> 'resource.id = partner.LogoId', 'type' => 'join');
		$moreProperties = array('resource.Path');
		$objects = $this->$className->getAll($from, $nObjPerPage, $orders = NULL, array($joins) , $moreProperties, $hasState = TRUE) ;
	
		return $objects;
	}
	
	protected function hasAdminPermission() {
		$accountPermissions = $this->Account_model->getLoggedInUserPermissions();
		if (is_array($accountPermissions)) {
			return in_array(PARTNER_FULL, $accountPermissions);
		}
	}
}