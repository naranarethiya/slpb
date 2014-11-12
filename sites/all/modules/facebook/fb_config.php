<?php
function config()
{
	require_once("src/src/facebook.php"); 
	$config = array();
	$config['appId'] = '210927092271626';
	$config['secret'] = '4ba0f4e33582e8bf484c4d91290f9e57';
	$config['cookie'] = true;
	$config['oauth'] = true;
	$fb = new Facebook($config);
	return $fb;
}

?>