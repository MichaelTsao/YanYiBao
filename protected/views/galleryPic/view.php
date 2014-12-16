<?php
/* @var $this GalleryPicController */
/* @var $model Picture */


$this->menu=array(
	//array('label'=>'List 图片', 'url'=>array('index')),
	array('label'=>'创建', 'url'=>array('create')),
	array('label'=>'修改', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理 图片', 'url'=>array('admin')),
);
?>

<h1>查看 图片 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'owner_id',
		'url',
		'ctime',
	),
)); ?>
