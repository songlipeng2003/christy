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
        <div class="row base_info">
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
                    <?php if($book->isbn){ echo Yii::t('model', 'Book.isbn').':'.$book->isbn.'<br/>'; } ?>
                    <?php if($book->origin_title){ echo Yii::t('model', 'Book.origin_title').':'.$book->origin_title.'<br/>'; } ?>
                    <?php if($book->alt_title){ echo Yii::t('model', 'Book.alt_title').':'.$book->alt_title.'<br/>'; } ?>
                    <?php if($book->subtitle){ echo Yii::t('model', 'Book.subtitle').':'.$book->subtitle.'<br/>'; } ?>
                    <?php if($book->price){ echo Yii::t('model', 'Book.price').':'.$book->price.'<br/>'; } ?>
                    <?php if($book->press_date){ echo Yii::t('model', 'Book.press_date').':'.$book->press_date.'<br/>'; } ?>
                    <?php if($book->word_number){ echo Yii::t('model', 'Book.word_number').':'.$book->word_number.'<br/>'; } ?>
                    <?php if($book->pages){ echo Yii::t('model', 'Book.pages').':'.$book->pages.'<br/>'; } ?>
                </p>
            </div>
        </div>

        <div class="well">
            <p>
                <!-- Button to trigger modal -->
                <a href="#collection_modal" role="button" class="btn" data-toggle="modal">想读</a>
                <a href="#collection_modal" role="button" class="btn" data-toggle="modal">在读</a>
                <a href="#collection_modal" role="button" class="btn" data-toggle="modal">已读</a>
            </p>
             
            <!-- Modal -->
            <div id="collection_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">添加收藏</h3>
              </div>
              <div class="modal-body">
                <?php
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
                    <?php echo $form->labelEx($collection, 'rating'); ?>
                    <?php $this->widget('CStarRating',array('name'=>'Collection[rating]', 'value'=>$collection->rating, 'htmlOptions'=>array('class'=>'clearfix'))); ?>
                    <?php echo $form->error($collection, 'rating'); ?>
                    <label for="tags">标签</label>
                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                        'name'=>'tags',
                        'source'=> 'js:function( request, response ) {
                            $.getJSON( "/tag/autocomplete", {
                                term: extractLast( request.term )
                            }, response );
                        }',
                        'value'=>$collection->tagsText,
                        // additional javascript options for the autocomplete plugin
                        'options'=>array(
                            'search'=>'js:function() {
                                var term = extractLast( this.value );
                                if ( term.length < 1 ) {
                                    return false;
                                }
                            }',
                            'select'=>'js:function( event, ui ) {
                                var terms = split( this.value );
                                terms.pop();
                                terms.push( ui.item.value );
                                terms.push( "" );
                                this.value = terms.join( ", " );
                                return false;
                            }'
                        ),
                    )); ?>
                    <?php echo $form->textAreaRow($collection, 'comment'); ?>
                    <div class="form-actions">
                        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'提交')); ?>
                    </div>
                <?php $this->endWidget(); ?>
              </div>
            </div>

            <p>
                <a href="<?php echo $book->getFileUrl(); ?>" class="btn btn-primary">下载电子书</a>
            </p>
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
                <div class="span1">
                    <?php echo CHtml::link($book_review->user->username, array('user/view', 'id'=>$book_review->user->id)) ?><br/>
                    <img src="<?php echo $book_review->user->avatar ?>" />
                </div>
                <div class="span8">
                    <h4><?php echo CHtml::link($book_review->title, array('review/view', 'id'=>$book_review->id)); ?></h4>
                    <div><?php echo $book_review->content; ?></div>
                    <div class="clearfix">
                        <div class="pull-right">
                            <?php echo CHtml::link('编辑', array('review/update', 'id'=>$book_review->id)); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="well">
            <h3>发表评论</h3>
            <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'review_form',
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
                <?php echo $form->labelEx($review, 'rating'); ?>
                <?php $this->widget('CStarRating',array('name'=>'Review[rating]', 'value'=>$review->rating, 'htmlOptions'=>array('class'=>'clearfix'))); ?>
                <?php echo $form->error($review, 'rating'); ?><br/>
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