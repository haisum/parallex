<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		$this->layout = "//layouts/columnParallax";
		$model = new ProgramDetail;
		$settings = SettingDetail::getSettingVars();
		$programs = array(
			"music" => $model->getPrograms(Yii::app()->params["app"]["programTypes"]["music"]),
			"drama" => $model->getPrograms(Yii::app()->params["app"]["programTypes"]["drama"]),
			"shows" => $model->getPrograms(Yii::app()->params["app"]["programTypes"]["shows"])
		);
		$data = array(
			"fbJsSdk" => $this->renderPartial("fb-js-sdk", null, true),
			"static" => array(
				"music" => $this->renderPartial("static/music", $programs["music"], true),
				"drama" => $this->renderPartial("static/drama", $programs["drama"], true),
				"shows" => $this->renderPartial("static/shows", $programs["shows"], true),
				"schedule" => $this->renderPartial("static/schedule", $programs, true),
				"live" => $this->renderPartial("static/live", $settings, true),
				"mobile" => $this->renderPartial("static/mobile", $settings, true)
			),
			"pages" => array(
				"home"  => $this->renderPartial("pages/home", null, true),
				"login" => $this->renderPartial("pages/login", null, true),
				"register" => $this->renderPartial("pages/register", null, true)
			),
			'programs' => $programs,
			'settings' => $settings
		);

		$this->render('index', $data);
	}

	public function actionFbChannel(){
		$this->render("channel");
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			$response = CActiveForm::validate($model);
			if(isset($_POST['source']) && $_POST['source'] === 'site'){
				$message = json_decode($response, true);
				if(empty($message) && isset($_POST['LoginForm'])){
					$model->attributes=$_POST['LoginForm'];
					if($model->login()){
						$message["status"] = "ok";
						$message["name"] = Yii::app()->user->name;
					}
					else{
						$message["status"]	= "fail";
					}
				}
				else{
					$message["status"]	= "fail";
				}
				echo json_encode($message);
			}
			else{
				echo $response;
			}
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionRegister(){
		if(isset($_POST["User"])){
			$user = new User;
			$user->attributes = ($_POST["User"]);
			$user->registerDate = date("Y-m-d H:i:s", time());
			$user->lastLogin = $user->registerDate;
			$user->type = Yii::app()->params["app"]["userTypes"]["normal"];
			$response = CActiveForm::validate($user);
			$message["response"] = json_decode($response);
			if(empty($message["response"])){
				$user->save(false);
				$message["status"] = "ok";
			}
			else{
				$message["status"] = "fail";
			}
			echo json_encode($message);
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}