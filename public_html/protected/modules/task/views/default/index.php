<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('_breadcrumbs');

$this->menu=array(
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Tasks</h1>

<?php echo $this->renderPartial('_filter_priority');?>

<div style="">
    <?php
    if(Yii::app()->request->getParam('task_id')) {
        $params = array('create', 'task_id' => Yii::app()->request->getParam('task_id'));
    } else {
        $params = array('create');
    }?>
    <?php echo CHtml::link('Add Task', $params, array('style'=>'background-color:#00cc00; padding:5px;')); ?>
</div>

<?php
$dataProvider->pagination->pageSize=50;
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
