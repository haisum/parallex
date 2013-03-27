<?php
class SettingDetail
{
	public static function getSettingVars(){
		$data = array(
			'androidApp' => Yii::app()->setting->get("mobile-android-app"),
			'iphoneApp' => Yii::app()->setting->get("mobile-iphone-app"),
			'facebookProfile' => Yii::app()->setting->get("facebook-profile"),
			'linkedinProfile' => Yii::app()->setting->get("linkedin-profile"),
			'twitterProfile'=> Yii::app()->setting->get("twitter-profile"),
			'liveStreamUrl' => Yii::app()->setting->get("live-streaming-url"),
			'googlePlusProfile' =>  Yii::app()->setting->get("google-plus-profile"),
			'rssFeedUrl' => Yii::app()->setting->get("rss-feed-url"),
		);
		return $data;
	}
}