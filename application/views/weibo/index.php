<?php

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
if (isset($_REQUEST['code'])) {
	$keys = array();
	$keys['code'] = $_REQUEST['code'];
	$keys['redirect_uri'] = WB_CALLBACK_URL;
	try {
		$token = $o->getAccessToken( 'code', $keys ) ;
	} catch (OAuthException $e) {
	}
}
$_SESSION['token'] = $token;
setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
$ms  = $c->home_timeline();
$uid_get = $c->get_uid();
$wb_id = $uid_get['uid'];
$user_message = $c->show_user_by_id($wb_id);
$link = $user_message['domain'];
$wb_screen_name = $user_message['screen_name'];
$wb_avatar_large = $user_message['avatar_large'].'jpg';
if ($this->session->userdata('uid')){
	$this->db->where('account_id', $wb_id);
	$this->db->where('name', 'weibo');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data1['uid'] = $this->session->userdata('uid');
		$data1['account_id'] = $wb_id;
		$data1['avatar'] = $wb_avatar_large;
		$data1['account'] = $wb_screen_name;
		$data1['link'] = 'http://weibo.com/'.$link;
		$data1['name'] = 'weibo';
		$this->db->insert('accounts',$data1);
	}else{
		$row = $q->row();
		$uid = $row->uid;
		$data1['uid'] = $this->session->userdata('uid');
		$this->db->where('uid', $uid);
		$this->db->update('accounts',$data1);		
	}
}else{
	$this->db->where('account_id', $wb_id);
	$this->db->where('name', 'weibo');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data['name'] = $wb_screen_name;
		$data['avatar'] = $wb_avatar_large;
		$this->db->insert('user',$data);
		$uid = mysql_insert_id();
		$data1['uid'] = $uid;
		$data1['account_id'] = $wb_id;
		$data1['avatar'] = $wb_avatar_large;
		$data1['account'] = $wb_screen_name;
		$data1['link'] = 'http://weibo.com/'.$link;
		$data1['name'] = 'weibo';
		$this->db->insert('accounts',$data1);
	}else{
		$row = $q->row();
		$uid = $row->uid;
	}
	$session['uid']=$uid;
	$this->session->set_userdata($session);
}		