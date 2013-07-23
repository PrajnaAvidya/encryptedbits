<?
$this->breadcrumbs=array(
	'Create Account',
);
?>

<h1>Create Account</h1>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

Note: it is your responsibility to pick a strong password. This password will only be used to login to your account, and not to encrypt or decrypt individual entries.

<div class="row">
	<?php echo $form->labelEx($user,'username'); ?>
	<?php echo $form->textField($user,'username',array('size'=>60,'maxlength'=>32)); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($user,'password'); ?>
	<?php echo $form->passwordField($user,'password',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($user,'password (verify)', array('required'=>true)); ?>
	<?php echo $form->passwordField($user,'password_verify',array('size'=>32,'maxlength'=>32,'value'=>'')); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Register'); ?>
</div>

<?php $this->endWidget(); ?>
