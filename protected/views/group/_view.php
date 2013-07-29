<div class="item span3">
    <h2><?php echo CHtml::link($data->name, array('group/view', 'id'=>$data->id)); ?></h2>
    <p class="summary"><?php echo CHtml::encode($data->summary); ?><p>
    <p>创建于:<?php echo CHtml::encode($data->created_at); ?></p>
</div>