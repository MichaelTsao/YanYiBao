<?php
/* @var $this ShowsController */
/* @var $model Shows */

/*
$this->breadcrumbs=array(
	'Shows'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	array('label'=>'管理 节目', 'url'=>array('admin')),
);
?>

<h3>新建 节目</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>