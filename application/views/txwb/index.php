<?php
error_reporting('0');
set_include_path(dirname(dirname(__FILE__)) . '/lib/');
require_once 'OpenSDK/Tencent/Weibo.php';
include 'appkey.php';
OpenSDK_Tencent_Weibo::init($appkey, $appsecret);
$exit = false;
if(isset($_GET['exit']))
{
	unset($_SESSION[OpenSDK_Tencent_Weibo::OAUTH_TOKEN]);
	unset($_SESSION[OpenSDK_Tencent_Weibo::ACCESS_TOKEN]);
	unset($_SESSION[OpenSDK_Tencent_Weibo::OAUTH_TOKEN_SECRET]);
	echo '<a href="?go_oauth">点击去授权</a>';
}
else if(isset($_SESSION[OpenSDK_Tencent_Weibo::ACCESS_TOKEN]) && isset($_SESSION[OpenSDK_Tencent_Weibo::OAUTH_TOKEN_SECRET]))
{
	redirect('admin/info');	
	$exit = true;
}
else if( isset($_GET['oauth_token']) && isset($_GET['oauth_verifier']))
{
	if(OpenSDK_Tencent_Weibo::getAccessToken($_GET['oauth_verifier']))
	{
		$uinfo = OpenSDK_Tencent_Weibo::call('user/info');
		var_dump($uinfo);
		$userinfo=json_encode($uinfo);
		$obj = json_decode($userinfo);  
		$txwb_id = $_GET["openid"];
		$description = $obj->data->verifyinfo;
		$nick = $obj->data->nick;
		$name = $obj->data->name;
		$avatar = $obj->data->head;
		if ($this->session->userdata('uid')){
			$this->db->where('account_id', $txwb_id);
			$this->db->where('name', 'txwb');
			$q = $this->db->get('accounts');
			if (! $q->num_rows() > 0) {
				$data1['uid'] = $this->session->userdata('uid');
				$data1['account_id'] = $txwb_id;
				$data1['account'] = $nick;
				$data1['avatar']  = $avatar;
				$data1['link'] = 'http://t.qq.com/'.$name;
				$data1['name'] = 'txwb';
				$this->db->insert('accounts',$data1);
			}else{
				$row = $q->row();
				$uid = $row->uid;
				$data1['uid'] = $this->session->userdata('uid');
				$data1['name'] = 'txwb';
				$this->db->where('uid', $uid);
				$this->db->update('accounts',$data1);
				$data2['uid'] = $this->session->userdata('uid');			
				$this->db->where('uid', $uid);
				$this->db->update('links',$data2);				
			}
		}else{
			$this->db->where('account_id', $txwb_id);
			$this->db->where('name', 'txwb');
			$q = $this->db->get('accounts');
			if (! $q->num_rows() > 0) {
				$data['name'] = $name;
				$data['avatar'] = $avatar;
				$this->db->insert('user',$data);
				$uid = mysql_insert_id();
				$data1['uid'] = $uid;
				$data1['account_id'] = $txwb_id;
				$data1['account'] = $nick;
				$data1['avatar']  = $avatar;
				$data1['link'] = 'http://t.qq.com/'.$name;
				$data1['name'] = 'txwb';
				$this->db->insert('accounts',$data1);
			}else{
				$row = $q->row();
				$uid = $row->uid;
			}
			$session['uid']=$uid;
			$this->session->set_userdata($session);
		}	
		redirect('admin/info');			
	}
	else
	{
		var_dump($_SESSION);
		echo '获得Access Tokn 失败';
	}
	$exit = true;
}
else if(isset($_GET['go_oauth']))
{
	$callback = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	$request_token = OpenSDK_Tencent_Weibo::getRequestToken($callback);
	$url = OpenSDK_Tencent_Weibo::getAuthorizeURL($request_token);
	header('Location: ' . $url);
}
else
{
	echo '<a href="?go_oauth">点击去授权</a>';
}