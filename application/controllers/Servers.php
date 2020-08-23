<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servers extends MY_Controller {
	protected $success = true;
	protected $message = '';
	protected $title  = 'Servers';
	protected $entity  = 'servers';
	protected $model  = 'Servers_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Servers_Model');
	}
	
}