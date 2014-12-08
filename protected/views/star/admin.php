<?php
/* @var $this StarController */
/* @var $model Star */

/*
$this->breadcrumbs=array(
	'Stars'=>array('index'),
	'Manage',
);
*/

$this->menu=array(
	array('label'=>'新建 明星', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#star-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3>
明星管理
</h3>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'star-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
        array(
            'name'=>'portrait',
            'type'=>'html',
            'value'=>function($data, $row){
                if($data->portrait){
                    return CHtml::image($data->portrait, $data->name, array('width'=>100));
                }else{
                    return '无图';
                }
            },
        ),

        array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
