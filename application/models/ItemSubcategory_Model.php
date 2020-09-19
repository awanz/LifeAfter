<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ItemSubcategory_Model extends MY_Model {

	protected $table = 'item_subcategories';

	public function all()
	{
		$this->db->select('a.id, b.name as category_name , a.name, a.is_active');
		$this->db->from($this->table . " a");
		$this->db->join('item_categories b', 'b.id = a.item_category_id');
		
        $this->db->order_by('a.id', 'desc');
        $data = $this->db->get();
        return $data->result();
	}
	
	public function item_category()
	{
        $this->db->from('item_categories');
        $this->db->order_by('name', 'asc');
        $data = $this->db->get();
        return $data->result();
    }
}