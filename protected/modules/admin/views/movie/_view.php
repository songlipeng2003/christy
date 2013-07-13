<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_title')); ?>:</b>
	<?php echo CHtml::encode($data->original_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aka')); ?>:</b>
	<?php echo CHtml::encode($data->aka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('directors')); ?>:</b>
	<?php echo CHtml::encode($data->directors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('casts')); ?>:</b>
	<?php echo CHtml::encode($data->casts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('writers')); ?>:</b>
	<?php echo CHtml::encode($data->writers); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pubdate')); ?>:</b>
	<?php echo CHtml::encode($data->pubdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages')); ?>:</b>
	<?php echo CHtml::encode($data->languages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	*/ ?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>

</div>