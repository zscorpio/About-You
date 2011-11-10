<?php
header("Content-type: text/html; charset=utf-8");
$msn_id = $_GET["id"];
$name = $_GET["name"];
$link = $_GET["link"];
if ($this->session->userdata('uid')){
	$this->db->where('account_id', $msn_id);
	$this->db->where('name', 'msn');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data1['uid'] = $this->session->userdata('uid');
		$data1['account_id'] = $msn_id;
		$data1['account'] = $name;
		$data1['link'] = $link;
		$data1['name'] = 'msn';
		$this->db->insert('account',$data1);
	}else{
		$row = $q->row();
		$uid = $row->uid;
		$data1['uid'] = $this->session->userdata('uid');
		$data1['name'] = 'msn';
		$this->db->where('uid', $uid);
		$this->db->update('accounts',$data1);
		$data2['uid'] = $this->session->userdata('uid');			
		$this->db->where('uid', $uid);
		$this->db->update('links',$data2);
		
	}
}else{
	$this->db->where('account_id', $msn_id);
	$this->db->where('name', 'msn');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data['name'] = $name;
		$data['describe'] = $link;
		$this->db->insert('user',$data);
		$uid = mysql_insert_id();
		$data1['uid'] = $uid;
		$data1['account_id'] = $msn_id;
		$data1['account'] = $name;
		$data1['link'] = $link;
		$data1['name'] = 'msn';
		$this->db->insert('accounts',$data1);
	}else{
		$row = $q->row();
		$uid = $row->uid;
	}
	$session['uid']=$uid;
	$this->session->set_userdata($session);
}	
?>