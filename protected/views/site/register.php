<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 注册';
$this->breadcrumbs=array(
    '注册',
);
?>

<h1>注册</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'user-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
)); ?>

    <p class="help-block"><?php echo Yii::t('common', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3','maxlength'=>255)); ?>

    <?php echo $form->textFieldRow($model,'username',array('class'=>'span3','maxlength'=>255)); ?>

    <?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3','maxlength'=>255)); ?>

    <?php echo $form->passwordFieldRow($model,'config_password',array('class'=>'span3','maxlength'=>255)); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'注册',
        )); ?>
    </div>

<?php $this->endWidget(); ?>