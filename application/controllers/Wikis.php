<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wikis extends MY_Controller {
	protected $success = true;
	protected $message = '';
	protected $title  = 'Wiki';
	protected $entity  = 'wiki';
	protected $model  = 'Wikis_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wikis_Model');
	}
	
}