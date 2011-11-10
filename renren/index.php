<?php
	header("Content-type: text/html; charset=utf-8");
	require_once 'requires.php';
	$oauth = new RenRenOauth();
	$code = $_GET['code'];
	$token = $oauth->getAccessToken($code);
	$userinfo=json_encode($token);
	$obj = json_decode($userinfo);
	$avatar = $obj->user->avatar;
	$avatar = get_object_vars($avatar[0]);
	$renren_id = $obj->user->id;
	$nick = $obj->user->name;
	$avatar = $avatar['url'];
	header("Location:http://card.zscorpio.com/index.php/renren/index?renren_id=$renren_id&nick=$nick&avatar=$avatar");
?>