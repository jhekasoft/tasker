<?php
/* @var $this TagPresetController */
/* @var $model TagPreset */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tag-preset-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    
    
    <div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php
//        echo CHtml::activeDropDownList($model,'tags', CHtml::listData(Tag::model()->findAll(), 'id', 'title'), array('multiple'=>'multiple',
//            //'name'=>'values',
//            'class'=>'multiselect',
//            //'options' => $selectedValues,
//        ));
        ?>
        <?php
//        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
//            'name'=>'city',
//            'source'=>array('ac1','ac2','ac3'),
//            // additional javascript options for the autocomplete plugin
//            'options'=>array(
//                'minLength'=>'2',
//            ),
//            'htmlOptions'=>array(
//                'style'=>'height:20px;',
//            ),
//        ));
        ?>
		
        
        <?php $this->beginWidget('ext.tag.TagsSelector'); ?>
            <script>
                $(document).ready(function() {
                    var availableTags = <?php echo json_encode(array_values(CHtml::listData(Tag::model()->findAll(), 'id', 'title')))?>;
                    $('.tags_mother_fucker').tagit({
                        availableTags:availableTags,
                        singleField: true,
                        singleFieldNode: $('#mySingleField'),
                        removeConfirmation: true
                    });
                });
            </script>
            
            <ul class="tags_mother_fucker">
                <?php if(count($model->tags) > 0) {?>
                    <?php foreach($model->tags as $tag) {?>
                        <li>
                            <?php echo $tag->title;?>
                        </li>
                    <?php }?>
                <?php }?>
            </ul>
            
            <?php $model->tags = implode(',', array_values(CHtml::listData($model->tags, 'id', 'title')));?>
            <?php //echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255,'disabled'=>'true','style'=>'display:nonek')); ?>
        <?php $this->endWidget(); ?>
        <?php echo $form->error($model,'tags'); ?>
            
        <input name="tags" id="mySingleField" value="Apple, Orange" disabled="true">
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->