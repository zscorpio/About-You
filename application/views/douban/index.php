<?php
require('OAuth.php');
require('config.inc');
$oauth_token = $_REQUEST['oauth_token'];
session_start();
$oauth_token_secret = $_SESSION['request_token_secret'];
$consumer = new OAuthConsumer($api_key, $api_key_secret);
$request_token = new OAuthConsumer($oauth_token, $oauth_token_secret);
$acc_req = OAuthRequest::from_consumer_and_token($consumer, $request_token, "GET", $access_token_url);
$acc_req->sign_request($sig_method, $consumer, $request_token);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $acc_req->to_url());
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
$result=explode("=",$result);
$douban_id = $result[3];
$url = "http://api.douban.com/people/".$douban_id;
$obj = simplexml_load_file($url);
$name = $obj->title;
$name = ''.$name;
$a = $obj->link[1]->attributes();
$describe = $a[0];
$describe = ''.$describe;
$b = $obj->link[2]->attributes();
$avatar = $b[0];
if ($this->session->userdata('uid')){
	$this->db->where('account_id', $douban_id);
	$this->db->where('name', 'douban');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data1['uid'] = $this->session->userdata('uid');
		$data1['account_id'] = $douban_id;
		$data1['account'] = $name;
		$data1['link'] = $describe;
		$data1['name'] = 'douban';
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
	$this->db->where('account_id', $douban_id);
	$this->db->where('name', 'douban');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data['name'] = $name;
		$data['describe'] = $describe;
		$this->db->insert('user',$data);
		$uid = mysql_insert_id();
		$data1['uid'] = $uid;
		$data1['account_id'] = $douban_id;
		$data1['account'] = $name;
		$data1['link'] = $link;
		$data1['name'] = 'douban';
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
