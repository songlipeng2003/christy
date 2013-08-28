<?php
?>

<div class="row">
    <div class="span8">
        <h1><?php echo $review->title ?></h1>
        <div class="clearfix">
            <?php echo $review->created_at; ?> 来自：<?php echo CHtml::link($review->user->username, array('user/view', 'id'=>$review->user->id)) ?><br/>
            <?php $this->widget('CStarRating', array('name'=>'rating', 'value'=>$review->rating, 'readOnly'=>true, 'htmlOptions'=>array('class'=>'clearfix'))); ?>
        </div>
        <div><?php echo $review->content ?></div>
    </div>
    <div class="span3"></div>
</div>

<?php $this->widget('CommentsList', array('object_id'=>$review->id, 'type'=>1)); ?>