<?php
/* @var $this BookController */
$this->pageTitle=Yii::app()->name . ' - 书籍 - ' .  $book->name;

$this->breadcrumbs=array(
	'书籍'=>array('/book'),
	$book->name,
);
?>
<h1><?php echo $book->name; ?></h1>

<div class="summary">
    <h3>简介</h3>
    <p><?php echo $book->description; ?></p>
</div>