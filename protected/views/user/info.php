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
		// 'email',
		'qq',
	),
)); ?>
<?php
echo '电子邮箱：'.$model->email.'&nbsp&nbsp&nbsp&nbsp';
if($model->emailActive!=0)
{
	echo '已激活';
}else
{
	$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'激活邮箱',
    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>array('ActiveEmail'),
));
}
?>
