<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemSubcategory extends MY_Controller {
	protected $title  = 'Item SubCategories';
	protected $entity  = 'item_subcategory';
	protected $model  = 'ItemSubcategory_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemSubcategory_Model');
	}

	public function add_get() {

        $settings = SETTINGS;

		$categories = $this->model()->item_category();
        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
            'userdata' => dataSession(),
            'categories' => $categories
        ];

		return view($this->entity.'.add', $data);
	}
	
	public function edit_get($id) {
        $settings = SETTINGS;

		$dataset = $this->model()->find($id);
		$categories = $this->model()->item_category();

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
			'dataset' => $dataset,
			'categories' => $categories
        ];

        return view($this->entity.'.edit', $data);
    }
	
}