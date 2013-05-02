<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
)); ?>

	<p class="help-block"><?php echo Yii::t('admin', 'Fields with <span class="required">*</span> are required.') ?>
</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password2',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_sex',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_tel',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_email',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_qq',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Register now') : Yii::t('admin', 'Update'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
