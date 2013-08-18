<?php
$this->breadcrumbs=array(
    Yii::t('model', 'Categories')=>array('index'),
    Yii::t('admin', 'Create'),
);

?>

<h1>网站配置</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'settings-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
)); ?>

    <p class="help-block"><?php echo Yii::t('admin', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->textFieldRow($model,'site_name',array('class'=>'span5','maxlength'=>32)); ?>
    <?php echo $form->textFieldRow($model,'site_description',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'about_us'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'修改网站配置',
        )); ?>
    </div>

<?php $this->endWidget(); ?>
