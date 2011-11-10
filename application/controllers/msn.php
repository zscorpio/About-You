<?php
 class Msn extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('msn/index');
	}	

	function msn()
	{
		$this->load->view('msn/msn');
	}		
	
}	