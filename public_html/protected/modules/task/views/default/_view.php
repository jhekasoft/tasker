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

    <div class="view data_cols" style="<?php echo $style;?>">
        <div class="data_col_left">
            <div style="widht:100%; padding:5px; color:gray;">
                Todo time: <?php echo CHtml::link(CHtml::encode($data->todo_time), array('create', 'task_id' => $data->id), array('target'=>'_blank')); ?>
            </div>
            <?php if(!empty($data->data)) {?>
                <div style="widht:100%; padding:5px;">
                    <?php //echo CHtml::encode($data->data->data); ?>
                    <?php echo nl2br($data->data->data); ?>
                </div>
            <?php }?>
            <?php if('done' == $data->progress) {?>
                <div style="widht:100%; padding:5px; color:red;">
                    resolved
                </div>
            <?php }?>
        </div>
        <div class="data_col_right">
            <?php //########################################################//?>
            <?php
            $color = '#eeeeee';
            if(count($data->actualTasks) > 0) {
                $color = '#ccffcc';
            }?>
            <div class="right_button" style="background-color:<?php echo $color;?>; padding:5px;">
                <?php echo CHtml::link('childs', array('index', 'task_id'=>$data->id, 'filter'=>'{"onlyNew":"yes"}')); ?>
            </div>
            <?php //########################################################//?>
            <?php
            $doneStyle = 'background-color:#aaaaaa;';
            if(count($data->actualTasks) > 0) {
                $doneStyle = 'background-color:#ccaaaa; pointer-events: none; cursor: default;';
            }?>
            <div class="right_button" style="<?php echo $doneStyle;?>">
                <?php echo CHtml::link('done', array('done', 'id'=>$data->id)); ?>
            </div>
            <?php //########################################################//?>
            <div class="right_button" style="background-color:#eeeeee;">
                <?php echo CHtml::link('upd', array('update', 'id'=>$data->id)); ?>
            </div>
            <?php //########################################################//?>
            <div class="right_button" style="background-color:#ccffcc;">
                <?php echo CHtml::link('data', array('/data/default/process', 'id'=>$data->data->id), array('target'=>'_blank')); ?>
            </div>
            <?php //########################################################//?>
        </div>
    </div>
</div>