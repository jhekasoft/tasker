<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inboxes',
);

$this->menu=array(
	array('label'=>'Create Inbox', 'url'=>array('create')),
	array('label'=>'Manage Inbox', 'url'=>array('admin')),
);
?>

<h1>Inboxes</h1>

<div style="">
    <?php echo CHtml::link('Add Inbox', array('create'), array('style'=>'background-color:#00cc00; padding:5px;')); ?>
</div>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
