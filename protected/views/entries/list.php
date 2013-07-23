<?php
$this->breadcrumbs=array(
	'Entries',
);

$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills',
    'items'=>array(
		array('label'=>'Create New Entry', 'url'=>array('create')),
    ),
));

?>

<h1>Entries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
