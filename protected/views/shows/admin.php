<?php
/* @var $this ShowsController */
/* @var $model Shows */

/*
$this->breadcrumbs=array(
	'Shows'=>array('index'),
	'Manage',
);
*/

$this->menu=array(
	array('label'=>'新建 节目', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#shows-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3>
节目管理
</h3>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'shows-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'start_date',
		'end_date',
		'place',
		'rate',
		/*
		'picture',
		'rate_men',
		'type',
		'price',
		'background',
		'guide_url',
		'buy_url',
		'ctime',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
