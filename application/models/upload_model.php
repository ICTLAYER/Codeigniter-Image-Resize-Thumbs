<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload_model extends CI_Model {

	
	function insert_data($config){
		$data = array(
			'filename'    => $config['source_image']
		);
		$this->db->insert('image', $data);
	}
	function view_image()
	{
		$this->db->select('*');
		$this->db->from('image');
		$query = $this->db->get();
		$images = $query->result();
		return $images;
	}

}
