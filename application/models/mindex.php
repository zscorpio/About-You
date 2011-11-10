<?php

	class Mindex extends CI_Model {
		function __construct()
        {
			parent::__construct();
			include_once( 'weibo/config.php' );
			include_once( 'weibo/saetv2.ex.class.php' );
        }
		
		function weibo_login()
		{
			$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
			$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
			return $code_url;
		}
			
	}	
