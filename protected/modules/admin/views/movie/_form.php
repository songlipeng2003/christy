<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/uploadify.css"); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.uploadify.min.js"); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/admin/movie.js"); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'movie-form',
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

	<?php echo $form->textFieldRow($model,'image',array('readonly'=>'true')); ?>
	<div class="control-group ">
		<label class="control-label"></label>
		<div class="controls">
			<div id="image_upload"></div>
		</div>
	</div>

	<?php echo $form->textFieldRow($model,'original_title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'aka',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'directors',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'casts',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'writers',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="control-group ">
		<?php echo $form->labelEx($model,'pubdate',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'attribute'=>'pubdate',
				'language'=>'zh_cn',
				'model'=>$model,
				'name'=>$model->pubdate,
				'options'=>array(
					'showAnim'=>'fold',
					'showOn'=>'both',
					'dateFormat'=>'yy-mm-dd',
				),
			));
			?>
		</div>
		<?php echo $form->error($model,'pubdate'); ?>
	</div>

	<?php echo $form->textFieldRow($model,'languages',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'duration',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'summary',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Update'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
