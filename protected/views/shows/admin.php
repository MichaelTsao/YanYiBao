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
        array(
            'name'=>'picture',
            'type'=>'html',
            'value'=>function($data, $row){
                if($data->picture){
                    return CHtml::image($data->picture, $data->name, array('width'=>100));
                }else{
                    return '无图';
                }
            },
        ),
		'rate_men',
        array(
            'name'=>'type',
            'value'=>function($data, $row){
                $dict = Logic::get_dict('showType', 'id', 'name');
                return $dict[$data->type];
            },
            'filter' => Logic::get_dict('showType', 'id', 'name'),
        ),
		'price',
        array(
            'name'=>'background',
            'type'=>'html',
            'value'=>function($data, $row){
                if($data->background){
                    return CHtml::image($data->background, $data->name, array('width'=>100));
                }else{
                    return '无图';
                }
            },
            'htmlOptions'=>array(
                'style'=>'text-align:center',
            ),
        ),
        array(
            'name'=>'stars',
            'value'=>'html',
            'value'=>function($data, $row){
                $d = implode('|', array_values($data->stars));
                return $d;
            },
        ),
        /*
       'guide_url',
       'buy_url',
       'ctime',
       */
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
