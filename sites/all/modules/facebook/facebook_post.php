<?php
require_once("src/src/facebook.php"); // set the right path
require_once("fb_config.php"); // set the right path

$fb = config();
 
$params = array(
  // this is the access token for Fan Page
  "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
  "link" => "www.creativefisher.com/jobs.php",
  "picture" => "http://www.sscsworld.com/blog/wp-content/uploads/2013/01/Joomla-CMS-Developer-300x245.jpg",
  "name" => "How to Auto Post on Facebook with PHP",
  "caption" => "www.creativefisher.com",
  "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);
 
try {
  $ret = $fb->api('/409927009067198/feed', 'POST', $params);
  echo 'Successfully posted to Facebook Fan Page';
} catch(Exception $e) {
  echo $e->getMessage();}
  ?>
  