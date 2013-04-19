<?php
$this->breadcrumbs=array(
	'Books'=>array('index'),
	'创建',
);

?>

<h1>创建 Book</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>