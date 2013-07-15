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
}else{
	$this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'激活邮箱',
	    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'small', // null, 'large', 'small' or 'mini'
	    'url'=>array('ActiveEmail'),
	));
}
$email = $model->email;
$default='http://www.gravatar.com/avatar/fca897bd7fb2d58e94e5525c484e4ec9.png';
$size = 40;
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>
<p/>
头像：<img src="<?php echo $grav_url; ?>" alt="" />
