<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
    <?php Yii::app()->clientScript->registerCSSFile('/css/common.css'); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'书籍', 'url'=>array('book/')),
                array('label'=>'群组', 'url'=>array('group/')),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
            	array('label'=>Yii::t('common', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t('common', 'Register'), 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::app()->user->name.'的帐号', 'url'=>'#', 'items'=>array(
                    array('label'=>'个人首页', 'url'=>array('/user/view', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'账户设置', 'url'=>array('/user/info'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>Yii::t('common', 'Logout'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                ), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

    <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block'=>true, // display a larger alert block?
            'fade'=>true, // use transitions?
            'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
            'alerts'=>array( // configurations per alert type
                'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), 
                'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), 
            ),
        ));
    ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        <?php echo Chtml::link('关于我们', array('/site/page', 'view'=>'about')); ?>
        <?php echo Chtml::link('联系我们', array('/site/contact')); ?><br/>
		Copyright &copy; <?php echo date('Y'); ?> by 佳美之处.<br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
