<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks',
);

$this->menu=array(
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Tasks</h1>

<div style="">
    <?php echo CHtml::link('Add Task', array('create'), array('style'=>'background-color:#00cc00; padding:5px;')); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
