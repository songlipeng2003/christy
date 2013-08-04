<?php
$this->pageTitle=Yii::app()->name . ' - 小组 - '.$group->name;

$this->breadcrumbs=array(
    Yii::t('model', 'Groups')=>array('group/'),
    $group->name=>array('group/view', 'id'=>$group->id),
    '成员'
);

$this->menu=array(
    array('label'=>Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>array('update','id'=>$group->id)),
    array('label'=>Yii::t('admin', 'Delete {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$group->id),'confirm'=>Yii::t('admin', 'Are you sure you want to delete this item?'))),
);
?>

<div class="row">
    <div class="span8">
        <h1><?php echo $group->name ?>小组的成员</h1>
        <div class="user_grid clearfix">
            <?php foreach ($members as $member) { ?>
            <div class="item">
                <?php $image = CHtml::image($member->user->avatar);
                echo Chtml::link($image, array('user/view', 'id'=>$member->user->id)); ?>
                <span class="username"><?php echo Chtml::link($member->user->username, array('user/view', 'id'=>$member->user->id)); ?></span>
            </div>
            <?php } ?>
        </div>
        <?php $this->widget('CLinkPager', array(
            'currentPage'=>$pages->getCurrentPage(),
            'itemCount'=>$item_count,
            'pageSize'=>$page_size,
            'maxButtonCount'=>5,
            'header'=>'',
            'htmlOptions'=>array('class'=>'pages'),
        )); ?>
    </div>
    <div class="span4">
        <div class="well">
            <h1><?php echo $group->name; ?></h1>
            <p>创建于:<?php echo Yii::app()->dateFormatter->formatDateTime($group->created_at, 'medium', false); ?> 组长:<?php echo $group->user->username ?></p>
            <p><?php echo $group->summary ?></p>
        </div>
    </div>
</div>