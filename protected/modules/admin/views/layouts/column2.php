<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="row">
    <div class="span12">
        <?php 
        foreach($this->menu as $menu){
            $this->widget('bootstrap.widgets.TbButton', $menu);
        }
        ?>
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