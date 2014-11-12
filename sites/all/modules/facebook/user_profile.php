<?php

function user_profile($user_id='')
{
	require_once("src/src/facebook.php"); // set the right path
	require_once("fb_config.php");
	require_once("src/src/facebook.php"); 
	$config = array();
	$config['appId'] = '210927092271626';
	$config['secret'] = '4ba0f4e33582e8bf484c4d91290f9e57';
	$config['cookie'] = true;
	$config['oauth'] = true;
	$fb = new Facebook($config);
	if($user_id=='')
	{
		echo $user_id = $fb->getUser();
	}
	$access_token = $fb->getAccessToken();
	try{
		// echo "<pre>";
		$me = $fb->api('/'.$user_id.'/','GET',array('access_token'=>$access_token));
		// print_r($me);
		$user['fname']=$me['first_name'];
		$user['lname']=$me['last_name'];
		$user['email']=$me['email'];//chnage as per fb name
		$user['url']=$me['username'];
		$user['country']=$me['country'];//chnage as per fb name
		$user['birth']=$me['birthdate'];//chnage as per fb name
		$user['location']=$me['location']['name'];
		$user['workAt']=$me['work'][0]['employer']['name'];
		$user['workPos']=$me['work'][0]['position']['name'];
		$user['workStart']=$me['work'][0]['start_date'];
		$user['workEnd']=$me['work'][0]['end_date'];
		$user['gender']=$me['gender'];
		$user['fb']=$me['id'];
		$max=(count($me['education'])-1);
		$user['shool']=$me['education'][$max]['school']['name'];
		$user['degree']=$me['education'][$max]['concentration'][0]['name'];
		$user['eduStrt']=$me['education'][$max]['year']['name'];
		return $user;
	}
	catch (Exception $e)
	{
		print_r($e);
		 //echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$params = array(
		  'redirect_uri' => 'http://'.$_SERVER['HTTP_HOST'].'/fbapp/apply_job.php',
		  'scope'=>'offline_access');
		$loginUrl = $fb->getLoginUrl($params);
		if($_REQUEST['error']!="access_denied")
		{
			echo '<a href="'.$loginUrl.'">Click</a>';
			//header("location: ".$loginUrl);
			//die($loginurl);
		}else
		{
			return "user refused";
		}
	}
}