<html>
<head></head>
<body>
<div id="fb-root"></div>
<script src="../../js/jquery.min.js" type="text/javascript"></script>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '192001120985592',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });
  
  FB.Event.subscribe('auth.authResponseChange', function(response) {
		// Here we specify what we do with the response anytime this event occurs. 
		if (response.status === 'connected') {
		  testAPI();
		} else if (response.status === 'not_authorized') {
		  FB.login();
		} else{
			FB.login();
		}
    
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
		// alert();
		$('#data').text(JSON.stringify(response));
      console.log('Good to see you, ' + response.name + '.');
    });
	
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses the JavaScript SDK to
  present a graphical Login button that triggers the FB.login() function when clicked. -->

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
<div id="data">

</div>
</body>
</html>