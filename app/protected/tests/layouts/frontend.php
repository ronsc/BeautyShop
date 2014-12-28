<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <?php echo CHtml::cssFile('bootstrap/css/bootstrap.css'); ?>

    <?php echo CHtml::scriptFile('bootstrap/js/jQuery.js'); ?>
    <?php echo CHtml::scriptFile('bootstrap/js/bootstrap.min.js'); ?>
    <?php echo CHtml::scriptFile('js/myscript.js'); ?>
    <script>
        showCompare();
    </script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style>
        .mainDiv {
            -webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
            box-shadow: 0px 0px 30px 5px rgba(0,0,0,0.75);
            margin-bottom: 30px;
            background: url("images/bg4.jpg");
        }
    </style>
</head>

<body background="images/p2.gif">

<div class="container">
    
    <!-- เมนูข้างบน -->
    <div class="mainDiv">
    <?php 
        $this->beginContent('/layouts/menu_guest'); 
        $this->endContent();
    ?>
	</div>

    <!-- เนื้อหาหลัก -->
    <div class="mainDiv" style="padding: 10px;">
    	<?php if(!empty($this->breadcrumbs)):?>
	        <ol class="breadcrumb">
	        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
	            'links' => $this->breadcrumbs,
	        )); ?><!-- breadcrumbs -->
	        </ol>
	    <?php endif; ?>

	    <?php echo $content; ?>
	</div>

</div><!-- page -->

</body>
</html>
