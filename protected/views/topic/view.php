<?php
/* @var $this TopicController */

$this->breadcrumbs=array(
	'小组'=>array('group/'),
    $topic->group->name=>array('group/view', 'id'=>$topic->group->id),
	$topic->title,
);
?>
<div class="row">
    <div class="span8">
        <h1><?php echo $topic->title ?></h1>

        <div class="">
            <?php echo $topic->content ?>
        </div>
    </div>
    <div class="span4">
        <div class="well">
            <h1><?php echo $topic->group->name; ?></h1>
            <p>创建于:<?php echo Yii::app()->dateFormatter->formatDateTime($topic->group->created_at, 'medium', false); ?> 组长:<?php echo $topic->group->user->username ?></p>
            <p><?php echo $topic->group->summary ?></p>
        </div>
    </div>
</div>
