<?php
 session_start();
 class Weibo extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('weibo/index');
		redirect('admin/info');
	}	
	
}	