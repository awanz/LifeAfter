<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends MY_Controller {
	protected $title  = 'Recipes';
	protected $entity  = 'recipes';
	protected $model  = 'Recipes_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Recipes_Model');
	}
	
}