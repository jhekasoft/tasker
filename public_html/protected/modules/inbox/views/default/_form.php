<?php
/* @var $this DefaultController */
/* @var $model Inbox */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inbox-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php /*@var $form CActiveForm*/?>
        <?php echo $form->labelEx($model->data,'data'); ?>
		<?php echo $form->textArea($model->data,'data'); ?>
		<?php echo $form->error($model->data,'data'); ?>
        
		<?php /*echo $form->labelEx($model,'data_id'); ?>
		<?php echo $form->textField($model,'data_id'); ?>
		<?php echo $form->error($model,'data_id'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->