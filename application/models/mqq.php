<?php

	class Mqq extends CI_Model {
		function __construct()
        {
			parent::__construct();
        }
		
		function url()
		{
			$url = "http://card.zscorpio.com/qq/oauth/redirect_to_login.php";
			return $url;
		}	
		
	}	
