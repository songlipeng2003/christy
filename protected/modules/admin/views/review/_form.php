<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'review-form',
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

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'object_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'rating',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'summary',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'votes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'useless',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'comments',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>