<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {
	protected $success = true;
	protected $message = '';
	protected $title  = 'Settings';
	protected $entity  = 'settings';
	protected $model  = 'Settings_Model';

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
    
    public function index() {
        $settings = SETTINGS;

        $dataset = $this->model()->all();

        if (empty($dataset)) {
            $this->session->set_flashdata(
                'alert_action', 
                '<div class="alert alert-danger" role="alert">
                    Data not found.
                </div>');
                redirect('dashboard','refresh');
        }

        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
            'userdata' => dataSession(),
            'dataset' => $dataset
        ];

        return view($this->entity.'.index', $data);
    }

    // public function edit_post() {
    //     if ($this->input->post()) {
    //         echo '<pre>';
    //         print_r($_POST);
    //         die();
    //         foreach($this->input->post() as $key => $value){
    //             $data[$key] = htmlspecialchars($value);
    //         }
    //         $result = $this->model()->edit($data);
    //         if ($result) {
    //             $this->session->set_flashdata(
    //                 'alert_action', 
    //                 '<div class="alert alert-success" role="alert">
    //                     Edit data successful.
    //                 </div>');
    //                 redirect($this->uri->segment(1),'refresh');
    //         }else{
    //             $this->session->set_flashdata(
    //                 'alert_action', 
    //                 '<div class="alert alert-warning" role="alert">
    //                     Edir data failed.
    //                 </div>');
    //                 redirect($this->uri->segment(1),'refresh');
    //         }
            
    //     }else{
    //         $this->session->set_flashdata(
    //             'alert_action', 
    //             '<div class="alert alert-warning" role="alert">
    //             Add data failed.
    //             </div>');
    //         redirect($this->uri->segment(1),'refresh');
    //     }    
    // }
	
}