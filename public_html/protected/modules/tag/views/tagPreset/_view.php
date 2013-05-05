<?php
/* @var $this TagPresetController */
/* @var $data TagPreset */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
    
    <?php if(count($data->tags) > 0) {?>
        <b>Tags:</b>
        <?php $tagsArr = array();
        foreach($data->tags as $tag) {
            $tagsArr[] = CHtml::link(CHtml::encode($tag->title), Yii::app()->createUrl('tag/tag/update',array('id'=>$tag->id)));
        }
        echo implode(', ', $tagsArr);?>
        <br />
    <?php }?>
    


</div>