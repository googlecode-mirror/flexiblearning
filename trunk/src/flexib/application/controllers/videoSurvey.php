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
		$this->form_validation->set_rules('Name', 'lang: survey name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('Description', 'Mô tả', 'trim|xss_clean');
		
    }
	protected function hasAdminPermission() {
		return TRUE;//in_array(PARTNER_FULL, $accountPermissions);
	}
	
	protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = videoSurvey.IdResource', 'type' => 'join');
		$joinVideo = array('table'=> 'video', 'criteria'=> 'video.Id = videoSurvey.IdVideo && video.Approved = "1"', 'type' => 'join');
		$moreProperties = array('resource.Path as Path', 'video.Name as VideoName');
		$objects = $this->$className->getAll($from, $nObjPerPage, array('Approved' => 'asc'), 
		array($joinResource, $joinVideo), $moreProperties, TRUE);
	
		return $objects;
	}
	
	protected function addMoreDataForEditView() {
		$videos = $this->Video_model->getAll(0,0, array('Name' => 'asc'),NULL,'', TRUE );
		
		$this->addDataForView('videos',$videos);
		$resources = $this->Resource_model->getAll(0,0,array('Id'=>'asc'), NULL,'', FALSE);
		$this->addDataForView('resources', $resources);
		
	}

	protected function handleEditValidationSuccess($videoSurvey, $site = '') {
		if ($videoSurvey->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/videoSurvey';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = '*';
	
			$this->load->library('upload', $uplConfig);
			
			if ($this->upload->do_upload('uplSurvey')) {
				$data = $this->upload->data();
	
				$resource = new Resource_model();
				$resource->Path = $uplPath . '/' . $data['file_name'];
				$videoSurvey->FileName = $data['file_name'];
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
		$videoSurvey->Approved  = $this->input->post('check1');
		
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
	public function uploadSurvey($Id = NULL) {
		if ($Id != NULL) {
			$videoSurvey_model = $this->VideoSurvey_model->getById($Id);

			if ($videoSurvey_model != NULL) {
				$uplPath = $this->config->item('resource_folder') . '/videoSurvey';
				$uplConfig['upload_path'] = $uplPath;
				//$uplConfig['allowed_types'] = $this->config->item('video_allowed_type');
				// TODO [hdang.sea] : using specific types is not successfull now
				$uplConfig['allowed_types'] = '*';

				$this->load->library('upload', $uplConfig);

				if ($this->upload->do_upload('fileSurvey')) {
					$data = $this->upload->data();

					$resource = new Resource_model();
					$resource->Path = $uplPath . '/' . $data['file_name'];
					$videoSurvey_model->FileName = $data['file_name'];
					$resourceId = $resource->save();
			
					$oldResource = $this->Resource_model->getById($videoSurvey_model->IdResource);
					$videoSurvey_model->IdResource = $resourceId;
					$videoSurvey_model->save();
					$resource->Id = $resourceId;
						
					$oldResource->delete();
						
					echo 1;
				}
			}
		}
	}
	public function Download($FileNamePost = NULL) {
		if ($FileNamePost != NULL) {
			//$videoSurvey = 
			$filename = $FileNamePost;//$this->input->get('FileName');
			$downloadPath = $this->config->item('resource_folder') . '/videoSurvey';
				
			if (preg_match("/\.\./i", $filename)) {
				die();
			}
			$file = str_replace("..", "", $filename);
				
			if(preg_match("/\.ht.+/i", $filename)){
				die();
			}
			$file= $downloadPath.'/'.$file;
			if(!file_exists($file)) 
				die();
			$type = filetype($file);
			$today = date("F j, Y, g:i a");
			
			$time = time();
			header("Content-type: $type");
			header("Content-Disposition: attachment;filename=$filename");
			header("Content-Transfer-Encoding: binary"); 
			header('Pragma: no-cache');
			header('Expires: 0');
			set_time_limit(0); 
			readfile($file);	
		}
	}
	
}