<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAbout()
	{
		$this->render('about');
	}

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

	public function actionRegister()
	{
		$user = new User;

		if(isset($_POST['User']))
		{
			$error_text = '';
			$errors = false;
			$password_hashed = '';

			// check if passwords match
			if (!isset($_POST['User']['password']) || $_POST['User']['password'] == '' || $_POST['User']['password'] !== $_POST['User']['password_verify'])
			{
				$errors = true;
				$error_text .= 'Passwords do not match.<br />';
			}
			else
				$password_hashed = CPasswordHelper::hashPassword($_POST['User']['password']);

			// set attributes
			$user->username = $_POST['User']['username'];
			$user->password = $password_hashed;

			if (!$errors && $user->save())
			{
				// log
				LogItem::log('Created user '.$user->username);

				Yii::app()->user->setFlash('success','Your account ('.$user->username.') has been created, you may now login.');
				$this->redirect(array('/site/login'));
			}
			else
			{
				foreach ($user->getErrors() as $error)
					$error_text .= $error[0].'<br />';
			}
			Yii::app()->user->setFlash('error',$error_text);
		}

		$this->render('register',array(
			'user'=>$user,
		));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

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

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
