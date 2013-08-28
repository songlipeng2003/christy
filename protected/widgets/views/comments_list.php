<?php foreach ($comments as $book_comment) { ?>
<div class="row">
    <div class="span1">
        <?php echo CHtml::link($book_comment->user->username, array('user/view', 'id'=>$book_comment->user->id)) ?><br/>
        <img src="<?php echo $book_comment->user->avatar ?>" />
    </div>
    <div class="span7">
        <div><?php echo $book_comment->content; ?></div>
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
    'htmlOptions'=>array('class'=>'pager'),
));
?>

<div class="well">
    <h3>发表回复</h3>
    <?php /** @var BootActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'comment_form',
        'action'=>array('comment/create'),
        'enableClientValidation'=>true,
        'enableAjaxValidation'=>false,
        'clientOptions'=>array( 
            'validateOnSubmit'=>true,
        ), 
    )); ?>
        <?php echo $form->errorSummary($comment); ?>
        <?php echo $form->hiddenField($comment, 'object_id' ); ?>
        <?php echo $form->hiddenField($comment, 'type' ); ?>
        <?php echo $form->textAreaRow($comment, 'content', array('rows'=>'10', 'class'=>'span4')); ?>
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'提交')); ?>
        </div>
    <?php $this->endWidget(); ?>
</div>