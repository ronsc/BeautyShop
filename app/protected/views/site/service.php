<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-service-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'list'); ?>
		<?php echo $form->textField($model,'list'); ?>
		<?php echo $form->error($model,'list'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_min'); ?>
		<?php echo $form->textField($model,'price_min'); ?>
		<?php echo $form->error($model,'price_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_max'); ?>
		<?php echo $form->textField($model,'price_max'); ?>
		<?php echo $form->error($model,'price_max'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->