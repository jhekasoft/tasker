<?php
/* @var $this DefaultController */
/* @var $model Info */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-form',
	'enableAjaxValidation'=>false,
    'method'=>'get'
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php /*@var $form CActiveForm*/?>
        <?php
        $info_id = Yii::app()->request->getParam('info_id');
        if($info_id) {
            $model->inf_id = $info_id;
        } else {
            if(empty($model->parent)) {
                $model->info_id = 0;
            }
        }
        
        $list = CHtml::listData(Info::model()->findAll(),'id','description');
        $list[0] = 'none';
        ?>
        <?php echo $form->labelEx($model,'info_id'); ?>
        <?php echo $form->dropDownList($model,'info_id', $list); ?>
        <?php echo $form->error($model,'info_id'); ?>
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