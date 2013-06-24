<?php
/* @var $this DefaultController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	'enableAjaxValidation'=>false,
    'method'=>'get'
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php
//    echo '<pre>';
//    print_r($model->findAll());
//    echo '</pre>';
//    exit();
    ?>
    
    <div class="row">
        <?php /*@var $form CActiveForm*/?>
        <?php echo $form->labelEx($model,'task_id'); ?>
        <?php echo $form->dropDownList($model,'task_id', CHtml::listData(Task::model()->actual()->findAll(),'id','description')); ?>
		<?php //echo $form->dropDownList($model,'task_id', CHtml::listData(Task::model()->actual()->findAll(),'id','todo_time')); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>
    
    <div class="row">
        <?php /*@var $form CActiveForm*/?>
        <?php echo $form->labelEx($model->data,'data'); ?>
		<?php echo $form->textArea($model->data,'data'); ?>
		<?php echo $form->error($model->data,'data'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->