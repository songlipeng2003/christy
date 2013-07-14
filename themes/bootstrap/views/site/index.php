<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'欢迎来到佳美之处！',
)); ?>
 
    <p>欢迎弟兄姊妹，来到佳美之处基督徒社区，愿为弟兄姊妹提供一个开发、信仰纯正的交流平台。</p>
    <p>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'加入网站',
        'url'=>array('user/register')
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'登陆',
        'url'=>array('site/login')
    )); ?>
    </p>
 
<?php $this->endWidget(); ?>