
<!-- CSS Google Maps API -->
<style type="text/css">
    html{
        padding:0px;
        margin:0px;
    }
    div#map_canvas{
        margin:auto;
        width:600px;
        height:550px;
        overflow:hidden;
    }
</style>
<!-- END -->

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
<?php echo CHtml::scriptFile('http://code.jquery.com/jquery-1.4.2.min.js'); ?>
<script type="text/javascript"> 
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
function initialize() { // ฟังก์ชันแสดงแผนที่  
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
    // กำหนดจุดเริ่มต้นของแผนที่  

    if($_GET["id"]){
    var my_Latlng  = new GGM.LatLng(14.981933,102.098265);
//}else{
    //var my_Latlng  = new GGM.LatLng(<?php echo $shop->latitude; ?>, <?php echo $shop->longitude; ?>); 
//}   
    
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง  
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
    var my_DivObj=$("#map_canvas")[0];   
    // กำหนด Option ของแผนที่  
    var myOptions = {  
        zoom: 15, // กำหนดขนาดการ zoom  
        center: my_Latlng , // กำหนดจุดกึ่งกลาง  
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่  
    };  
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  
      
    var my_Marker = new GGM.Marker({ // สร้างตัว marker  
        position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
        draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้  
        title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
    });  
      
    // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร  
    GGM.event.addListener(my_Marker, 'dragend', function() {  
        var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย  
        map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker         
        
        $("#latitude").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=latitude  
        $("#longitude").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=longitude   
        $("#zoom").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom 
       
    });       
  
    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom  
    GGM.event.addListener(map, 'zoom_changed', function() {  
        $("#zoom").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom    
    });  
  
}  
$(function(){  
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว  
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api  
    // v=3.2&sensor=false&language=th&callback=initialize  
    //  v เวอร์ชัน่ 3.2  
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false  
    //  language ภาษา th ,en เป็นต้น  
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize  
    $("<script/>", {  
      "type": "text/javascript",  
      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"  
    }).appendTo("body");      
});  
</script>  
<!-- END -->
