<div class="item">
    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('group/view', 'id'=>$data->id)); ?></h2>
    <p><?php echo $data->memberCount; ?>个成员在此聚集</p>
    <p>创建于:<?php echo Yii::app()->dateFormatter->formatDateTime($data->created_at, 'medium', false); ?></p>
    <p class="summary"><?php echo CHtml::encode($data->summary); ?><p>
</div>