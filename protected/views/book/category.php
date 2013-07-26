<?php
/* @var $this BookController */
$this->pageTitle=Yii::app()->name . ' - 书籍';

$breadcrumbs = array(
    '书籍'=>array('book/index'),
);

foreach ($parents as $parent) {
    $breadcrumbs[$parent->name] = array('book/category', 'id'=>$parent->id);
}

$breadcrumbs[] = $category->name;

$this->breadcrumbs=$breadcrumbs;
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
        <h1><?php echo $category->name ?>下的书籍</h1>
        <?php foreach ($model as $key => $book) { ?>
        <div class="row item">
            <div class="span1">
                <?php $this->widget('ext.SAImageDisplayer', array(
                    'image' => $book->picture,
                    'group' => 'book',
                    'size' => 'thumb',
                    'title' => $book->name,
                    'defaultImage' => 'default.jpg',
                )); ?>
            </div>
            <div class="span6">
                <h2><?php echo CHtml::link($book->name, 'book/'.$book->id) ?></h2>
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