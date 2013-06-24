<?php
/* @var $this DefaultController */
/* @var $data Inbox */
?>

<div class="view">
    
    <div style="float:right; background-color:#aaaaaa; padding:5px;">
        <?php echo CHtml::link('processed', array('delete', 'id'=>$data->id)); ?>
    </div>
	

	<?php echo CHtml::link(CHtml::encode($data->create_time), array('/data/default/view', 'id'=>$data->data_id)); ?>
	<br />
    
    

	<?php /*<b><?php echo CHtml::encode($data->data->getAttributeLabel('data')); ?>:</b>*/?>
	<?php echo CHtml::encode($data->data->data); ?>
	<br />

</div>