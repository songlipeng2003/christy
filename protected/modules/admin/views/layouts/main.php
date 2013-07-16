<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'管理后台', 'url'=>array('/admin')),
                array('label'=>'图书管理', 'url'=>array('/admin/book')),
                array('label'=>'作者管理', 'url'=>array('/admin/author')),
                array('label'=>'分类管理', 'url'=>array('/admin/category')),
                array('label'=>'出版社管理', 'url'=>array('/admin/press')),
                array('label'=>'电影管理', 'url'=>array('/admin/movie')),
                array('label'=>'收藏管理', 'url'=>array('/admin/collection')),
                array('label'=>'文档管理', 'url'=>array('/admin/doc')),
                array('label'=>'网站配置', 'url'=>array('/admin/config')), 
                 array('label'=>'用户管理', 'url'=>array('/admin/user_admin')),
                array('label'=>'管理员登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'注销 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'homeLink'=>CHtml::link('管理后台', array('/admin')),
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
