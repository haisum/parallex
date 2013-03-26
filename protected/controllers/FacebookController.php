<?php

class FacebookController extends Controller
{
	public function actionIndex()
	{		
		
		$app_id = Yii::app()->setting->get("facebook-app-id");
		$app_secret = Yii::app()->setting->get("facebook-app-secret");
		if ($_REQUEST) {
			$signed_request = $_REQUEST['signed_request'];
			if($data = $this->parse_signed_request($signed_request, $app_secret)){
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
		
		$my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$my_url = ""; // this makes it work, don't know why, StackOverflow said so.
		
		if(!Yii::app()->session["access_token"]){
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			   . "client_id=" . $app_id
			   . "&redirect_uri=" . urlencode($my_url)
			   . "&client_secret=" . $app_secret . "&code=" . $code;
			$response = file_get_contents($token_url);
			//print_r($response);
			$params = null;
			parse_str($response, $params);
			Yii::app()->session["access_token"] = $params['access_token'];
		}
		
		$graph_url = "https://graph.facebook.com/me?access_token=" 
	       . Yii::app()->session["access_token"];
	    $response = file_get_contents($graph_url);
	    $user = json_decode($response);
	    $this->authenticate($user);	    
	}

	/* Code from Facebook Developers -> Technical Guides › Login › Using the signed_request Parameter */
	function parse_signed_request($signed_request, $secret) {
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

	  // decode the data
	  $sig = $this->base64_url_decode($encoded_sig);
	  $data = json_decode($this->base64_url_decode($payload), true);

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
	
	function authenticate($fbUser){
		$message = array("status" => "fail");
		if(isset($fbUser->email)){
			$users = User::model()->findAll("email = :email" , array(":email" => $fbUser->email));
			$user = null;
			if(count($users) == 0){
				$user = new User;
				$user->firstName = $fbUser->first_name;
				$user->lastName = $fbUser->last_name;
				$user->website = isset($fbUser->website) ? $fbUser->website : $fbUser->link;
				$user->address = $fbUser->hometown->name;
				$user->email = $fbUser->email;
				$user->birthday = date("Y-m-d H:i:s" ,strtotime($fbUser->birthday));
				$user->password = time() . rand();
				$user->lastLogin = date("Y-m-d H:i:s" , time());
				$user->registerDate = $user->lastLogin;
				$user->type = Yii::app()->params["app"]["userTypes"]["normal"];
				$user->save(false);
			}
			else{
				$user = $users[0];
			}
			$userIdentity = new UserIdentity($user->email,$user->password);
			$response = $userIdentity->authenticate();
			if($response){
				$message["status"] = "ok";
				$message["name"] = $fbUser->name;
			}
		}
		else{
			$message["response"] = $fbUser;
		}
		echo json_encode($message);
	}
}