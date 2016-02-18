<?php
	echo $this->Html->css('ol');
	echo $this->Html->script('jquery-1.10.2', array('inline'=>false));	
	echo $this->Html->script('ol', array('inline'=>false));	
	echo $this->Html->script('bootstrap.min', array('inline'=>false));	
?>

<div class="telescopes view_map">

	<div class="view" id="mapcontainer">
		<h2><?php echo __('Telescopes network'); ?></h2>
		<div id="map" style="height: 600px"><div id="popup"></div></</div>
	</div>
	
	<form class="form-inline">
		<?php echo $this->Form->input('measure', array(
			'type'=>'checkbox',
			'label'=>array('text'=>'Enable ruler &nbsp;','id'=>'enableRuler'))); 
		?>		
		<input type="hidden" id="type" value="length">
		<input type="hidden" id="geodesic" checked>
<!--
		<label class="checkbox">
		<input type="checkbox" id="geodesic">
		use geodesic measures
		</label>
-->
	</form>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
<!--
		<li><?php echo $this->Html->link(__('Back'), $this->request->referer()); ?></li> 
-->
		<li><?php echo $this->Html->link(__('Run list'), array('controller' => 'Runs','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Telescope list'), array('controller' => 'Telescopes','action' => 'index')); ?></li>
	</ul>
</div>

