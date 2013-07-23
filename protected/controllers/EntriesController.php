<?php

class EntriesController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete'
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','list','view','delete'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Entry;

		if(isset($_POST['Entry']))
		{
			$model->title = $_POST['Entry']['title'];
			$model->entry = $_POST['Entry']['entry'];

			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionList()
	{
		$dataProvider = new CActiveDataProvider( Entry::model()->userentries() );
		$dataProvider->sort->defaultOrder='timestamp DESC';

		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id,$validate_user=true)
	{
		if (!$validate_user)
			$model=Entry::model()->findByPk($id);
		else
			$model=Entry::model()->userentries()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
