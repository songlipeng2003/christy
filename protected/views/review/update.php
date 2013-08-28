<?php
?>

<div class="row">
    <div class="span9">
        <h1>修改评论</h1>
        <?php /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'review_form',
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
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'更新')); ?>
            </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="span3">
    </div>
</div>