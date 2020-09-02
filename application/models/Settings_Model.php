<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_Model extends MY_Model {
    protected $table = 'settings';
    
    public function all()
	{
        $this->db->from($this->table);
        $data = $this->db->get();
        return $data->result();
    }

    public function edit($data)
	{
           
        $this->db->where('code', '2w4n');
        $this->db->update($this->table, $data);
        
        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}