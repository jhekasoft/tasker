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
            if(empty($model->parent)) {
                $model->task_id = 0;
            }
        }
        
        $list = CHtml::listData(Task::model()->actual()->findAll(),'id','description');
        $list[0] = 'none';
        ?>
        <?php echo $form->labelEx($model,'task_id'); ?>
        <?php echo $form->dropDownList($model,'task_id', $list); ?>
        <?php echo $form->error($model,'task_id'); ?>
    </div>
    
    <div class="row">
        <?php if(empty($model->priority)) {
            $model->priority = 'normal';
        }?>
        <?php echo $form->radioButtonList($model,'priority', array(
            'urgent'=>'<span style="color:red">Urgent</span>',
            'normal'=>'<span style="color:green">Normal</span>',
            'later'=>'<span style="color:gray">Later</span>',
        ),
        array(
            'separator'=>'----------------',
            'labelOptions'=> array('style'=>'display:inline'),
        ));?>
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
		<?php echo $form->textArea($model->data,'data', array('rows'=>10, 'cols'=>80)); ?>
		<?php echo $form->error($model->data,'data'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->