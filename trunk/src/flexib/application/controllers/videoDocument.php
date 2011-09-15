<?php
require_once 'abstract_Controller.php';

class VideoDocument extends Abstract_Controller {
    protected function getAdminTab() {
		return 8;
	}
	
	protected function getListName() {
		return 'videoDocuments';
	}
	protected function hasAdminPermission() {
		return TRUE;
	}
    protected function getObjectsForList($from = 0, $nObjPerPage = '') {
		$className = $this->getModelName();
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = videoDocument.IdResource', 'type' => 'join');
		$joinVideo_videoDocument = array('table'=> 'video_videoDocument', 'criteria'=> 'video_videoDocument.IdDocument = videoDocument.Id', 'type' => 'join');
		$joinVideo = array('table' => 'video', 'criteria' => 'video_videoDocument.IdVideo = video.Id', 'type' =>'join');
		$moreProperties = array('resource.Path as Path', 'video_videoDocument.IdVideo as IdVideo','video.Name as VideoName');
		$objects = $this->$className->getAll($from, $nObjPerPage, array('State' => 'asc'), 
		array($joinResource, $joinVideo_videoDocument,$joinVideo), $moreProperties, TRUE);
	    
		return $objects;
	}
   protected function prepareDataForListView($from = 0) {
		$className = $this->getModelName();

		$this->pagingConfig['total_rows'] = $this->countObjectsForList();
		$objects = $this->getObjectsForList($from, $this->pagingConfig['per_page']);

		$this->addDataForView($this->getListName(), $objects);
		$this->addReferenceDataForListView();
	}
    protected function addMoreDataForEditView($object) {
		$videos = $this->Video_model->getAll(0,0, NULL ,NULL,'', '' );
		
		$this->addDataForView('videos',$videos);
			
	}
    
	
  	protected function setFormValidationForEditView() {
		//$this->form_validation->set_rules('Subject', 'Tiêu đề tài liệu', 'trim|required|xss_clean');
		$this->form_validation->set_rules('Subject', 'lang:subject', 'trim|required|xss_clean');
  		
  	}
	
   
    protected function handleEditValidationSuccess($videoDocument, $site = '') {
		if ($videoDocument->Id == NULL) {
			$uplPath = $this->config->item('resource_folder') . '/videoDocument';
	
			$uplConfig['upload_path'] = $uplPath;
			$uplConfig['allowed_types'] = '*';
	
			$this->load->library('upload', $uplConfig);
			if($videoDocument->Id == NULL){
				if ($this->upload->do_upload('uplDocument')) {
					$data = $this->upload->data();
	
					$resource = new Resource_model();
					$resource->Path = $uplPath . '/' . $data['file_name'];
					$videoDocument->FileName = $data['file_name'];
					$resourceId = $resource->save();
				} else {
					$this->addDataForView('err', $this->upload->display_errors('<div>', '</div>'));
					$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
					return;
				}
			}
		    if (isset($resourceId)) {
		    	
		    	$videoDocument->IdResource = $resourceId;
		    	
		    }
		}
		$videoDocument->Approved = $this->input->post('check1');
		$videoDocument->IdVideo = $this->input->post('IdVideoOption');
		    	
	    $videoDocument->Id = $videoDocument->save();
	   
		 
	    if ($videoDocument->Id != -1) {
	    	if ($site != ADMIN) {
	    		redirect('/' . lcfirst(get_class($this)) . '/view/' . $videoDocument->Id);
	    	} else {
	    		
	    		$video_videoDocument = new Video_VideoDocument_model();
	    		
				$video_videoDocument->IdDocument = $videoDocument->Id;
				$video_videoDocument->IdVideo = $videoDocument->IdVideo;
				$query = "SELECT * FROM video_videoDocument where IdVideo=? AND IdDocument=?";
				$video_videoDocument_temp = $this->db->query($query, array($video_videoDocument->IdVideo, $video_videoDocument->IdDocument));
				if($video_videoDocument_temp->row_data == NULL){	
					$video_videoDocument->save();
				}
	    		$this->prepareDataForAdminListView();
	    		$this->loadViewForAdminEditSuccessfully($videoDocument);
	    	}
	    }
	}
	public function uploadDocument($Id = NULL) {
		if ($Id != NULL) {
			$videoDocument_model = $this->VideoDocument_model->getById($Id);

			if ($videoDocument_model != NULL) {
				$uplPath = $this->config->item('resource_folder') . '/videoDocument';
				$uplConfig['upload_path'] = $uplPath;
				//$uplConfig['allowed_types'] = $this->config->item('video_allowed_type');
				// TODO [hdang.sea] : using specific types is not successfull now
				$uplConfig['allowed_types'] = '*';

				$this->load->library('upload', $uplConfig);

				if ($this->upload->do_upload('fileDocument')) {
					$data = $this->upload->data();

					$resource = new Resource_model();
					$resource->Path = $uplPath . '/' . $data['file_name'];
					$videoDocument_model->FileName = $data['file_name'];
					$resourceId = $resource->save();
			
					$oldResource = $this->Resource_model->getById($videoDocument_model->IdResource);
					$videoDocument_model->IdResource = $resourceId;
					$videoDocument_model->save();
					$resource->Id = $resourceId;

					$query = "SELECT * FROM video_videoDocument where IdVideo=? AND IdDocument=?";
					$video_videoDocument = $this->db->query($query, array($oldResource, $videoDocument_model->Id));
					$video_videoDocument->IdDocument = $resourceId;
					$video_videoDocument->save();
					
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
			$downloadPath = $this->config->item('resource_folder') . '/videoDocument';
				
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