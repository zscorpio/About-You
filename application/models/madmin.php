<?php

	class Madmin extends CI_Model {
		function __construct()
		{
			parent::__construct();
			include_once( 'weibo/config.php' );
			include_once( 'weibo/saetv2.ex.class.php' );
		}
				
		function account()
		{
			$uid = $this->session->userdata('uid');
			$query=$this->db->query("select * from accounts WHERE uid = $uid");
			return $query->result();
		}
		
		function update()
		{
			$uid = $this->session->userdata('uid');
			$account_id=$this->input->post('account_id');	
			$data['account']=$this->input->post('account');
			$data['link']=$this->input->post('link');
			$this->db->where('account_id', $account_id);
			$this->db->where('uid', $uid);
			return $this->db->update('accounts', $data);
		}
		
		function add_account()
		{
			$data['uid']=$this->session->userdata('uid');
			$data['account']=$this->input->post('account');
			$data['link']=$this->input->post('link');
			$data['name']='others';
			return $this->db->insert('accounts', $data);
		}
		
		function add_links()
		{
			$data['uid']=$this->session->userdata('uid');
			$data['logo']=$this->input->post('logo');
			$data['name']=$this->input->post('name');
			$data['ex']=$this->input->post('ex');
			$data['link']=$this->input->post('link');
			return $this->db->insert('links', $data);
		}
		
		function edit_info()
		{
			$uid = $this->session->userdata('uid');
			$data['name']=$this->input->post('name');
			$data['describe']=$this->input->post('describe');
			$this->db->where('uid', $uid);
			return $this->db->update('user', $data);
		}
		
		function info()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM user WHERE uid = $uid");	
			return $query->result();
		}
		
		function qq()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'QQ' and uid = $uid");	
			return $query->result();
		}

		function fb()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'Facebook' and uid = $uid");	
			return $query->result();
		}

		function gg()
		{
			$uid = $this->session->userdata('uid');	
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'Google+' and uid = $uid");	
			return $query->result();
		}

		function twitter()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'Twitter' and uid = $uid");	
			return $query->result();
		}

		function weibo()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'weibo' and uid = $uid");	
			return $query->result();
		}

		function douban()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'douban' and uid = $uid");	
			return $query->result();
		}

		function txwb()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'txwb' and uid = $uid");	
			return $query->result();
		}
		
		function renren()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'renren' and uid = $uid");	
			return $query->result();
		}	

		function msn()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'msn' and uid = $uid");	
			return $query->result();
		}			

		function others()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM accounts WHERE name = 'others' and uid = $uid");	
			return $query->result();
		}
		
		function links()
		{
			$uid = $this->session->userdata('uid');
			$query = $this->db->query("SELECT * FROM links WHERE uid = $uid");	
			return $query->result();				
		}
}		