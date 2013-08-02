<?php
$this->pageTitle=Yii::app()->name . ' - 小组 - '.$group->name;

$this->breadcrumbs=array(
	Yii::t('model', 'Groups')=>array('index'),
	$group->name,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Update {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>array('update','id'=>$group->id)),
	array('label'=>Yii::t('admin', 'Delete {model}', array('{model}'=>Yii::t('model', 'Group'))),'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$group->id),'confirm'=>Yii::t('admin', 'Are you sure you want to delete this item?'))),
);
?>

<div class="row">
    <div class="span8">
        <div>
            <h1><?php echo $group->name; ?></h1>
            <?php 
            if($group->user_id==Yii::app()->user->id){
                echo CHtml::link('更新信息', array('group/update', 'id'=>$group->id));
                echo CHtml::link('删除群组', array('group/delete', 'id'=>$group->id), array('confirm'=>'你确定要删除吗？这将删除小组所有信息！')); 
            }else{
                if($member){
                    echo CHtml::link('退出', array('member/delete', 'group_id'=>$group->id));
                }else{
                    echo CHtml::link('加入群组', array('member/create', 'group_id'=>$group->id));
                }

            } ?>
        </div>

        <div class="well">
            <p>创建于:<?php echo Yii::app()->dateFormatter->formatDateTime($group->created_at, 'medium', false); ?> 组长:<?php echo $group->user->username ?></p>
            <p><?php echo $group->summary ?></p>
        </div>

        <div class="row">
            <h2 class="span7"><small>最近话题</small></h2>
            <?php echo CHtml::link('发言', array('group/createTopic', 'id'=>$group->id), array('class'=>'pull-right btn')); ?>
        </div>
        <?php $this->widget('bootstrap.widgets.TbGridView',array(
            'id'=>'book-grid',
            'dataProvider'=>$topics->search(),
            'enableSorting'=>false,
            'columns'=>array(
                array(
                    'header'=>'标题',
                    'labelExpression'=>'$data->title',
                    'urlExpression'=>'array("topic/view", "id"=>$data->id)',
                    'class'=>'zii.widgets.grid.CLinkColumn',
                    'headerHtmlOptions'=>array(
                        'class'=>'span6'
                    )
                ),
                array(
                    'name'=>'user_id',
                    'value'=>'$data->user->id'
                ),
                'created_at',
            ),
        )); ?>

    </div>
    <div class="span4">
        <div class="well">
            <h3><small>最近加入<small></h3>
            <?php echo CHtml::link('预览所有成员', array('group/members', 'id'=>$group->id)); ?>
            <div class="user_grid clearfix">
                <?php foreach ($last_members as $member) { ?>
                    <div class="item">
                        <?php $image = CHtml::image($member->user->avatar);
                        echo CHtml::link($image, array('user/view', 'id'=>$member->user->id)); ?>
                        <span class="username"><?php echo CHtml::link($member->user->username, array('user/view', 'id'=>$member->user->id)); ?></span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>