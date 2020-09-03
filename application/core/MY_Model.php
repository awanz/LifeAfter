<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {

    private function all()
	{
        $this->db->from($this->table);
        $this->db->order_by('id', 'desc');
        $data = $this->db->get();
        return $data->result();
    }
    
    private function find($id)
	{
        $data = $this->db->get_where($this->table, array('id' => $id));
        return $data->first_row();
    }
    
    private function add($data)
	{
        $data['created_by'] = $this->session->userdata('user_data')['user_id'];
        $data['update_by'] = $this->session->userdata('user_data')['user_id'];

        $this->db->insert($this->table, $data);
        
        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    private function edit($id, $data)
	{
        $data['created_by'] = $this->session->userdata('user_data')['user_id'];
        
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        
        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    private function disable($id)
	{
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update($this->table);

        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    private function enable($id)
	{
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update($this->table);

        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    private function status($id, $status)
	{
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update($this->table);

        if ($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}