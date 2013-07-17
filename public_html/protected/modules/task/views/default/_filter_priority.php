<?php
$priority = null;

$filter = json_decode(Yii::app()->request->getParam('filter'));
if(!empty($filter) && !empty($filter->priority)) {
    $priority = $filter->priority;
}

$task_id = Yii::app()->request->getParam('task_id');
if(!empty($task_id)) {
    $parent = Task::model()->findByPk($task_id);
    
    if(!empty($parent)) {
        $priority = $parent->priority;
    }
}
?>

<div style="width:100%;height:50px;">
    
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"urgent"}'));?>">
        <?php $style = "";
        if(!empty($priority) && 'urgent' == $priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#ccaaaa;display:inline-block;padding:5px;">
            Urgent
        </div>
    </a>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"normal"}'));?>">
        <?php $style = "";
        if(!empty($priority) && 'normal' == $priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#aaccaa;display:inline-block;padding:5px;">
            Normal
        </div>
    </a>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"later"}'));?>">
        <?php $style = "";
        if(!empty($priority) && 'later' == $priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#eeeeee;display:inline-block;padding:5px;">
            Later
        </div>
    </a>
</div>