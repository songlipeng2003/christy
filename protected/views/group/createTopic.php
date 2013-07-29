<?php
$this->breadcrumbs=array(
    Yii::t('model', 'Groups')=>array('index'),
    $group->name=>array('group/view', 'id'=>$group->id),
    '发言'
);

?>

<h1>发布帖子</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'group-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
)); ?>

    <p class="help-block"><?php echo Yii::t('admin', 'Fields with <span class="required">*</span> are required.') ?>
</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->textAreaRow($model,'content',array('rows'=>10,'class'=>'span5','maxlength'=>255)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'发言',
        )); ?>
    </div>

<?php $this->endWidget(); ?>