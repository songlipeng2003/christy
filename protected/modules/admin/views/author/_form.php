<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'author-form',
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

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'destription',array('class'=>'span5','rows'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
