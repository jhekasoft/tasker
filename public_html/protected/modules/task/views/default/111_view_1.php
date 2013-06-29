<?php
/* @var $this DefaultController */
/* @var $data Task */
?>

<div class="view">

<?php
$style = '';
if('done' == $data->progress) {
    $style = 'background-color: #EEDDDD';
}?>
    
<div class="view" style="<?php echo $style;?>">
    
    <?php
    $color = '#eeeeee';
    if(count($data->actualTasks) > 0) {
        $color = '#ccffcc';
    }?>
    <div style="float:right; background-color:<?php echo $color;?>; padding:5px;">
        <?php echo CHtml::link('childs', array('index', 'task_id'=>$data->id, 'filter'=>'{"onlyNew":"yes"}')); ?>
    </div>
    
    <?php
    $doneStyle = 'background-color:#aaaaaa;';
    if(count($data->actualTasks) > 0) {
        $doneStyle = 'background-color:#ccaaaa; pointer-events: none; cursor: default;';
    }?>
    <div style="float:right;  padding:5px; <?php echo $doneStyle;?>">
        <?php echo CHtml::link('done', array('done', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#eeeeee; padding:5px;">
        <?php echo CHtml::link('upd', array('update', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#ccffcc; padding:5px;">
        <?php echo CHtml::link('data', array('/data/default/process', 'id'=>$data->data->id), array('target'=>'_blank')); ?>
    </div>
	
	<?php echo CHtml::link(CHtml::encode($data->todo_time), array('/task/default/update', 'id'=>$data->id), array('target'=>'_blank')); ?>
	<br />
    
    <?php if(!empty($data->data)) {?>
        <div style="border: 1px solid gray; width:50%;">
            <?php echo CHtml::encode($data->data->data); ?>
        </div>
        <br />
    <?php }?>
    
    
    <?php echo CHtml::encode($data->progress); ?>
	<br />

</div>


</div>