<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Groups'),
);
?>

<h1>所有小组</h1>

<div class="well">
    <?php echo CHtml::link(Yii::t('admin', 'Create {model}', array('{model}'=>Yii::t('model', 'Group'))), array('group/create'), array('class'=>'btn')); ?>
</div>
<div class="search-form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'action'=>Yii::app()->createUrl($this->route),
        'type'=>'search',
		'method'=>'get',
	)); ?>

		<?php echo $form->textFieldRow($model,'name', array('class'=>'span5','maxlength'=>255, 'prepend'=>'<i class="icon-search"></i>')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('admin', 'Search'),
		)); ?>

	<?php $this->endWidget(); ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_view',
    'itemsCssClass'=>'clearfix',
    'template'=>"{summary}\n{pager}\n{items}\n{summary}\n{pager}",
    'htmlOptions'=>array(
        'class'=>'grid'
    )
 )); 
?>
