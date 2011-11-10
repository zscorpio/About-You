<?php
	header("Content-type: text/html; charset=utf-8");
	$qq_id = $_GET['qq_id'];
	$nick = $_GET['nick'];
	$avatar = $_GET['avatar'];
	if ($this->session->userdata('uid')){
		$this->db->where('account_id', $qq_id);
		$this->db->where('name', 'qq');
		$q = $this->db->get('accounts');
		if (! $q->num_rows() > 0) {
			$data1['uid'] = $this->session->userdata('uid');
			$data1['account_id'] = $qq_id;
			$data1['account'] = $nick;
			$data1['avatar']  = $avatar;
			$data1['link'] = 'http://wpa.qq.com/msgrd?v=3&uin='.$qq_id.'&site=qq&menu=yes';
			$data1['name'] = 'qq';
			$this->db->insert('accounts',$data1);
		}else{
			$row = $q->row();
			$uid = $row->uid;
			$data1['uid'] = $this->session->userdata('uid');
			$this->db->where('uid', $uid);
			$this->db->update('accounts',$data1);	
			$data2['uid'] = $this->session->userdata('uid');			
			$this->db->where('uid', $uid);
			$this->db->update('links',$data2);			
		}
	}else{
		$this->db->where('account_id', $qq_id);
		$this->db->where('name', 'qq');
		$q = $this->db->get('accounts');
		if (! $q->num_rows() > 0) {
			$data['name'] = $nick;
			$data['avatar'] = $avatar;
			$this->db->insert('user',$data);
			$uid = mysql_insert_id();
			$data1['uid'] = $uid;
			$data1['account_id'] = $qq_id;
			$data1['account'] = $nick;
			$data1['avatar']  = $avatar;
			$data1['link'] = 'http://wpa.qq.com/msgrd?v=3&uin='.$qq_id.'&site=qq&menu=yes';
			$data1['name'] = 'qq';
			$this->db->insert('accounts',$data1);
		}else{
			$row = $q->row();
			$uid = $row->uid;
		}
		$session['uid']=$uid;
		$this->session->set_userdata($session);
	}	
	header("Location:http://card.zscorpio.com/index.php/admin/info");
?>