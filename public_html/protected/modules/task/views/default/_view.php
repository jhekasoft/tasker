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
    if(count($data->tasks) > 0) {
        $color = '#ccaaaa';
    }?>
    <div style="float:right; background-color:<?php echo $color;?>; padding:5px;">
        <?php echo CHtml::link('childs', array('index', 'task_id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#aaaaaa; padding:5px;">
        <?php echo CHtml::link('done', array('done', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#eeeeee; padding:5px;">
        <?php echo CHtml::link('upd', array('update', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#ccffcc; padding:5px;">
        <?php echo CHtml::link('data', array('/data/default/process', 'id'=>$data->data->id)); ?>
    </div>
	
	<?php echo CHtml::link(CHtml::encode($data->todo_time), array('/data/default/process', 'id'=>$data->data_id), array('target'=>'_blank')); ?>
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