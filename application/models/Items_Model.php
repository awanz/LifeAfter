<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Items_Model extends MY_Model {
	protected $table = 'items';
	protected $tableTwo = 'item_categories';
	protected $tableThree = 'item_subcategories';

	public function all()
	{
		$this->db->select($this->table.'.id');
		$this->db->select($this->table.'.name');
		$this->db->select($this->tableTwo.'.name as category');
		$this->db->join($this->tableTwo, $this->tableTwo.'.id = '.$this->table.'.subcategory_id');
        $this->db->from($this->table);
		$this->db->order_by($this->tableTwo.'.id', 'desc');
		$data = $this->db->get();
        
        return $data->result();
    }
	
	public function getCategories()
	{
		$this->db->select($this->tableTwo.'.id');
		$this->db->select($this->tableTwo.'.name');
		$this->db->from($this->tableTwo);
		$this->db->order_by($this->tableTwo.'.name', 'asc');
		$data = $this->db->get();
        
        return $data->result();
    }
	
	public function getSubcategories($id = null)
	{
		$this->db->select($this->tableThree.'.id');
		$this->db->select($this->tableThree.'.name as text');
		$this->db->from($this->tableThree);
		$this->db->order_by($this->tableThree.'.name', 'asc');
		if ($id != "all") {
			$this->db->where('item_category_id', $id);
		}
		$data = $this->db->get();
        
        return $data->result();
    }
}