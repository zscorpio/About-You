<?php
 session_start();
 class Index extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['page_title']='名片';
		$data['weibo'] = $this->mweibo->url();
		$data['renren'] = $this->mrenren->url();
		$data['msn'] = $this->mmsn->url();
		$data['qq'] = $this->mqq->url();
		$this->load->view('head',$data);
		if ($this->session->userdata('uid')){
			redirect('admin/info');
		}else{
			$this->load->view('index',$data);
 		}
		$this->load->view('foot');
	}
	
	function twitter()
	{
		$this->load->view('twitter/redirect');		
	}
	
}	