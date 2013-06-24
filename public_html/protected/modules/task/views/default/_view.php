<?php
/* @var $this DefaultController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_id')); ?>:</b>
	<?php echo CHtml::encode($data->data_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task_id')); ?>:</b>
	<?php echo CHtml::encode($data->task_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress')); ?>:</b>
	<?php echo CHtml::encode($data->progress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('todo_time')); ?>:</b>
	<?php echo CHtml::encode($data->todo_time); ?>
	<br />


</div>