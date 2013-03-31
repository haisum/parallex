<?php

/**
 * This is the model class for table "program" and additional functions to fetch data in application specific context.
 *
 * The followings are the available columns in table 'program':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $description
 * @property integer $imageId
 * @property string $timing
 * @property integer $status
 * @property string $type
 * @property string $upVotes
 * @property string $downVotes
 */
class ProgramDetail extends Program
{
	
	/**
	@returns array(
		id =>
			array(
				"name" => "...",
				"description" => "...",
				"likes" => n,
				"dislikes" => n,
				"url" => "...",
				"image" => "path/to/image",
				"timing" => "format: Day at Hour:Minutes AM/PM",
				"comments" => array(
					"name" => "...",
					"website" => "...",
					"email" => "...",
					"comment" => "...",
					"timing" => "format: Month date, year"
				)
			)
	)
	**/
	public function getPrograms($type){
		$programs = $this->with(array("image" , "comments"))->findAll("t.status = 1 AND t.type = " . $type);
		$tempPrograms = array();
		foreach($programs as $program){
			$temp["id"] = $program->id;
			$temp["name"] = $program->name;
			$temp["description"] = $program->description;
			$temp["likes"] = $program->upVotes;
			$temp["dislikes"] = $program->downVotes;
			$temp["url"] = $program->url;
			$temp["image"] = $program->image->path;
			$temp["timing"] = date("l, h:i A", strtotime($program->timing));
			$temp["timingDXB"] = date("l, h:i A", strtotime($program->timing . " +4 hours"));
			$tempComments = array();
			foreach($program->comments as $comment){
				$comment->postedTime = date("F jS, Y", strtotime($comment->postedTime));
				$tempComments[] = $comment;
			}
			$temp["comments"] = $tempComments;
			$tempPrograms[] = $temp;
		}
		$data["programs"] = $tempPrograms;
		return $data;
	}
}