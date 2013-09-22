<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'欢迎来到'.Yii::app()->settings->get('system', 'site_name').'!',
)); ?>
 
    <p><?php echo Yii::app()->settings->get('system', 'site_description');?></p>
    <p>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'加入网站',
        'url'=>array('site/register')
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'登陆',
        'url'=>array('site/login')
    )); ?>
    </p>
 
<?php $this->endWidget(); ?>