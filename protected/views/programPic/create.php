<?php
/* @var $this ProgramPicController */
/* @var $model Picture */

/*
$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	'Create',
);
*/

$this->menu=array(
	array('label'=>'管理 节目单图片', 'url'=>array('admin')),
);
?>

<h3>新建 节目单图片</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>