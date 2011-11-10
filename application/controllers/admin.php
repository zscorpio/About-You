<?php

 class Admin extends CI_Controller {
	function __construct()
	{
	  parent::__construct();
	  if (! $this->session->userdata('uid')){
		redirect('index');
		die;
		}
	}
	
	function index()
	{
	    $data['page_title']='后台';
		$data['qq'] = $this->mqq->url();		
		$data['weibo'] = $this->mweibo->url();
		$data['renren'] = $this->mrenren->url();
		$data['msn'] = $this->mmsn->url();		
		$data['account']=$this->madmin->account();
		$data['info'] = $this->madmin->info();
		$data['qq_exit'] = $this->madmin->qq();		
		$data['fb_exit'] = $this->madmin->fb();		
		$data['gg_exit'] = $this->madmin->gg();		
		$data['twitter_exit'] = $this->madmin->twitter();		
		$data['weibo_exit'] = $this->madmin->weibo();		
		$data['douban_exit'] = $this->madmin->douban();		
		$data['txwb_exit'] = $this->madmin->txwb();		
		$data['renren_exit'] = $this->madmin->renren();		
		$data['msn_exit'] = $this->madmin->msn();		
 	    $this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
			
 	function info()
 	{
		$data['page_title']='蝎紫の网络名片';
		$data['info'] = $this->madmin->info();
		$data['qq'] = $this->madmin->qq();
		$data['fb'] = $this->madmin->fb();
		$data['gg'] = $this->madmin->gg();
		$data['twitter'] = $this->madmin->twitter();
		$data['weibo'] = $this->madmin->weibo();
		$data['douban'] = $this->madmin->douban();
		$data['txwb'] = $this->madmin->txwb();
		$data['renren'] = $this->madmin->renren();
		$data['msn'] = $this->madmin->msn();
		$data['others'] = $this->madmin->others();
		$data['links'] = $this->madmin->links();
		$this->load->view('header',$data);
		$this->load->view('nav');
		$this->load->view('content',$data);
 		$this->load->view('footer');
	}
	
	function update()
	{
		if($this->madmin->update()){
			echo 'sucess';		
		} else {
			echo 'failed';
		}
	}
	
	function add_account()
	{
		if($this->madmin->add_account()){
			echo 'sucess';		
		} else {
			echo 'failed';
		}
	}
	
	function add_links()
	{
		if($this->madmin->add_links()){
			echo 'sucess';		
		} else {
			echo 'failed';
		}		
	}
	
	function edit_info()
	{	
		if($this->madmin->edit_info()){
			echo 'sucess';		
		} else {
			echo 'failed';
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('index');
	}
}	