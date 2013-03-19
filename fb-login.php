<?php
	/* Code from Facebook Developers -> Technical Guides › Login › Using the signed_request Parameter */
	function parse_signed_request($signed_request, $secret) {
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

	  // decode the data
	  $sig = base64_url_decode($encoded_sig);
	  $data = json_decode(base64_url_decode($payload), true);

	  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
		error_log('Unknown algorithm. Expected HMAC-SHA256');
		return null;
	  }

	  // Adding the verification of the signed_request below
	  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
	  if ($sig !== $expected_sig) {
		error_log('Bad Signed JSON signature!');
		return null;
	  }

	  return $data;
	}
	
	function base64_url_decode($input) {
	  return base64_decode(strtr($input, '-_', '+/'));
	}
	
	
	
	if ($_REQUEST) {
		$signed_request = $_REQUEST['signed_request'];
		if($data = parse_signed_request($signed_request, '6a086b117fc04a462106e80c1b303cd2')){
			$code = $data['code'];
			//print_r ($data . "\n");
		}
		else {
			echo "The request could not be verified.";
			exit();
		}
	} else {
		echo '$_REQUEST is empty';
		exit();
	}
	
	/* Code from Facebook Developers -> Technical Guides › Login › Login for Server-side Apps */
	
	$app_id = "111454652362194";
	$app_secret = "6a086b117fc04a462106e80c1b303cd2";
	$my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$my_url = ""; // this makes it work, don't know why, StackOverflow said so.
     
	session_start();
	
	if(!isset($_SESSION['access_token'])){
		$token_url = "https://graph.facebook.com/oauth/access_token?"
		   . "client_id=" . $app_id
		   . "&redirect_uri=" . urlencode($my_url)
		   . "&client_secret=" . $app_secret . "&code=" . $code;
		   
		echo $token_url;   

		$response = file_get_contents($token_url);
		//print_r($response);
		$params = null;
		parse_str($response, $params);
		$_SESSION['access_token'] = $params['access_token'];
	}
	
	$graph_url = "https://graph.facebook.com/me?access_token=" 
       . $_SESSION['access_token'];

    $user = json_decode(file_get_contents($graph_url));
	//print_r($user);
    echo("Hello " . $user->name);
?>