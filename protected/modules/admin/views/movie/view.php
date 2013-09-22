<?php
$this->breadcrumbs=array(
	Yii::t('model', 'Movies')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', 'Movie'))),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('admin', 'Delete {model}', array('{model}'=>Yii::t('model', 'Movie'))),'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('admin', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo Yii::t('admin', 'View {model}', array('{model}'=>Yii::t('model', 'Movie'))); ?>  #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array(
			'name'=>'image',
			'value'=>$this->widget('ext.SAImageDisplayer', array(
                'image' => $model->image,
                'group' => 'movie',
                'size' => 'big',
                'defaultImage' => 'default.jpg',
            ), true),
            'type'=>'raw',
		),
		'original_title',
		'aka',
		'directors',
		'casts',
		'writers',
		'website',
		'pubdate',
		'languages',
		'duration',
		'summary',
		'created_at',
		'updated_at',
	),
)); ?>
