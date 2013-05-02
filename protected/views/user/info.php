<?php

$this->menu=array(
	array('label'=>'修改密码','url'=>array('ModifyPass')),
	array('label'=>'修改注册信息','url'=>array('update')),
);
?>

<h1><?php echo '用户：'.$model->username.' 注册信息'; ?> </h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_sex',
		'user_tel',
		'user_email',
		'user_qq',
	),
)); ?>
