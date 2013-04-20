<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('model', '$label')=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', '<?php echo $this->modelClass ?>'))),'url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>Yii::t('admin', 'Delete {model}', array('{model}'=>Yii::t('model', '<?php echo $this->modelClass ?>'))),'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t('admin', 'Are you sure you want to delete this item?'))),
);
?>

<h1><?php echo "<?php echo Yii::t('admin', 'View {model}', array('{model}'=>Yii::t('model', '$this->modelClass'))); ?>" ?> <?php echo " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
