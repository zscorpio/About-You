<?php
 session_start();
 class Twitter extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('twitter/callback');
		redirect('admin/info');
	}	
	
}	