<script type="text/javascript">

	var markerImgPath = jsVars.absImgPath.concat("openLayers/eeeIcon.png");
	var totTel = parseInt(jsVars.totConfFound);
    var wgs84Sphere = new ol.Sphere(6378137);

    var measurementCheckbox = document.getElementById('measure');
	var typeSelect = document.getElementById('type');
    var geodesicCheckbox = document.getElementById('geodesic');
	
    var draw; // global so we can remove it later

	var raster = new ol.layer.Tile({
		source: new ol.source.OSM()
    });

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

	var telescopesSource = new ol.source.Vector({
		features: Telescopes
	});
	
	var telescopesVector = new ol.layer.Vector({
		source: telescopesSource
	});
    
	var source = new ol.source.Vector();

	var vector = new ol.layer.Vector({
		source: source,
		style: new ol.style.Style({
			fill: new ol.style.Fill({
				color: 'rgba(255, 255, 255, 0.2)'
			}),
			stroke: new ol.style.Stroke({
				color: '#ffcc33',
				width: 2
			}),
			image: new ol.style.Circle({
				radius: 7,
				fill: new ol.style.Fill({
					color: '#ffcc33'
				})
			})
		})
	});


	/**
	* Currently drawn feature.
	* @type {ol.Feature}
	*/
	var sketch;

	/**
	* The help tooltip element.
	* @type {Element}
	*/
	var helpTooltipElement;

	/**
	* Overlay to show the help messages.
	* @type {ol.Overlay}
	*/
	var helpTooltip;

	/**
	* The measure tooltip element.
	* @type {Element}
	*/
	var measureTooltipElement;

	/**
	* Overlay to show the measurement.
	* @type {ol.Overlay}
	*/
	var measureTooltip;

	/**
	* Message to show when the user is drawing a polygon.
	* @type {string}
	*/
	var continuePolygonMsg = 'Click to continue drawing the polygon';

	/**
	* Message to show when the user is drawing a line.
	* @type {string}
	*/
	var continueLineMsg = 'Click to continue drawing the line';

	/**
	* Handle pointer move.
	* @param {ol.MapBrowserEvent} evt The event.
	*/
	var pointerMoveHandler = function(evt) {
		if (evt.dragging) {
		return;
		}
		/** @type {string} */
		var helpMsg = 'Click to start drawing';

		if (sketch) {
			var geom = (sketch.getGeometry());
			if (geom instanceof ol.geom.LineString) {
				helpMsg = continueLineMsg;
			}
		}

		helpTooltipElement.innerHTML = helpMsg;
		helpTooltip.setPosition(evt.coordinate);

		if(measurementCheckbox.checked) $(helpTooltipElement).removeClass('hidden');
	};

	lat = 41.89705;
	lon = 12.49423;
    var map = new ol.Map({
		layers: [raster, vector, telescopesVector],
        target: document.getElementById('map'),
        view: new ol.View({
          center: ol.proj.fromLonLat([lon, lat]),
          zoom: 6
		})
    });

    map.on('pointermove', pointerMoveHandler);

	$(map.getViewport()).on('mouseout', function() {
        $(helpTooltipElement).addClass('hidden');
    });
	
	var element = document.getElementById('popup');
	
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
				$(element).data('bs.popover').options.placement = 'top';
				$(element).data('bs.popover').options.html = true;
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
	map.on('pointermove', function(evt) {
		if (evt.dragging) {
		  $(element).popover('destroy');
		  return;
		}
		
		var pixel = map.getEventPixel(e.originalEvent);
		var hit = map.hasFeatureAtPixel(pixel);
		map.getTarget().style.cursor = hit ? 'pointer' : '';
	});


      /**
       * Format length output.
       * @param {ol.geom.LineString} line The line.
       * @return {string} The formatted length.
       */
      var formatLength = function(line) {
        var length;
        if (geodesicCheckbox.checked) {
          var coordinates = line.getCoordinates();
          length = 0;
          var sourceProj = map.getView().getProjection();
          for (var i = 0, ii = coordinates.length - 1; i < ii; ++i) {
            var c1 = ol.proj.transform(coordinates[i], sourceProj, 'EPSG:4326');
            var c2 = ol.proj.transform(coordinates[i + 1], sourceProj, 'EPSG:4326');
            length += wgs84Sphere.haversineDistance(c1, c2);
          }
        } else {
          length = Math.round(line.getLength() * 100) / 100;
        }
        var output;
        if (length > 100) {
          output = (Math.round(length / 1000 * 100) / 100) +
              ' ' + 'km';
        } else {
          output = (Math.round(length * 100) / 100) +
              ' ' + 'm';
        }
        return output;
      };


	function addInteraction() {
		draw = new ol.interaction.Draw({
			source: source,
			type: /** @type {ol.geom.GeometryType} */ 'LineString',
			style: new ol.style.Style({
				fill: new ol.style.Fill({
					color: 'rgba(255, 255, 255, 0.2)'
				}),
				stroke: new ol.style.Stroke({
					color: 'rgba(0, 0, 0, 0.5)',
					lineDash: [10, 10],
					width: 2
				}),
				image: new ol.style.Circle({
					radius: 5,
					stroke: new ol.style.Stroke({
					color: 'rgba(0, 0, 0, 0.7)'
				}),
				fill: new ol.style.Fill({
						color: 'rgba(255, 255, 255, 0.2)'
					})
				})
			})
		});
		
		map.addInteraction(draw);

        createMeasureTooltip();
        createHelpTooltip();

        var listener;
        draw.on('drawstart',
            function(evt) {
				// set sketch
				sketch = evt.feature;

				/** @type {ol.Coordinate|undefined} */
				var tooltipCoord = evt.coordinate;

				listener = sketch.getGeometry().on('change', function(evt) {
					var geom = evt.target;
					var output;
					if (geom instanceof ol.geom.Polygon) {
						output = formatArea(/** @type {ol.geom.Polygon} */ (geom));
						tooltipCoord = geom.getInteriorPoint().getCoordinates();
					} else if (geom instanceof ol.geom.LineString) {
						output = formatLength(/** @type {ol.geom.LineString} */ (geom));
						tooltipCoord = geom.getLastCoordinate();
					}
					measureTooltipElement.innerHTML = output;
					measureTooltip.setPosition(tooltipCoord);
				});
            }, this);

        draw.on('drawend',
            function() {
				measureTooltipElement.className = 'tooltip tooltip-static';
				measureTooltip.setOffset([0, -7]);
				// unset sketch
				sketch = null;
				// unset tooltip so that a new one can be created
				measureTooltipElement = null;
				createMeasureTooltip();
				ol.Observable.unByKey(listener);
			}, this);
	}	


      /**
       * Creates a new help tooltip
       */
      function createHelpTooltip() {
        if (helpTooltipElement) {
          helpTooltipElement.parentNode.removeChild(helpTooltipElement);
        }
        helpTooltipElement = document.createElement('div');
        helpTooltipElement.className = 'tooltip hidden';
        helpTooltip = new ol.Overlay({
          element: helpTooltipElement,
          offset: [15, 0],
          positioning: 'center-left'
        });
        map.addOverlay(helpTooltip);
      }


      /**
       * Creates a new measure tooltip
       */
      function createMeasureTooltip() {
        if (measureTooltipElement) {
          measureTooltipElement.parentNode.removeChild(measureTooltipElement);
        }
        measureTooltipElement = document.createElement('div');
        measureTooltipElement.className = 'tooltip tooltip-measure';
        measureTooltip = new ol.Overlay({
          element: measureTooltipElement,
          offset: [0, -15],
          positioning: 'bottom-center'
        });
        map.addOverlay(measureTooltip);
      }


      /**
       * Let user change the geometry type.
       */
      measurementCheckbox.onchange = function() {
        
		if(measurementCheckbox.checked){
			addInteraction();
		}
		else{
			map.removeInteraction(draw);
			createMeasureTooltip();
		}
		
      };

</script>

	