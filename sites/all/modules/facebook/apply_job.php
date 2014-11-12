<?php
	// print_r($_REQUEST);die();
	$id=$_GET['id'];
	require_once("../dbconnect.php");
	require_once("src/src/facebook.php"); // set the right path
	require_once("fb_confing.php"); // set the right path
	$fb=config();
	//print_r($fb);
	$user=$fb->getUser();
	if($user)
	{
		$sql="select js_id from jobseekers where facebook_id='".$user."'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$rs=mysql_fetch_object($rs);
			$js_id=$rs->js_id;
			$strdate = date('d-M-Y');
			$sql_query_date= "UPDATE jobseekers SET js_last_login= '$strdate' WHERE js_id= '$js_id'";
			$result_date= mysql_query($sql_query_date) or die(mysql_error());
			$_SESSION['jsid']=$js_id;
			header("location: ../search-detail.php?id=".$id."");
		}
		else
		{
			$_SESSION['add_fbuser']=$user;
			header("location: ../search-detail.php?id=".$id."");
		}
	}
	else
	{
		if($_REQUEST['error']!="access_denied")
		{
			$params = array(
			  'redirect_uri' => 'http://www.creativefisher.com/facebook/apply_job.php?id='.$id,
			  'scope'=>'offline_access');
			$loginUrl = $fb->getLoginUrl($params);
			header("location: ".$loginUrl);
		}
		else
		{
			header("location: ../search-detail.php?id=".$id."");
		}
	}
?>