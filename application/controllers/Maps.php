<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends MY_Controller {
	protected $title  = 'Maps';
	protected $entity  = 'maps';
	protected $model  = 'Maps_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Maps_Model');
	}
	
}