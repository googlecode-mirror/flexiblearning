<?php
require_once 'abstract_Controller.php';

class VideoSurvey extends Abstract_Controller {
    protected function getAdminTab() {
		return 9;
	}
	
	protected function getListName() {
		return 'videoSurveys';
	}
    protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'Tên phân loại', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('Description', 'Mô tả', 'trim|xss_clean');
	}
	protected function hasAdminPermission() {
		return TRUE;//in_array(PARTNER_FULL, $accountPermissions);
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = videoSurvey.IdResource', 'type' => 'join');
		$joinVideo = array('table'=> 'video', 'criteria'=> 'video.Id = videoSurvey.IdVideo', 'type' => 'join');
		$moreProperties = array('resource.Path as Path', 'video.Name as VideoName');
		$objects = $this->$className->getAll($from, $nObjPerPage, array('CreatedDate' => 'asc'), 
		array($joinResource, $joinVideo), $moreProperties, TRUE);
	
		return $objects;
	}
	
	protected function addMoreDataForEditView() {
		$videos = $this->Video_model->getAll(0,0, array('Name' => 'asc'),NULL,'', TRUE );
		
		$this->addDataForView('videos',$videos);
		
	}

	protected function handleEditValidationSuccess($videoSurvey, $site = '') {
		if ($videoSurvey->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/videoSurvey';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = '*';
	
			$this->load->library('upload', $uplConfig);
			$videoId = $this;	
			if ($this->upload->do_upload('uplSurvey')) {
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
		    	$videoSurvey->IdResource = $resourceId;
		    	
		    }
		}
	    $videoSurvey->Id = $videoSurvey->save(); 
	    if ($videoSurvey->Id != -1) {
	    	if ($site != ADMIN) {
	    		redirect('/' . lcfirst(get_class($this)) . '/view/' . $videoSurvey->Id);
	    	} else {
	    		
	    		$this->prepareDataForAdminListView();
	    		$this->loadViewForAdminEditSuccessfully($videoSurvey);
	    	}
	    }
	}

	
}