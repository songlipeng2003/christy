<?php
$this->breadcrumbs=array(
	'作者'=>array('index'),
	'创建',
);

?>

<h1>创建作者</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>