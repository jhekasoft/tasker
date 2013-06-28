<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks' => array('/task/', 'filter'=>'{"onlyNew":"yes"}'),
);

if(Yii::app()->request->getParam('task_id')) {
    $breadcrumbs = array();
    
    $parentTaskId = Yii::app()->request->getParam('task_id');
    do {
        $parentTask = Task::model()->findByPk($parentTaskId);
        $parentTaskId = $parentTask->task_id;
        $breadcrumbs[$parentTask->description] = array('/task/', 'filter'=>'{"onlyNew":"yes"}', 'task_id'=>$parentTask->id);
    } while(!empty($parentTaskId));
    
    if(count($breadcrumbs)) {
        foreach(array_reverse($breadcrumbs) as $key => $item) {
            $this->breadcrumbs[$key] = $item;
        }
    }
}

$this->menu=array(
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Tasks</h1>

<div style="">
    <?php
    if(Yii::app()->request->getParam('task_id')) {
        $params = array('create', 'task_id' => Yii::app()->request->getParam('task_id'));
    } else {
        $params = array('create');
    }?>
    <?php echo CHtml::link('Add Task', $params, array('style'=>'background-color:#00cc00; padding:5px;')); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
