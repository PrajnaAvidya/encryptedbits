<script>
	$(document).on('submit', 'form', function() {
		var message = $('#Entry_entry').val();
		var password = $('#password').val();

		if (password == '')
		{
			alert('Please enter the password');
			return false;
		}

		var decrypted = CryptoJS.AES.decrypt(message, password);

		$('#Entry_entry').val(decrypted.toString(CryptoJS.enc.Utf8));
		$('#password').val("");
		$("#password").prop('disabled', true);
		$("#decrypt").prop('disabled', true);

		return false;
	});
</script>

<?php
$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->title,
);

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills',
    'items'=>array(
		array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Create New Entry', 'url'=>array('create')),
    ),
));
?>

<h1><?php echo $model->title; ?></h1>

<?=$model->timestamp?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'entry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->textAreaRow($model,'entry',array('rows'=>6, 'cols'=>50, 'class'=>'span8', 'readonly'=>true, 'style'=>'color:black;')); ?>

	<?=CHtml::label('Password', 'password')?>
	<?=CHtml::passwordField('password', '')?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Decrypt',
			'htmlOptions'=>array(
				'id'=>'decrypt'
			),
		)); ?>
	</div>

<?php $this->endWidget(); ?>