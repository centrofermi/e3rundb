<?php
//$this->Html->addCrumb($this->params['controller'], 'telescopes/index');
?>

<div class="telescopes view_map">

	<link rel="stylesheet" href="http://openlayers.org/en/v3.13.1/css/ol.css" type="text/css">

	<div class="view" id="mapcontainer">
		<h2><?php echo __('Telescopes network'); ?></h2>
		<div id="map" style="height: 600px"></div>
	</div>
	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
<!--		<li><?php echo $this->Html->link(__('Back'), $this->request->referer()); ?></li> -->
		<li><?php echo $this->Html->link(__('Back'), array('controller' => 'pages','action' => 'index')); ?></li>
	</ul>
</div>

<script src="http://openlayers.org/en/v3.13.1/build/ol.js" type="text/javascript"></script>
<script type="text/javascript">

	var test = "totConfFound";
	var totTel = parseInt(jsVars.totConfFound);
	var Telescopes = new Array();
	var lon = 0;
	var lat = 0; 
	
	var iTel = 0;
	var jTel = 0;
	while(iTel<totTel){
				
		iTel++;

		var lon_name = "lon_"; lon_name+=iTel;
		var lat_name = "lat_"; lat_name+=iTel;
		lon = parseFloat(jsVars[lon_name]); 
		if(isNaN(lon)){continue;}
		lat = parseFloat(jsVars[lat_name]);
		if(isNaN(lat)){continue;}
		
		//alert(lon);
		if((lon<5. || lon>20.) || (lat<30. || lat>50.))
		{ 
			//alert(lon);
            continue;			
		}
		
		Telescopes[jTel] = new ol.Feature({
			geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat]))
		});
 
		Telescopes[jTel].setStyle(new ol.style.Style({
			image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
			color: '#00FF00',
			src: '/CAKEPHP/E3RUNDB/img/openLayers/dot.png'
			}))
		}));
		
		jTel++;

    }

	var vectorSource = new ol.source.Vector({
		features: Telescopes
	});

      var vectorLayer = new ol.layer.Vector({
        source: vectorSource
      });

      var rasterLayer = new ol.layer.Tile({
        source: new ol.source.OSM()
      });
	  
	lat = 41.89705;
	lon = 12.49423;
    var map = new ol.Map({
		layers: [rasterLayer, vectorLayer],
        target: document.getElementById('map'),
        view: new ol.View({
          center: ol.proj.fromLonLat([lon, lat]),
          zoom: 6
		})
    });
	
</script>

