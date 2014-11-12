<?php
	$i=0;
	function post_job($msg,$link,$pic,$title,$caption,$dec)
	{
		require_once("src/src/facebook.php"); // set the right path
		require_once("fb_config.php"); // set the right path
		
		$fb = config();
		$user_id="100001738715343";
		$access_token='CAACZC1kpoigoBAGtCtAiWWF6ZB3RQxF3g8m5oobriQ5I5qH16fgDztDhmnFV6mVC5qNRrJTlEHrWM9V6J7rxvZCegOI9kkTZApg1pXCbMiFtOGZAtwRr8y26OFRKkG8fNQS7R1uIjcc9f0KS9LfdYRXlyMR3eMUd34zberlrpwxtt5Q6PZAzuEjvfSn6BDP8EZD';
		$acess=$fb->api('/'.$user_id.'/accounts','GET',array('access_token'=>$access_token));
		$page_token=$acess['data'][0]['access_token'];
		//print_r($acess);
		$params = array(
	  //this is the access token for Fan Page
		  "access_token"=>$page_token,
		  "message" => $msg,
		  "link" => $link,
		  "picture" => $pic,
		  "name" => $title,
		  "caption" => $caption,
		  "description" => $dec);
	  try {
			$ret = $fb->api('/182606618532183/feed', 'POST', $params);
		}catch (Exception $e){
			post_job($msg,$link,$pic,$title,$caption,$dec);
		}
	}
?>