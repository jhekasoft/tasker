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

<div style="width:100%;height:50px;">
    <?php $filter = json_decode(Yii::app()->request->getParam('filter'));?>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"urgent"}'));?>">
        <?php $style = "";
        if(!empty($filter->priority) && 'urgent' == $filter->priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#ccaaaa;display:inline-block;padding:5px;">
            Urgent
        </div>
    </a>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"normal"}'));?>">
        <?php $style = "";
        if(!empty($filter->priority) && 'normal' == $filter->priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#aaccaa;display:inline-block;padding:5px;">
            Normal
        </div>
    </a>
    <a href="<?php echo Yii::app()->createAbsoluteUrl('/task/default/index', array('filter'=>'{"onlyNew":"yes","priority":"later"}'));?>">
        <?php $style = "";
        if(!empty($filter->priority) && 'later' == $filter->priority) {
            $style="border:2px solid black;";
        }?>
        <div style="<?php echo $style;?>; width:30%; background-color:#eeeeee;display:inline-block;padding:5px;">
            Later
        </div>
    </a>
</div>

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
