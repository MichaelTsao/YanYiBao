<?php
/* @var $this ShowsController */
/* @var $model Shows */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shows-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'name' => 'upform',),
)); ?>

	<p class="note">标有<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <?php
    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
    $time_param = array(
        'timeFormat'=>'hh:mm:00',
        'dateFormat'=>'yy-mm-dd',
        'currentText' => '现在',
        'closeText' => '完成',
        'timeText' => '时间',
        'hourText' => '小时',
        'minuteText' => '分钟',
    );
    $htmlOptions = array('readonly'=>"true", 'size'=>23);
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
        <?php
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'start_date', //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>$time_param, // jquery plugin options
            'htmlOptions'=>$htmlOptions,
        ));
        ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
        <?php
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'end_date', //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>$time_param, // jquery plugin options
            'htmlOptions'=>$htmlOptions,
        ));
        ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rate'); ?>
        <?php echo $form->dropDownList($model,'rate', array(0, 1, 2, 3, 4, 5)); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
        <?php echo $form->fileField($model, 'picture');?>
        <?php if($model->picture)echo "<br/>".CHtml::image($model->picture, $model->name, array('width'=>100)); ?>
        <?php echo $form->error($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rate_men'); ?>
		<?php echo $form->textField($model,'rate_men'); ?>
		<?php echo $form->error($model,'rate_men'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->dropDownList($model,'type', Logic::get_dict('showType', 'id', 'name')); ?>
        <?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'background'); ?>
        <?php echo $form->fileField($model, 'background');?>
        <?php if($model->background)echo "<br/>".CHtml::image($model->background, $model->name, array('width'=>100)); ?>
        <?php echo $form->error($model,'background'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guide_url'); ?>
		<?php echo $form->textField($model,'guide_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'guide_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buy_url'); ?>
		<?php echo $form->textField($model,'buy_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'buy_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->