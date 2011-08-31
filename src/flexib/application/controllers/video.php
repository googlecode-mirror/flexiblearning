<?php
require_once 'abstract_Controller.php';

class Video extends Abstract_Controller {
	protected function getAdminTab() {
		return 5;
	}
	
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'Tên video', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Description', 'Mô tả', 'trim|xss_clean');
		$this->form_validation->set_rules('Price', 'Giá', 'trim|required|xss_clean');
		$this->form_validation->set_rules('IdCategory', 'Phân loại', 'required');
	}
	
	protected function hasAdminPermission() {
		return TRUE;
	}
	
	protected function addMoreDataForEditView() {
		$videoCategories = $this->VideoCategory_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', TRUE);
		$this->addDataForView('videoCategories', $videoCategories);
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = video.IdResource', 'type' => 'join');
		$joinAccount = array('table'=> 'account', 'criteria'=> 'account.Id = video.OwnerBy', 'type' => 'join');
		$moreProperties = array('resource.Path', 'account.UserName as OwnerUserName');
		$objects = $this->$className->getAll($from, $nObjPerPage, array('CreatedDate' => 'asc'), 
		array($joinResource, $joinAccount) , $moreProperties, TRUE);
	
		return $objects;
	}
	
	protected function handleEditValidationSuccess($video, $site = '') {
		if ($video->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/video';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = '*';
	
			$this->load->library('upload', $uplConfig);
	
			if ($this->upload->do_upload('uplVideo')) {
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
		    	$video->IdResource = $resourceId;
		    	$video->OwnerBy = $this->Account_model->getLoggedInUserId();
		    }
		}
	    
	    if ($video->save() != -1) {
	    	if ($site != ADMIN) {
	    		redirect('/' . lcfirst(get_class($this)) . '/view/' . $video->Id);
	    	} else {
	    		$this->prepareDataForAdminListView();
	    		$this->loadViewForAdminEditSuccessfully($video);
	    	}
	    }
	}
}