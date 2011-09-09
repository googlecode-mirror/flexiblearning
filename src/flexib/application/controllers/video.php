<?php
require_once 'abstract_Controller.php';

class Video extends Abstract_Controller {
	protected function getAdminTab() {
		return 5;
	}
	
	protected function setFormValidationForEditView() {
		$this->form_validation->set_rules('Name', 'lang:video name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Description', 'lang:description', 'trim|xss_clean');
		$this->form_validation->set_rules('Price', 'lang:price', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('IdCategory', 'lang:category', 'required');
	}
	
	protected function hasAdminPermission() {
		return TRUE;
	}
	
	protected function addMoreDataForEditView($object) {
		$videoCategories = $this->VideoCategory_model->getAll(0, 0, array('Name' => 'asc'), NULL, '', TRUE);
		$this->addDataForView('videoCategories', $videoCategories);
		
		if ($object->Id != NULL) {
			$resource = $this->Resource_model->getById($object->IdResource);
			$object->Path = $resource->Path;
		}
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = video.IdResource', 'type' => 'join');
		$joinAccount = array('table'=> 'account', 'criteria'=> 'account.Id = video.OwnerBy', 'type' => 'join');
		$joinVideoCategory = array('table'=> 'videocategory', 'criteria'=> 'videocategory.Id = video.IdCategory', 'type' => 'join');
		
		$moreProperties = array(
			'resource.Path', 
			'account.UserName as OwnerUserName',
			'videocategory.Name as VideoCategoryName');
		
		$objects = $this->$className->getAll(
			$from, $nObjPerPage, array('CreatedDate' => 'asc'), 
			array($joinResource, $joinAccount, $joinVideoCategory) , $moreProperties, TRUE);
	
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
	    parent::handleEditValidationSuccess($video, $site);
	}
	
	protected function addReferenceDataForListView() {
		$criteria = array('Approved' => 1);
		$nApprovedVideos = $this->Video_model->getCount($criteria);
		$this->addDataForView('nApprovedVideos', $nApprovedVideos);
		
		$this->addDataForView('nCreatedTodayVideos', $this->Video_model->countTodayVideos());
		$this->addDataForView('nApprovedTodayVideos', $this->Video_model->countTodayApprovedVideos());
	}
	
	public function uploadVideo($Id = NULL) {
		if ($Id != NULL) {
			$video_model = $this->Video_model->getById($Id);

			if ($video_model != NULL) {
				$uplPath = $this->config->item('resource_folder') . '/video';
				$uplConfig['upload_path'] = $uplPath;
				//$uplConfig['allowed_types'] = $this->config->item('video_allowed_type');
				// TODO [hdang.sea] : using specific types is not successfull now
				$uplConfig['allowed_types'] = '*';

				$this->load->library('upload', $uplConfig);

				if ($this->upload->do_upload('fileVideo')) {
					$data = $this->upload->data();

					$resource = new Resource_model();
					$resource->Path = $uplPath . '/' . $data['file_name'];
					$resourceId = $resource->save();

					$oldResource = $this->Resource_model->getById($video_model->IdResource);
					$video_model->IdResource = $resourceId;
					$tempId = $video_model->save();
						
					$oldResource->delete();
						
					echo 1;
				}
			}
		}
	}
}