<?php
/* @var $this ShowTypeController */
/* @var $model ShowType */

/*
$this->breadcrumbs=array(
	'Show Types'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	array('label'=>'管理 节目类型', 'url'=>array('admin')),
);
?>

<h3>新建 节目类型</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>