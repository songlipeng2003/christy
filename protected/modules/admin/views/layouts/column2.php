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
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>