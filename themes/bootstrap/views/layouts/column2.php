<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span3">
        <div id="sidebar" class="well">
        <?php $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list', // '', 'tabs', 'pills' (or 'list')
            'stacked'=>false, // whether this is a stacked menu
            'items'=>$this->menu,
        )); ?>
        </div><!-- sidebar -->
    </div>
    <div class="span9">
        <div id="content">
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
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>