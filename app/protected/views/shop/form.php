<div class="alert alert-info" role="alert">
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'shop-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data'
    )
)); ?>

<div class="pull-right">
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-ok"></span>
        บันทึกร้าน
    </button>
    <button type="reset" class="btn btn-default">
        ยกเลิก
    </button>
</div>

<div class="form-group">
    <?php echo $form->labelEx($shop,'shopname', array(
        'class' => 'col-sm-2 control-label'
    )); ?>
    <div class="col-sm-4">
        <?php echo $form->textField($shop, "shopname", array('class' => 'form-control')); ?>
        <?php echo $form->error($shop,"shopname"); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($shop,'name', array(
        'class' => 'col-sm-2 control-label'
    )); ?>
    <div class="col-sm-5">
        <?php echo $form->textField($shop, "name", array('class' => 'form-control')); ?>
        <?php echo $form->error($shop,"name"); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($shop,'tel', array(
        'class' => 'col-sm-2 control-label', 'id' => 'tel'
    )); ?>
    <div class="col-sm-2">
        <?php echo $form->textField($shop, "tel", array('class' => 'form-control')); ?>
        <?php echo $form->error($shop,"tel"); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($shop,'address', array(
        'class' => 'col-sm-2 control-label'
    )); ?>
    <div class="col-sm-5">
        <?php echo $form->textArea($shop, "address", array(
            'class' => 'form-control', 'rows' => 3, 'cols' => 50
        )); ?>
        <?php echo $form->error($shop,"address"); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($shop,'pic', array(
        'class' => 'col-sm-2 control-label'
    )); ?>
    <div class="col-sm-5">
        <?php echo $form->fileField($shop, "pic"); ?>
        <?php echo $form->error($shop,"pic"); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2 control-label">
        <b>แผนที่ร้าน</b>
    </div>
    <div class="col-sm-5">
        Latitude
    <?php echo $form->textField($shop, "latitude", array(
        'class' => 'form-control', 'id' => 'latitude'
    )); ?>
    Longitude
    <?php echo $form->textField($shop, "longitude", array(
        'class' => 'form-control', 'id' => 'longitude'
    )); ?>
  Zoom
  <?php echo $form->textField($shop, "zoom", array(
    'class' => 'form-control', 'id' => 'zoom'
  )); ?>

        <!-- Show Google Maps API -->
        <div id="map_canvas"></div> 

    </div>
</div>
<?php echo $form->hiddenField($shop,"id");?>

<?php $this->endWidget(); ?>
</div>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $datas,
        'columns' => array(
            'id',
            'shopname',
            'name',
            'address',
            'tel',
            'latitude',
            'longitude',
            'zoom',
            array(
                'name' => 'pic',
                'type' => 'html',
                'value' => 'CHtml::image("files/images/".$data->pic, $data->shopname, array("style"=>"width:50px;height:50px;"))'
            ),
            array(
                'type' => 'html',
                'value' => 'CHtml::link("แก้ไข",array("shop/form","id"=>$data->id))',
            ),
            array(
                'type' => 'html',
                'value' => 'CHtml::link("ลบ",array("shop/delete","id"=>$data->id, "name"=>$data->pic))',
                'htmlOptions' => array(
                    'onclick' => 'return confirm("ยืนยันการลบ")'
                )
            )
        )
    ));
?>

<!-- Script Google Maps API V3.2 -->
<script type="text/javascript" 
    src="https://maps.googleapis.com/maps/api/js?">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: { 
                lat: 14.981933, 
                lng: 102.098265
            },
            zoom: 13
        };

        var mapObj = document.getElementById('map_canvas');
        var map = new google.maps.Map(mapObj, mapOptions);

        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            title: 'this is marker',
            draggable: true,
        })

        google.maps.event.addListener(marker, 'dragend', function(event){

            var pos = marker.getPosition(); 
            map.panTo(pos);         

            document.getElementById('latitude').value = pos.lat();  
            document.getElementById('longitude').value = pos.lng(); 
            document.getElementById('zoom').value = map.getZoom();
            
            console.log(pos.toString())
        })
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- END -->

<!-- CSS Google Maps API -->
<style type="text/css">
    #map_canvas{
        margin: 30px;
        width:700px;
        height:550px;
        overflow:hidden;
        text-align: center;
    }
</style>
<!-- END -->
