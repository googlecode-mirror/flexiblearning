<?php
require_once 'abstract_model.php';
class Video_model extends Abstract_model{
	public $Name;
	public $Description;
	public $NumView = 0;
	public $Ranking = 0;
	public $NumRanking = 0;
	public $Price = 0;
	public $IdLanguage = 1;
	public $IdCategory;
	public $IdResource;
	public $State = 1;
	public $OwnerBy;
	public $Approved = 0;
	
	protected function getTableName() {
		return 'video';
	}
	
	public function getText() {
		return $this->config->item('text_video');
	}
	
	public function setDataFromInput($data) {
		if ($data) {
			parent::setDataFromInput($data);
			
			if (array_key_exists('Approved', $data)) {
				$this->Approved = 1;				
			} else {
				$this->Approved = 0;
			}
		}
	}
	
	/*public function countTodayVideos() {
		$this->db->from($this->getTableName());
		$this->db->where('DATEDIFF(NOW(), FROM_UNIXTIME(CreatedDate)) <= 1');
		
		return $this->db->count_all_results();
	}*/
	
	public function countTodayApprovedVideos() {
		$this->db->from($this->getTableName());
		$this->db->where('DATEDIFF(NOW(), FROM_UNIXTIME(UpdatedDate)) <= 1 AND Approved = 1');
		
		return $this->db->count_all_results();
	}
}