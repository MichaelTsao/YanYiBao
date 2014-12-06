<?php
/* @var $this StarController */
/* @var $model Star */


$this->menu=array(
	//array('label'=>'List Star', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'查看', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理 明星', 'url'=>array('admin')),
);
?>

<h1>修改 明星 <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>