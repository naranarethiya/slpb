<?php
	require_once("src/src/facebook.php"); // set the right path
	require_once("fb_config.php"); // set the right path
	
	$fb = config();
	$user_id = $fb->getUser();
	$access_token = $fb->getAccessToken();
	try{
		// echo "<pre>";
		$me = $fb->api('/'.$user_id,'GET',array('access_token'=>$access_token));
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
		// print_r($user);
		$_SESSION['fb_user']=$user;
		header('location: ../js_registration.php');
	}
	catch (Exception $e)
	{
		// echo $e;
		$params = array(
		  'redirect_uri' => 'http://www.creativefisher.com/facebook/facebook.php',
		  'scope'=>'offline_access');
		$loginUrl = $fb->getLoginUrl($params);
		// echo"<a href='".$loginUrl."'>Retry</a>";
		if($_REQUEST['error']!="access_denied")
		{
			header("location: ".$loginUrl);
		}else
		{
			header('location: ../js_registration.php');
		}

	}
?>