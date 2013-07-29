<?php

class TopicController extends Controller
{
	public function actionView($id)
	{
		$topic=Topic::model()->findByPk($id);
		if($topic===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->render('view', array(
			'topic'=>$topic
		));
	}
}