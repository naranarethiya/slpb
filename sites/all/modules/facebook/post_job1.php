<?php
	function post_job($msg,$link,$pic,$title,$caption,$dec)
	{
		require_once("src/src/facebook.php"); // set the right path
		require_once("fb_config.php"); // set the right path
		$config = array();
		$config['appId'] = '210927092271626';
		$config['secret'] = '4ba0f4e33582e8bf484c4d91290f9e57';
		$config['cookie'] = true;
		$config['oauth'] = true;
		$fb = new Facebook($config);
		$user_id="526043463";
		$me = $fb->api('/'.$user_id,'GET',array('access_token'=>$access_token));
		$access_token='CAACZC1kpoigoBAKr0QTMh5DX751iIUZB1yo9ZBBVawsYKb3Q4lb7AHuaXidzTaK0xCbEadcIB4UsNZCUIEgu0z0a0YoVXJqIxbZCGIv9PRckhMmrR92GNxZCXcN34fADiH1rWO2dztlfmdmeoFwsOL5lMWrgGKUCeJie8kDpYb03UlAQE8JAb8';
		$acess=$fb->api('/'.$user_id.'/accounts','GET',array('access_token'=>$access_token));
		print_r();
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
			echo $e;
		}
	}
?>