<?php
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
$_SESSION['access_token'] = $access_token;
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
$_SESSION['status'] = 'verified';
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
$content = $connection->get('account/verify_credentials');
$twitter_id = $content->id_str;
$description = $content->description;
$screen_name = $content->screen_name;
$avatar = $content->profile_image_url;
if ($this->session->userdata('uid')){
	$this->db->where('account_id', $twitter_id);
	$this->db->where('name', 'twitter');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data1['uid'] = $this->session->userdata('uid');
		$data1['account_id'] = $twitter_id;
		$data1['account'] = $screen_name;
		$data1['avatar']  = $avatar;
		$data1['link'] = 'https://twitter.com/'.$screen_name;
		$data1['name'] = 'twitter';
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
	$this->db->where('account_id', $twitter_id);
	$this->db->where('name', 'twitter');
	$q = $this->db->get('accounts');
	if (! $q->num_rows() > 0) {
		$data['name'] = $screen_name;
		$data['avatar'] = $avatar;
		$this->db->insert('user',$data);
		$uid = mysql_insert_id();
		$data1['uid'] = $uid;
		$data1['account_id'] = $twitter_id;
		$data1['account'] = $screen_name;
		$data1['avatar']  = $avatar;
		$data1['link'] = 'https://twitter.com/'.$screen_name;
		$data1['name'] = 'twitter';
		$this->db->insert('accounts',$data1);
	}else{
		$row = $q->row();
		$uid = $row->uid;
	}
	$session['uid']=$uid;
	$this->session->set_userdata($session);
}	