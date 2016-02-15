<?php
	echo $this->Html->css('ol');
	echo $this->Html->script('ol', array('inline'=>false));	
	echo $this->Html->script('bootstrap.min', array('inline'=>false));	
	
?>

<div class="telescopes view_map">

	<div class="view" id="mapcontainer">
		<h2><?php echo __('Telescopes network'); ?></h2>
		<div id="map" style="height: 600px"><div id="popup"></div></</div>
	</div>
	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
<!--		<li><?php echo $this->Html->link(__('Back'), $this->request->referer()); ?></li> -->
		<li><?php echo $this->Html->link(__('Run list'), array('controller' => 'Runs','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Telescope list'), array('controller' => 'Telescopes','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Back'), array('controller' => 'pages','action' => 'index')); ?></li>
	</ul>
</div>

<script type="text/javascript">

	var markerImgPath = jsVars.absImgPath.concat("openLayers/eeeIcon.png");
	var totTel = parseInt(jsVars.totConfFound);
	
	var Telescopes = new Array();
	var telName;
	var lon = 0; var lat = 0; 	
	var iTel = 0; var jTel = 0;
	while(iTel<totTel){
				
		iTel++;

		var telName_name = "name_"; telName_name+=iTel;
		telName = jsVars[telName_name]; 
		var lon_name = "lon_"; lon_name+=iTel;
		lon = parseFloat(jsVars[lon_name]); 
		if(isNaN(lon)){continue;}
		var lat_name = "lat_"; lat_name+=iTel;
		lat = parseFloat(jsVars[lat_name]);
		if(isNaN(lat)){continue;}
		
		//alert(lon);
		if((lon<5. || lon>20.) || (lat<30. || lat>50.))
		{ 
			//alert(lon);
            continue;			
		}
		
		Telescopes[jTel] = new ol.Feature({
			geometry: new ol.geom.Point(ol.proj.fromLonLat([lon, lat])),
			name: telName
		});
 
		Telescopes[jTel].setStyle(new ol.style.Style({
			image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
			anchor: [0.5, 46],
			anchorXUnits: 'fraction',
			anchorYUnits: 'pixels',
			src: markerImgPath
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
	
	var element = document.getElementById('popup');
	$(element).popover({
		'placement': 'top',
		'html': true,
	});
	
	var popup = new ol.Overlay({
		element: element,
		positioning: 'bottom-center',
		stopEvent: false
	});
	map.addOverlay(popup);

	// display popup on click
	var curr_feature_name;
	var popShown = false;
	map.on('click', function(evt) {
		var feature = map.forEachFeatureAtPixel(evt.pixel,
			function(feature) {
			  return feature;
			});
		
		if (feature){
			curr_feature_name = feature.get('name');
			popup.setPosition(evt.coordinate);
			if($(element).data('bs.popover')) {
				$(element).data('bs.popover').options.content = curr_feature_name;
			}
			$(element).popover('show');
			$(element).on('shown.bs.popover', function () {
				popShown = true;
			})
		} else { 
			$(element).popover('hide');
		}
	});

	// change mouse cursor when over marker
	map.on('pointermove', function(e) {
	if (e.dragging) {
	  $(element).popover('destroy');
	  return;
	}
	var pixel = map.getEventPixel(e.originalEvent);
	var hit = map.hasFeatureAtPixel(pixel);
	map.getTarget().style.cursor = hit ? 'pointer' : '';

	});
	
</script>

	