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
		
		$joinAccount = array('table'=> 'account', 'criteria'=> 'account.Id = video.OwnerBy', 'type' => 'join');
		$joinVideoCategory = array('table'=> 'videocategory', 'criteria'=> 'videocategory.Id = video.IdCategory', 'type' => 'join');
		
		$moreProperties = array(
			'account.UserName as OwnerUserName',
			'videocategory.Name as VideoCategoryName');
		
		$objects = $this->$className->getAll(
			$from, $nObjPerPage, array('CreatedDate' => 'asc'), 
			array($joinAccount, $joinVideoCategory) , $moreProperties, TRUE);
	
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
	
				$outputFile = $this->convertVideo($uplPath . '/' . $data['file_name']);
				$thumbnailPath = $this->config->item('resource_folder') . '/video_thumbnail';
				$thumbnailFile = create_thumbnail($outputFile, 
					$this->config->item('thumbnail_video_width'),
					$this->config->item('thumbnail_video_height'),
					$thumbnailPath);
									
				if ($outputFile && $thumbnailFile) {
					$resourceVideo = new Resource_model();
					$resourceVideo->Path = $outputFile;
					$resourceVideoId = $resourceVideo->save();
					
					$resourceThumbnail = new Resource_model();
					$resourceThumbnail->Path = $thumbnailFile;
					$resourceThumbnailId = $resourceThumbnail->save();
				}
			} else {
				$this->addDataForView('err', $this->upload->display_errors('<div>', '</div>'));
				$this->template->load($this->template_admin, $this->getEditViewName(), $this->getDataForView());
				return;
			}
		    if (isset($resourceVideoId)) {
		    	$video->IdResource = $resourceVideoId;
		    	$video->IdThumbnail = $resourceThumbnailId;
		    	$video->OwnerBy = $this->Account_model->getLoggedInUserId();
		    	
		    }
		}
	    parent::handleEditValidationSuccess($video, $site);
	}
	
	protected function addReferenceDataForListView() {
		$criteria = array('Approved' => 1);
		$nApprovedVideos = $this->Video_model->getCount($criteria);
		$this->addDataForView('nApprovedVideos', $nApprovedVideos);
		
		$this->addDataForView('nCreatedTodayVideos', $this->Video_model->getCountByToday());
		$this->addDataForView('nApprovedTodayVideos', $this->Video_model->countTodayApprovedVideos());
	}
	
	public function listNotApprovedVideo() {
		$from = $this->uri->segment(3);
		
		$criterias = array('Approved' => 0);
		$orders = array('CreatedDate' => 'desc');
		$joinResource = array('table'=> 'resource', 'criteria'=> 'resource.Id = video.IdThumbnail', 'type' => 'left');
		
		$pagingConfig['base_url'] = site_url('video/listNotApprovedVideo');
		$pagingConfig['total_rows'] = $this->Video_model->getCount(array('Approved' => 0), TRUE);
		$pagingConfig['per_page'] = $this->config->item('n_object_for_quick_view_list_video');
		 
		$this->pagination->initialize($pagingConfig);
		$this->addDataForView('page_links', $this->pagination->create_links());
		
		$notApprovedVideos = $this->Video_model->getAllWhere($criterias, $from, $pagingConfig['per_page'], $orders, 
			array($joinResource), 'Path as ThumbnailPath', NULL, TRUE);
		foreach ($notApprovedVideos as $notApprovedVideo) {
			if (!isset($notApprovedVideo->ThumbnailPath)) {
				$notApprovedVideo->ThumbnailPath = $this->config->item('video_thumbnail');
			}
		}
		$this->addDataForView('notApprovedVideos', $notApprovedVideos);
		$this->load->view('video/not-approved-video-view', $this->getDataForView());		
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
					$outputFile = $this->convertVideo($uplPath . '/' . $data['file_name']);
					
					if ($outputFile) {
						$resource = new Resource_model();
						$resource->Path = $outputFile;
						$resourceId = $resource->save();
	
						$oldResource = $this->Resource_model->getById($video_model->IdResource);
						$video_model->IdResource = $resourceId;
						$tempId = $video_model->save();
							
						$oldResource->delete();
							
						echo $resourceId;
					}
				}
			}
		}
	}
	
	public function loadVideo($Id) {
		$video_model = $this->Video_model->getById($Id);
		$resource = $this->Resource_model->getById($video_model->IdResource);
		$video_model->Path = $resource->Path;
		$this->load->view('video/video-view', array('video_model' => $video_model));
	}
	
	public function approve($Id = NULL) {
		if ($Id != NULL) {
			$video_model = $this->Video_model->getById($Id);
			if ($video_model != NULL) {
				$video_model->Approved = 1;
				if ($video_model->save() != -1) {
					redirect($this->input->post('currentUrl'));
				}
			}
		}
	}
	
	private function convertVideo($fileName) {
		$this->load->helper('video');
		$outputFile = convert_to_flv($fileName);
		if ($fileName != $outputFile) {
			unlink($fileName);
		}
		return $outputFile;
	}
}