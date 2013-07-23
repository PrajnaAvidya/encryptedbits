<script>
	$(document).on('submit', 'form', function() {
		var title = $('#Entry_title').val();
		var message = $('#Entry_entry').val();
		var password = $('#password').val();

		if (title == '')
		{
			alert('Please give your entry a title');
			return false;
		}

		if (message == '')
		{
			alert('Please enter a message to encrypt');
			return false;
		}

		if (password == '')
		{
			alert('Please enter a password');
			return false;
		}
		
		var encrypted = CryptoJS.AES.encrypt(message, password);

		$('#Entry_entry').val(encrypted);
		$('#password').val("");

		return true;
	});
</script>

<?php
$this->breadcrumbs=array(
	'Entries'=>array('list'),
	'Create',
);
?>

<h1>Create Entry</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'entry-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textAreaRow($model,'entry',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?=CHtml::label('Password (will be shown)', 'password')?>
<?=CHtml::textField('password', '')?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Create',
		'htmlOptions'=>array(
			'id'=>'create',
		),
	)); ?>
</div>

<?php $this->endWidget(); ?>

