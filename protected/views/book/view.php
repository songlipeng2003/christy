<?php
/* @var $this BookController */
$this->pageTitle=Yii::app()->name . ' - 书籍 - ' .  $book->name;

$this->breadcrumbs=array(
	'书籍'=>array('book/'),
	$book->name,
);
?>

<div class="row">
    <div class="span9">
        <h1><?php echo $book->name; ?></h1>
        <div class="row">
            <div class="span2">
                <?php $this->widget('ext.SAImageDisplayer', array(
                    'image' => $book->image,
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

        <div class="">
            <!-- Button to trigger modal -->
            <a href="#collection_modal" role="button" class="btn" data-toggle="modal">想读</a>
            <a href="#collection_modal" role="button" class="btn" data-toggle="modal">在读</a>
            <a href="#collection_modal" role="button" class="btn" data-toggle="modal">已读</a>
             
            <!-- Modal -->
            <div id="collection_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">添加收藏</h3>
              </div>
              <div class="modal-body">
                <?php /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id'=>'collection_form',
                    'action'=>array('collection/create'),
                    'enableAjaxValidation'=>true,
                )); ?>
                    <?php echo $form->errorSummary($collection); ?>
                    <?php echo $form->hiddenField($collection, 'object_id' ); ?>
                    <?php echo $form->hiddenField($collection, 'type' ); ?>
                    <?php echo $form->radioButtonListInlineRow($collection, 'status', 
                        array('1'=>'想读', '2'=>'在读', '3'=>'已读')); ?>
                    <?php echo $form->textFieldRow($collection, 'rating'); ?>
                    <?php echo $form->textFieldRow($collection, 'tags'); ?>
                    <?php echo $form->textAreaRow($collection, 'comment'); ?>
                    <div class="form-actions">
                        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'提交')); ?>
                    </div>
                <?php $this->endWidget(); ?>
              </div>
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
            <?php foreach ($reviews as $book_review) { ?>
            <div class="row">
                <div class="span-3">
                    <?php echo CHtml::link($book_review->user->username, array('user/view', 'id'=>$book_review->user->id)) ?><br/>
                    <img src="<?php echo $book_review->user->avatar ?>" />
                </div>
                <div class="span-5">
                    <h4><?php echo $book_review->title ?></h4>
                    <?php echo $book_review->content; ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="well">
            <h3>发表评论</h3>
            <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'review_form',
                'type'=>'horizontal',
                'action'=>array('review/create'),
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>false,
                'clientOptions'=>array( 
                    'validateOnSubmit'=>true,
                ), 
            )); ?>
                <?php echo $form->errorSummary($review); ?>
                <?php echo $form->hiddenField($review, 'object_id' ); ?>
                <?php echo $form->hiddenField($review, 'type' ); ?>
                <?php echo $form->textFieldRow($review, 'rating'); ?>
                <?php echo $form->textFieldRow($review, 'title'); ?>
                <?php echo $form->textAreaRow($review, 'content', array('rows'=>'10', 'class'=>'span4')); ?>
                <div class="form-actions">
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'提交')); ?>
                </div>
            <?php $this->endWidget(); ?>
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