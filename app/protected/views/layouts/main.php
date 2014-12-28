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
        body {
            background-color: #A0A0A0;
        }
        .mainDiv {
            background-color: white; 
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
        }
    </style>
</head>

<body>

<div class="container mainDiv">
    
    <!-- เมนูข้างบน -->
    <?php 
        $this->beginContent('/layouts/menu_admin'); 
        $this->endContent();
    ?>

    <?php if(!empty($this->breadcrumbs)):?>
        <ol class="breadcrumb">
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
        </ol>
    <?php endif; ?>
    
    <!-- เนื้อหาหลัก -->
    <?php echo $content; ?>

</div><!-- page -->

</body>
</html>
