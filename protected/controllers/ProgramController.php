<?php

class ProgramController extends Controller
{
	public function actionComment()
	{
		if(isset($_POST["Comment"])){
			$comment = new Comment;
			$comment->attributes = $_POST["Comment"];
			$comment->postedTime = date("Y-m-d H:i:s", time());
			$response = CActiveForm::validate($comment);
			$message = array(
				'status' => 'fail',
				'comment' => ''
			);
			$message["response"] = json_decode($response);
			if(empty($message["response"])){
				$comment->comment = CHtml::encode($comment->comment);
				$comment->website = CHtml::encode($comment->website);
				$comment->name = CHtml::encode($comment->name);
				$comment->email = CHtml::encode($comment->email);
				$comment->save(false);
				$comment->postedTime = date("F jS, Y", strtotime($comment->postedTime));
				$message["comment"] = $this->renderPartial("//site/_comment", array("comment" => $comment), true);
				$message["status"] = "ok";
			}
			echo json_encode($message);
		}
		else{
			throw new CHttpException("403", "Bad Request");
		}
	}

	public function actionLike()
	{
		$response = array(
			"newCount" => 0,
			"status" => "fail"
		);
		$id = intval($_POST["id"]);
		if(Yii::app()->request->isPostRequest && !Yii::app()->session->contains("like_$id") && !Yii::app()->request->cookies->contains("c_like_$id")){
			$response["status"] = "inside";
			$program = Program::model()->findByPk($id);
			if($program){
				if($_POST["type"] === "like"){
					$program->upVotes += 1;
					$response["newCount"] = $program->upVotes;
				}
				else if($_POST["type"] === "dislike"){
					$program->downVotes += 1;	
					$response["newCount"] = $program->downVotes;
				}
				$response["status"] = "ok";
				$program->save(false);				
				Yii::app()->session["like_$id"] = $_POST["type"];
				Yii::app()->request->cookies["c_like_$id"] = new CHttpCookie("c_like_$id", $_POST["type"], array(
					"httpOnly" => true,
					"expire" => time() + 3600*24*30*12
				));
			}
			else{
				throw new CHttpException("403", "Bad Request");
			}
		}
		echo json_encode($response);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}