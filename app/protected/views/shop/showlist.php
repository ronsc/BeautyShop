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
        <div align="center">
		  <div id="map_canvas"></div> 
        </div>
	</div>
</div>

<!-- Script Google Maps API V3.2 -->
<script type="text/javascript" 
    src="https://maps.googleapis.com/maps/api/js?">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: { 
                lat: <?php echo $model->latitude; ?>, 
                lng: <?php echo $model->longitude; ?>
            },
            zoom: <?php echo $model->zoom; ?>
        };

        var mapObj = document.getElementById('map_canvas');
        var map = new google.maps.Map(mapObj, mapOptions);

        var icon1 = 'images/icon1.jpg'
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            title: 'this is marker',
            draggable: false,
            icon: icon1
        })

        var icon2 = 'images/icon2.jpg'
        var pos2  = new google.maps.LatLng(14.993768514863952, 102.11434484304414);
        var marker2 = new google.maps.Marker({
            position: pos2,
            map: map,
            title: 'this is marker 2',
            draggable: false,
            icon: icon2
        })

        var content = '<strong><?php echo $model->shopname; ?></strong><br>'
            +'<img src="files/images/<?php echo $model->pic; ?>"><br>'
            +'<?php echo $model->address; ?>';
        var infowindow = new google.maps.InfoWindow({
            content: content
        })
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker)
        })

        var content2 = '<strong><?php echo $model->shopname; ?></strong><br>'
            +'<img src="files/images/<?php echo $model->pic; ?>"><br>'
            +'<?php echo $model->address; ?>';
        var infowindow2 = new google.maps.InfoWindow({
            content: content2
        })
        google.maps.event.addListener(marker2, 'click', function() {
            infowindow2.open(map, marker2)
        })
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- END -->

<!-- CSS Google Maps API -->
<style type="text/css">
    #map_canvas{
        margin: 30px;
        width:90%;
        height:550px;
        overflow:hidden;
    }
</style>
<!-- END -->