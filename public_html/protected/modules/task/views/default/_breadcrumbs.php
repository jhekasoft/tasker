<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Tasks' => array('/task/', 'filter'=>'{"onlyNew":"yes"}'),
);

if(Yii::app()->request->getParam('task_id')) {
    $breadcrumbs = array();
    
    $parentTaskId = Yii::app()->request->getParam('task_id');
    do {
        $parentTask = Task::model()->findByPk($parentTaskId);
        $parentTaskId = $parentTask->task_id;
        $breadcrumbs[$parentTask->description] = array('/task/default/index', 'filter'=>'{"onlyNew":"yes"}', 'task_id'=>$parentTask->id);
    } while(!empty($parentTaskId));
    
    if(count($breadcrumbs)) {
        foreach(array_reverse($breadcrumbs) as $key => $item) {
            $this->breadcrumbs[$key] = $item;
        }
    }
}
