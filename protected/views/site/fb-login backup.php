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
			echo $data['code'];	
		}
		else {
			echo "The request could not be verified.";
		}
	} else {
		echo '$_REQUEST is empty';
	}
	
	$app_id = "YOUR_APP_ID";
	$app_secret = "6a086b117fc04a462106e80c1b303cd2";
	$my_url = "YOUR_URL";

   session_start();
?>