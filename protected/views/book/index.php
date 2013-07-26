<?php
/* @var $this BookController */
$this->pageTitle=Yii::app()->name . ' - 书籍';

$this->breadcrumbs=array(
	'书籍',
);
?>

<div class="row">
    <div class="span4">
      <div class="well sidebar-nav">
        <?php 
            $this->widget(
                'CTreeView',
                array(
                    'url' => array('ajaxFillTree'),
                    'persist' => 'cookies'
                )
            ); ?>
      </div><!--/.well -->
    </div><!--/span-->

    <div class="span8 list">
        <h1>所有书籍</h1>
        <?php foreach ($model as $key => $book) { ?>
        <div class="row item">
            <div class="span1">
                <?php $this->widget('ext.SAImageDisplayer', array(
                    'image' => $book->image,
                    'group' => 'book',
                    'size' => 'thumb',
                    'title' => $book->name,
                    'defaultImage' => 'default.jpg',
                )); ?>
            </div>
            <div class="span6">
                <h2><?php echo CHtml::link($book->name, array('book/view', 'id'=>$book->id)) ?></h2>
                <p>
                    <?php if($book->author){ echo $book->author; } ?>/
                    <?php if($book->press){ echo $book->press; } ?>
                </p>
                <p><?php echo $book->description; ?></p>
            </div>
        </div>
        <?php } ?>

        <?php
        // the pagination widget with some options to mess
        $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>5,
            'header'=>'',
            'htmlOptions'=>array('class'=>'pages'),
        ));
        ?>
    </div>
</div>