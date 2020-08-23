<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        if (isset($this->model)) {
            $this->load->model($this->model);
        }
	}

    private function model() {
        $modelName = $this->model;
		return $this->$modelName;
	}

    public function index()
    {
        $settings = SETTINGS;

        $dataset = null;
        if (isset($this->model)) {
            $dataset = $this->model()->all();
        }
        
        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
            'userdata' => dataSession(),
            'dataset' => $dataset
        ];

		return view($this->entity.'.index', $data);
    }

    public function disable($id)
    {

        $result = $this->model()->disable($id);
        if ($result) {
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-success" role="alert">
                    Disable data successful.
                </div>');
        }else{
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-warning" role="alert">
                    Disable data failed.
                </div>');
        }
        
        redirect($this->uri->segment(1),'refresh');
    }
    
    public function enable($id)
    {

        $result = $this->model()->enable($id);
        if ($result) {
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-success" role="alert">
                    Enable data successful.
                </div>');
        }else{
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-warning" role="alert">
                    Enable data failed.
                </div>');
        }
        
        redirect($this->uri->segment(1),'refresh');
    }
    
    public function status($id, $status)
    {

        $result = $this->model()->status($id, $status);
        if ($result) {
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-success" role="alert">
                    Update data successful.
                </div>');
        }else{
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-warning" role="alert">
                    Update data failed.
                </div>');
        }
        
        redirect($this->uri->segment(1),'refresh');
    }
    
    public function add_get() {

        $settings = SETTINGS;

        $dataset = $this->model()->all();
        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
            'userdata' => dataSession(),
            'dataset' => $dataset
        ];

		return view($this->entity.'.add', $data);
    }

    public function add_post() {
        if ($this->input->post()) {
            foreach($this->input->post() as $key => $value){
                $data[$key] = htmlspecialchars($value);
            }
            $result = $this->model()->add($data);
            if ($result) {
                $this->session->set_flashdata(
                    'alert_action', 
                    '<div class="alert alert-success" role="alert">
                        Add data successful.
                    </div>');
                    redirect($this->uri->segment(1),'refresh');
            }else{
                $this->session->set_flashdata(
                    'alert_action', 
                    '<div class="alert alert-warning" role="alert">
                    Add data failed.
                    </div>');
                    redirect($this->uri->segment(1)."/add",'refresh');
            }
            
        }else{
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-warning" role="alert">
                Add data failed.
                </div>');
            redirect($this->uri->segment(1)."/add",'refresh');
        }        
    }

    public function edit_get($id) {
        $settings = SETTINGS;

        $dataset = $this->model()->find($id);

        if (empty($dataset)) {
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-danger" role="alert">
                    Data not found.
                </div>');
                redirect($this->uri->segment(1),'refresh');
        }

        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
            'userdata' => dataSession(),
            'dataset' => $dataset
        ];

        return view($this->entity.'.edit', $data);
    }
    
    public function edit_post($id) {
        if ($this->input->post()) {
            foreach($this->input->post() as $key => $value){
                $data[$key] = htmlspecialchars($value);
            }
            $result = $this->model()->edit($id, $data);
            if ($result) {
                $this->session->set_flashdata(
                    'alert_action', 
                    '<div class="alert alert-success" role="alert">
                        Edit data successful.
                    </div>');
                    redirect($this->uri->segment(1),'refresh');
            }else{
                $this->session->set_flashdata(
                    'alert_action', 
                    '<div class="alert alert-warning" role="alert">
                        Edir data failed.
                    </div>');
                    redirect($this->uri->segment(1)."/edit",'refresh');
            }
            
        }else{
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-warning" role="alert">
                Add data failed.
                </div>');
            redirect($this->uri->segment(1)."/edit",'refresh');
        }    
    }
}
