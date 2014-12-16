<?php
/* @var $this StarPicController */
/* @var $model Picture */


$this->menu=array(
	//array('label'=>'List Picture', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'查看', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理 图片', 'url'=>array('admin')),
);
?>

<h1>修改 图片 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>