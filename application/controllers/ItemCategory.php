<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemCategory extends MY_Controller {
	protected $success = true;
	protected $message = '';
	protected $title  = 'Item Categories';
	protected $entity  = 'item_category';
	protected $model  = 'ItemCategory_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemCategory_Model');
	}
	
}