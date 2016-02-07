<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>

<link rel="stylesheet" href="http://openlayers.org/en/v3.13.1/css/ol.css" type="text/css">

<div class="view" id="mapcontainer">
<div id="map" style="height: 600px"></div>
</div>
	
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
			<li><?php echo $this->Html->link(__('Telescopes list'), array('controller' => 'telescopes', 'action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Runs list'), array('controller' => 'runs', 'action' => 'index')); ?></li>
	</ul>
</div>

<script src="http://openlayers.org/en/v3.13.1/build/ol.js" type="text/javascript"></script>
<script type="text/javascript">
      var rome = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([12.5, 41.9]))
      });

      var london = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([-0.12755, 51.507222]))
      });

      var madrid = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([-3.683333, 40.4]))
      });

      rome.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          color: '#8959A8',
          src: '/CAKEPHP/E3RUNDB/img/openLayers/dot.png'
        }))
      }));

      london.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          color: '#4271AE',
          src: '/CAKEPHP/E3RUNDB/img/openLayers/dot.png'
        }))
      }));

      madrid.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          color: [113, 140, 0],
          src: '/CAKEPHP/E3RUNDB/img/openLayers/dot.png'
        }))
      }));


      var vectorSource = new ol.source.Vector({
        features: [rome, london, madrid]
      });

      var vectorLayer = new ol.layer.Vector({
        source: vectorSource
      });

      var rasterLayer = new ol.layer.Tile({
        source: new ol.source.OSM()
      });
	  
      var map = new ol.Map({
        layers: [rasterLayer, vectorLayer],
        target: document.getElementById('map'),
        view: new ol.View({
          center: ol.proj.fromLonLat([2.896372, 44.60240]),
          zoom: 5
        })
      });
</script>
