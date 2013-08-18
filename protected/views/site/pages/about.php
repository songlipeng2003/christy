<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>关于我们</h1>

<p><?php echo Yii::app()->settings->get('system', 'about_us'); ?>.</p>
