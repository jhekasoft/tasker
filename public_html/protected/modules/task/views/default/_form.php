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

    <div class="row">
        <?php /*@var $form CActiveForm*/?>
        <?php
        $task_id = Yii::app()->request->getParam('task_id');
        if($task_id) {
            $model->task_id = $task_id;
        } else {
            $model->task_id = 0;
        }
        ?>
        <?php echo $form->labelEx($model,'task_id'); ?>
        <?php echo $form->dropDownList($model,'task_id', array_merge(array(0=>'none'), CHtml::listData(Task::model()->findAll(),'id','description'))); ?>
        <?php echo $form->error($model,'task_id'); ?>
    </div>
    
    
    
    
    <?php
//    echo '<pre>';
//    var_dump($model->data);exit();
//    echo '</pre>';
//    exit();
    ?>
    
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