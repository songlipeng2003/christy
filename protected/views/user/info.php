<?php
$this->breadcrumbs=array(
	'用户中心'
);

$this->menu=array(
	array('label'=>'用户中心'),
	array('label'=>'用户信息','url'=>array('info'),'active'=>true),
	array('label'=>'修改密码','url'=>array('modifyPass')),
	array('label'=>'修改信息','url'=>array('update')),
	array('label'=>'修改邮箱','url'=>array('modifyEmail')),
);
?>

<h1>用户信息</h1>
<p>
头像：<img src="<?php echo $model->getAvatar(); ?>" alt="" />
</p>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'sex',
		'tel',
		'email',
		'qq',
	),
)); ?>
<p>
<?php
if($model->emailActive==0)
{
	$this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'激活邮箱',
	    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'small', // null, 'large', 'small' or 'mini'
	    'url'=>array('ActiveEmail'),
	));
}
?>
<p/>
