<?php
/* @var $this TopicController */

$this->breadcrumbs=array(
	'小组'=>array('/groups'),
    $topic->group->name=>array('group/view', 'id'=>$topic->group->id),
	$topic->title,
);
?>
<h1><?php echo $topic->title ?></h1>

<div class="">
    <?php echo $topic->content ?>
</div>
