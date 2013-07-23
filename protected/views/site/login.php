<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

<?php echo $form->textFieldRow($model,'username'); ?>

<?php echo $form->passwordFieldRow($model,'password'); ?>

<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'Login',
    )); ?>
</div>

<?php $this->endWidget(); ?>
