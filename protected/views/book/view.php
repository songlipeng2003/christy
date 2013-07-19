<?php
/* @var $this BookController */
$this->pageTitle=Yii::app()->name . ' - 书籍 - ' .  $book->name;

$this->breadcrumbs=array(
	'书籍'=>array('/book'),
	$book->name,
);
?>

<div class="row">
    <div class="span9">
        <h1><?php echo $book->name; ?></h1>
        <div class="row">
            <div class="span2">
                <?php $this->widget('ext.SAImageDisplayer', array(
                    'image' => $book->picture,
                    'group' => 'book',
                    'size' => 'big',
                    'defaultImage' => 'default.jpg',
                )); ?>
            </div>
            <div class="span6">
                <p>
                    <?php if($book->author){ echo '作者:'.$book->author; } ?><br/>
                    <?php if($book->press){ echo '出版社:'.$book->press; } ?><br/>
                    <?php if($book->isbn){ echo 'ISBN:'.$book->isbn; } ?><br/>
                </p>
            </div>
        </div>

        <div class="summary">
            <h3>简介</h3>
            <p><?php echo $book->description; ?></p>
        </div>

        <div class="summary">
            <h3>作者描述</h3>
            <p><?php echo $book->description; ?></p>
        </div>

        <div class="">
            <h3>书籍评论</h3>
        </div>
    </div>
    <div class="span3">
        <div class="well">
            <h3>在那些网站可以买这本书？</h3>
        </div>
        <div class="well">
            <h3>在那些书店可以买这本书？</h3>
        </div>
        <div class="well">
            <h3>谁读过这本书？</h3>
        </div>
    </div>
</div>