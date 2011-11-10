<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh_CN" lang="zh_CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="蝎紫の网络名片">
	<meta name="author" content="蝎紫">
	<meta name="keywords" content="蝎紫,名片,在线">
	<title><?=$page_title ?></title>
	<link rel="stylesheet" href="<?=base_url()?>css/style.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="<?=base_url()?>img/favicon.ico">
	<script src="<?=base_url()?>js/jquery-1.6.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>js/jquery.tab.js" type="text/javascript" charset="utf-8"></script>
	<base href="<?=base_url()?>"/>
</head>
<body>
	<div id="container">
		<div id="header">
		<?foreach ($info as $row):?>	
			<h1><?=$row->name ?></h1>
			<p id="describe"><?=$row->describe ?></p>
			<p id="photo"><img src="<?=base_url()?>img/photo.png" width="80" height="80"/></p>
		<?endforeach;?>	
		</div>