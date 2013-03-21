<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		// init the FB JS SDK
		FB.init({
			appId      : '111454652362194', // App ID from the App Dashboard
			channelUrl : "<?php echo $this->createUrl('site/channel');?>", // Channel File for x-domain communication
			status     : true, // check the login status upon init?
			cookie     : true, // set sessions cookies to allow your server to access the session?
			xfbml      : true  // parse XFBML tags on this page?
		});

		// Additional initialization code such as adding Event Listeners goes here

		
	};
	
	function attemptFBLogin () {
		/*var signedRequest;
		FB.login(function(response) {
			console.log(response);
			if (response.authResponse) {
				// connected
				signedRequest = response.authResponse.signedRequest;
			} else {
				console.log("annnnder");
				// cancelled
				return;
			}
		} , {scope: 'email,user_likes'});

		$.post("fb-login.php",
		{
			signed_request: signedRequest
		},
		function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
		});*/
		var signedRequest;
		FB.getLoginStatus(function(response) {
			console.log(response);
			if (response.status === 'connected') {
				// connected
				signedRequest = response.authResponse.signedRequest;
			} else {
				// not_logged_in or not_authorized
				// open login popup
				//window.location = "https://www.facebook.com/dialog/oauth?client_id=111454652362194&redirect_uri=<?php echo Yii::app()->getBaseUrl(true); ?>&response_type=token&scope=email,user_likes";
				FB.login(function(response) {
					console.log(response);
					if (response.authResponse) {
						// connected
						signedRequest = response.authResponse.signedRequest;
					} else {
						console.log("annnnder");
						// cancelled
						return;
					}
				} , {scope: 'email,user_likes'});
			}
			
				console.log(signedRequest);
				$.post("fb-login.php",
				{
					signed_request: signedRequest
				},
				function(data,status){
					alert("Data: " + data + "\nStatus: " + status);
				});
			
		});
	}
  
	// Load the SDK's source Asynchronously
	// Note that the debug version is being actively developed and might 
	// contain some type checks that are overly strict. 
	// Please report such bugs using the bugs tool.
	(function(d, debug){
		var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
		ref.parentNode.insertBefore(js, ref);
	}(document, /*debug*/ false));
	
	$(function(){
		$('#fb-login-button').click( attemptFBLogin );
	});

</script>