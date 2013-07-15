<?php
$this->breadcrumbs=array(
	'用户中心' => array('info'),
	'修改邮箱'
);

$this->menu=array(
	array('label'=>'用户中心'),
	array('label'=>'用户信息','url'=>array('info')),
	array('label'=>'修改密码','url'=>array('modifyPass')),
	array('label'=>'修改信息','url'=>array('update')),
	array('label'=>'修改邮箱','url'=>array('modifyEmail'),'active'=>true),
);
?>

<h1>修改邮箱</h1>

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

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('common', 'ModifyEmail'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>