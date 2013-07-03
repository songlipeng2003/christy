<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'original_title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'aka',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'directors',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'casts',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'writers',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'pubdate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'languages',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'duration',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'summary',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('admin', 'Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
