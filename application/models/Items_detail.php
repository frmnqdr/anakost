<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_detail extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = "tb_items_detail";
	}

	function get_all($conditions=array(),$limit=null) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($conditions);
		if(isset($limit)){
			$this->db->limit($limit);
		}
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_single($conditions=array()) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($conditions);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows() === 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	function add($data=array()) {
		$this->db->insert($this->table,$data);
	}

	function edit($conditions=array(),$data=array()) {
		$this->db->where($conditions);
		$this->db->update($this->table,$data);
	}

	function delete($conditions=array()) {
		$this->db->where($conditions);
		$this->db->delete($this->table);
	}
}