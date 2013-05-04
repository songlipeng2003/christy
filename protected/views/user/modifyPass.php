<?php
$this->breadcrumbs=array(
	// Yii::t('model', 'Users')=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	Yii::t('common', 'ModifyPass'),
);
?>

<h1> <?php echo $model->username; ?> <?php echo Yii::t('common', 'ModifyPass {model}', array('{model}'=>Yii::t('model', 'User'))); ?> </h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
)); ?>

	<p class="help-block"><?php echo Yii::t('common', 'Fields with <span class="required">*</span> are required.') ?>
</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->passwordFieldRow($model,'old_password',array('value'=>''),array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('value'=>''),array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'config_password',array('value'=>''),array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('common', 'ModifyPass'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>