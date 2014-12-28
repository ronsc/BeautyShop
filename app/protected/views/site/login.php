<?php
	$this->pageTitle=Yii::app()->name . ' - Login';
?>


<div align="center" class="well">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class' => 'form-horizontal',
	),
)); ?>
	
	<div class="form-group">
	    <label for="username" class="col-sm-5 control-label">ชื่อผู้ใช้งาน</label>
	    <div class="col-sm-3">
	      <?php echo $form->textField($model,'username', array(
	      	'class' => 'form-control'
	      )); ?>
	      <?php echo $form->error($model,'username'); ?>
	    </div>
	</div>

	<div class="form-group">
	    <label for="password" class="col-sm-5 control-label">รหัสผ่าน</label>
	    <div class="col-sm-3">
	      <?php echo $form->passwordField($model,'password', array(
	      	'class' => 'form-control'
	      )); ?>
	      <?php echo $form->error($model,'password'); ?>
	    </div>
	</div>

	<div class="form-group">
	    <div class="col-sm-14">
		    <?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
	</div>

	<div class="form-group">
	    <div class="col-sm-14">
	    	<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
	    	<button type="reset" class="btn btn-default">ยกเลิก</button>
	    </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
