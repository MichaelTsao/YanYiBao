<?php
/* @var $this ProgramPicController */
/* @var $model Picture */

/*
$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	'Manage',
);
*/

$this->menu=array(
	array('label'=>'新建 节目单图片', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#picture-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h3>
    节目单图片管理
</h3>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'picture-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'owner_id',
            'value'=>function($data, $row){
                $dict = Logic::get_dict('shows', 'id', 'name');
                return $dict[$data->owner_id];
            },
            'filter' => Logic::get_dict('shows', 'id', 'name'),
        ),
        array(
            'name'=>'url',
            'type'=>'html',
            'value'=>function($data, $row){
                if($data->url){
                    return CHtml::image($data->url, $data->id, array('width'=>100));
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
