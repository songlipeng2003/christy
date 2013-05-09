<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'book-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
    'clientOptions'=>array( 
        'validateOnSubmit'=>true,
    ), 
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	), 
)); ?>

	<p class="help-block"><?php echo Yii::t('admin', 'Fields with <span class="required">*</span> are required.') ?>
</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'isbn',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model,'author',CHtml::listData(Author::model()->findAll(), 'name', 'name')); ?>

	<?php echo $form->dropDownListRow($model,'category',CHtml::listData(Category::model()->findAll(), 'name', 'name')); ?>

	<?php echo $form->dropDownListRow($model,'press',CHtml::listData(Press::model()->findAll(), 'name', 'name')); ?>

	<?php echo $form->fileFieldRow($model,'document'); ?>

	<?php echo $form->fileFieldRow($model,'picture'); ?>

	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
