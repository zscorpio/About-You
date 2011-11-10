<?php
 class Douban extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('douban/index');
	}	
	
}	