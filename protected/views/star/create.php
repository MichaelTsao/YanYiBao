<?php
/* @var $this StarController */
/* @var $model Star */

/*
$this->breadcrumbs=array(
	'Stars'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	array('label'=>'管理 明星', 'url'=>array('admin')),
);
?>

<h3>新建 明星</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>