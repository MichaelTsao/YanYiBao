<?php
/* @var $this ShowTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Show Types',
);

$this->menu=array(
	array('label'=>'Create ShowType', 'url'=>array('create')),
	array('label'=>'Manage ShowType', 'url'=>array('admin')),
);
?>

<h1>Show Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
