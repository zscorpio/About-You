<?php

	class Mrenren extends CI_Model {
		function __construct()
        {
			parent::__construct();
        }
		
		function url()
		{
			$url = 'https://graph.renren.com/oauth/authorize?response_type=code&client_id=20a798f9ca034b998f9e38f45df483ac&redirect_uri=http%3A%2F%2Fcard.zscorpio.com%2Frenren%2Findex.php';
			return $url;
		}	
		
	}	
