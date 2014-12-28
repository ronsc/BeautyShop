<?php
    $this->pageTitle = Yii::app()->name . ' - Contact Us';
    $this->breadcrumbs = array(
    	$model->shopname,
    );
?>

<div class="panel panel-primary">
	<div class="panel-heading" style="font-size: 14pt">
		<span class="glyphicon glyphicon-home"></span>
		<?php echo $model->shopname; ?>
	</div>
	<div class="panel-body">
		<dl class="dl-horizontal">
		  	<dt style="margin-left: 50px;">
		  		<img src="files/images/<?php echo $model->pic; ?>" class="img-rounded">
		  	</dt>
		  	<dd>
				<address style="margin-left: 50px;">
				  <strong><?php echo $model->shopname; ?></strong><br>
				  <?php echo $model->address; ?>
				</address>
				<address style="margin-left: 50px;">
				  <strong>โทรศัพท์</strong><br>
				  <?php echo $model->tel; ?>
				</address>
		  	</dd>
		</dl>
		<?php foreach($model->shopHaveServices as $data): ?>
		<blockquote>
			<p>
				<?php echo $no++.".".$data->service->list; ?>
			</p>
			<small>
				ราคา 
				<?php 
					if($data->price_min != 0) {
						echo $data->price_min." - ".$data->price_max; 
					} else {
						echo $data->price_max; 
					}
				?> บาท.
			</small>
		</blockquote>
		<?php endforeach; ?>	

		<hr />
		<!-- Show Google Maps API -->
		<div id="map_canvas"></div> 

	</div>
</div>

<!-- Script Google Maps API V3.2 -->
<?php echo CHtml::scriptFile('http://code.jquery.com/jquery-1.4.2.min.js');?>
<script type="text/javascript">  
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
function initialize() { // ฟังก์ชันแสดงแผนที่  
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
    // กำหนดจุดเริ่มต้นของแผนที่  
    var my_Latlng  = new GGM.LatLng(<?php echo $model->latitude; ?>, <?php echo $model->longitude; ?>);  
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง  
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
    var my_DivObj=$("#map_canvas")[0];   
    // กำหนด Option ของแผนที่  
    var myOptions = {  
        zoom: <?php echo $model->zoom; ?>, // กำหนดขนาดการ zoom  
        center: my_Latlng , // กำหนดจุดกึ่งกลาง  
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่  
    };  
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  
    
    //รูปของ Marker หลัก
    var content = '<strong><?php echo $model->shopname; ?></strong><br>'
           
            +'<img src2="files/images/<?php echo $model->pic; ?>"><br>'
            +'<?php echo $model->address; ?>';
    
    var infowindow = new google.maps.InfoWindow({
        content: content
    });
    
    map = new GGM.Map(my_DivObj,myOptions);
    
    var content2 = '<strong><?php echo $model->shopname; ?></strong><br>'
            +'<img src="files/images/<?php echo $model->pic; ?>"><br>'
            +'<?php echo $model->address; ?>';
    
    var infowindow = new google.maps.InfoWindow({
        content: content2
    });
        
    
    infowindow.open(map,my_Marker);
    //Marker หลักของร้าน
    var my_Marker = new GGM.Marker({ // สร้างตัว marker  
        position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
        draggable:false, // กำหนดให้สามารถลากตัว marker นี้ได้  
        icon: 'images/yy.jpg',  
    }); 
    // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร  
    GGM.event.addListener(my_Marker, 'click', function() {  
        infowindow.open(map,my_Marker);
    });
    
    var my_Latlng2  = new GGM.LatLng(14.993768514863952, 102.11434484304414); 
    var my_Marker2 = new GGM.Marker({ // สร้างตัว marker  
        position: my_Latlng2,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
        draggable:false, // กำหนดให้สามารถลากตัว marker นี้ได้  
        icon: 'images/11.jpg',
    }); 
    GGM.event.addListener(my_Marker2, 'click', function() {  
        infowindow.open(map,my_Marker2);
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

<!-- CSS Google Maps API -->
<style type="text/css">
	div#map_canvas{
		margin:auto;
		width:600px;
		height:550px;
		overflow:hidden;
	}
</style>
<!-- END -->