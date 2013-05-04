<?php

$this->menu=array(
	array('label'=>'修改密码','url'=>array('ModifyPass')),
	array('label'=>'修改注册信息','url'=>array('update')),
	array('label'=>'修改注册邮箱','url'=>array('ModifyEmail')),
);
?>

<h1><?php echo '用户：'.$model->username.' 注册信息'; ?> </h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'sex',
		'tel',
		'email',
		'qq',
	),
)); ?>
