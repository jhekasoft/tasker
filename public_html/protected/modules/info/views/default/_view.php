<?php
/* @var $this DefaultController */
/* @var $data Info */
?>

<div class="view">

<div class="view" style="">
    
    <?php
    $color = '#eeeeee';
    if(count($data->actualInfos) > 0) {
        $color = '#ccffcc';
    }?>
    <div style="float:right; background-color:<?php echo $color;?>; padding:5px;">
        <?php echo CHtml::link('childs', array('index', 'info_id'=>$data->id, 'filter'=>'{"onlyNew":"yes"}')); ?>
    </div>
    
    <?php
    $doneStyle = 'background-color:#aaaaaa;';
    if(count($data->infos) > 0) {
        $doneStyle = 'background-color:#ccaaaa; pointer-events: none; cursor: default;';
    }?>
    <div style="float:right;  padding:5px; <?php echo $doneStyle;?>">
        <?php echo CHtml::link('delete', array('done', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#eeeeee; padding:5px;">
        <?php echo CHtml::link('upd', array('update', 'id'=>$data->id)); ?>
    </div>
    
    <div style="float:right; background-color:#ccffcc; padding:5px;">
        <?php echo CHtml::link('data', array('/data/default/process', 'id'=>$data->data->id)); ?>
    </div>
	
	<?php echo CHtml::link(CHtml::encode($data->todo_time), array('/info/default/update', 'id'=>$data->id), array('target'=>'_blank')); ?>
	<br />
    
    <?php if(!empty($data->data)) {?>
        <div style="border: 1px solid gray; width:50%;">
            <?php echo CHtml::encode($data->data->data); ?>
        </div>
        <br />
    <?php }?>

</div>


</div>