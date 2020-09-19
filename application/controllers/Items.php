<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends MY_Controller {
	protected $success = true;
	protected $message = '';
	protected $title  = 'Items';
	protected $entity  = 'items';
	protected $model  = 'Items_Model';

	public function add_get() {

		$settings = SETTINGS;
		
		$categories = $this->model()->getCategories();
		$subcategories = $this->model()->getSubcategories('all');

        $data = [
            'title' =>  $this->title,
            'settings' =>  $settings,
			'userdata' => dataSession(),
			'categories' => $categories,
			'subcategories' => $subcategories
        ];

		return view($this->entity.'.add', $data);
	}
	
	public function add_post() {
        if ($this->input->post()) {
			$data = null;
            foreach($this->input->post() as $key => $value){
                $data[$key] = htmlspecialchars($value);
			}
			unset($data['category_id']);
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

	public function getCategory()
	{

		$categories = $this->model()->getCategories();
		print_r($categories);
	}
	
	public function getSubcategory($id = null)
	{
		$categories = $this->model()->getSubcategories($id);
		$data['results'] = $categories;
		echo json_encode($data);
	}

	
}