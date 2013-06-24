<?php
/* @var $this DefaultController */
/* @var $data Task */
?>

<div class="view">

<div class="view">
    
    <div style="float:right; background-color:#aaaaaa; padding:5px;">
        <?php echo CHtml::link('done', array('done', 'id'=>$data->id)); ?>
    </div>
	

	<?php echo CHtml::link(CHtml::encode($data->todo_time), array('/data/default/view', 'id'=>$data->data_id)); ?>
	<br />
    
    

	<?php /*<b><?php echo CHtml::encode($data->data->getAttributeLabel('data')); ?>:</b>*/?>
	<?php echo CHtml::encode($data->data->data); ?>
	<br />

</div>


</div>