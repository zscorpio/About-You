<?php
 class Renren extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('renren/index');
	}	
	
}	