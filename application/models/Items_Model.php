<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items_Model extends MY_Model {
	protected $table = 'items';
	protected $tableTwo = 'item_categories';

	public function all()
	{
		$this->db->select($this->table.'.id');
		$this->db->select($this->table.'.name');
		$this->db->select($this->tableTwo.'.name as category');
		$this->db->join($this->tableTwo, $this->tableTwo.'.id = '.$this->table.'.category_id');
        $this->db->from($this->table);
		$this->db->order_by($this->tableTwo.'.id', 'desc');
		$data = $this->db->get();
        
        return $data->result();
    }
}