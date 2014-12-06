<?php
/* @var $this StarController */
/* @var $model Star */


$this->menu=array(
	//array('label'=>'List 明星', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'修改', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理 明星', 'url'=>array('admin')),
);
?>

<h1>查看 明星 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'portrait',
		'ctime',
	),
)); ?>
