<?php
/* @var $this ShowTypeController */
/* @var $model ShowType */


$this->menu=array(
	//array('label'=>'List ShowType', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'查看', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理 节目类型', 'url'=>array('admin')),
);
?>

<h1>修改 节目类型 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>