<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemPrices extends MY_Controller {
	protected $title  = 'Item Prices';
	protected $entity  = 'item_prices';
	protected $model  = 'ItemPrices_Model';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemPrices_Model');
	}
	
}