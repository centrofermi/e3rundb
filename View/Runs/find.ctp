<script type="text/javascript" charset="utf-8">
	
	var itsclicked = false;
	var absurl = '<?php echo $this->Html->url(array('controller' => 'runs', 'action' => 'find'), false); ?>';
	/*if(absurl.indexOf("www.cnaf.infn.it")>0){
		absurl = absurl.replace("http","https");
		absurl = absurl.replace("www.cnaf.infn.it","www.cnaf.infn.it/eee");
	}*/
	
	function updateSearch(){
	
		var queryurl = absurl;
		queryurl += '?';
		queryurl += 'station_name=' + $('#station_name').val();
		
		queryurl += '&';
		if($('#select_from_date').val() != '') from_date = $('#select_from_date').val();
		else from_date = '2014-01-01';
		if($('#select_to_date').val() != '') to_date = $('#select_to_date').val();
		else to_date = '2114-01-01';
		queryurl += 'creationDateBetween=' + from_date + '+-+' + to_date;

		queryurl += '&';
		if($('#select_from_runID').val() != '') from_runID = $('#select_from_runID').val();
		else from_runID = '0';
		if($('#select_to_runID').val() != '') to_runID = $('#select_to_runID').val();
		else to_runID = '1000000';		
		queryurl += 'runIDBetween=' + from_runID + '+-+' + to_runID;		
		
		alert(queryurl);
		$.ajax({
			url: queryurl,
			cache: false,
			type: 'GET',
			dataType: 'HTML',
			success: function(data) {
				alert(data);
				$('#searchButton').val(data);
				$('#searchButton').show();
			}
		});
	
	};
	
	$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
		alert(thrownError);
	});
	
	$(document).ready(function(){
	
		$('#searchButton').hide();

		$('#station_name').change(function() {  updateSearch();} );

		//Date from-to
		var datestr = $('#RunCreationDateBetween').val();
		if(datestr){
			var dates = datestr.split(" - ");
			$('#select_from_date').val(dates[0]);
			$('#select_to_date').val(dates[1]);
		}
		
		$('#select_from_date').change(function() {
					    
			$('#RunCreationDateBetween').val(  $(this).val() + ' - ' +  $('#select_to_date').val() );
            updateSearch();
			
		});
						
		$('#select_to_date').change(function() {
		
			$('#RunCreationDateBetween').val(  $('#select_from_date').val() + ' - ' +  $(this).val() );
            updateSearch();

		});

		$('#datepicker_from_img img').click(function(){
			$('#datepicker_from').datepicker({

			   dateFormat: 'yy-mm-dd',
			   onSelect: function(dateText, inst){
					 $('#select_from_date').val(dateText);
					 $('#select_from_date').trigger('change');
					 $('#datepicker_from').datepicker('destroy');
				}
			  
			});
		});
		
		$('#datepicker_to_img img').click(function(){
			$('#datepicker_to').datepicker({

			   dateFormat: 'yy-mm-dd',
			   onSelect: function(dateText, inst){
					$('#select_to_date').val(dateText);
					$('#select_to_date').trigger('change');
					$('#datepicker_to').datepicker('destroy');
				}
			  
			});
		});

		//RunID from-to
		var runIDstr = $('#RunRunIDBetween').val();
		if(runIDstr){
			var runIDs = runIDstr.split(" - ");
			$('#select_from_runID').val(runIDs[0]);
			$('#select_to_runID').val(runIDs[1]);
		}
		
		$('#select_from_runID').change(function() {
					    
			$('#RunRunIDBetween').val(  $(this).val() + ' - ' +  $('#select_to_runID').val() );
            updateSearch();
			
		});
						
		$('#select_to_runID').change(function() {
		
			$('#RunRunIDBetween').val(  $('#select_from_runID').val() + ' - ' +  $(this).val() );
            updateSearch();

		});


		
    });
	
	/*$(function() {

		var creationDateBetweenSlider = $('#creationDateBetweenSlider');
		var institutionCreationDateBetween = $('#RunCreationDateBetween');
		var lock = 0;

		creationDateBetweenSlider.slider({
			range: true,
			min: 1900,
			max: 2050,
			values: [ 2000, 2013 ],
			slide: function( event, ui ) {
				institutionCreationDateBetween.val(  ui.values[ 0 ] + ' - ' + ui.values[ 1 ] );
			}
		});
		
		if(lock != 0) 
			institutionCreationDateBetween.val( 
				creationDateBetweenSlider.slider( 'values', 0 ) + ' - ' + creationDateBetweenSlider.slider( 'values', 1 ) 
			);
		lock = 1;

	});*/
	
</script>

<?php
	$this->Html->addCrumb('Search', '/runs/find');
	
	//Get url query parameters
	$params = null;
	$splitUrl = explode('?',$this->request->here());
	if (array_key_exists(1, $splitUrl)) {
		$params = $splitUrl[1];
		//debug($params);
	}

?>
		
<div class="runs form">

	<div id="results">
	<table cellpadding="0" cellspacing="0" id="prova">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('station_name_id','Telescope ID'); ?></th>
				<!-- <td><?php echo $this->Html->link(__($run['Run']['station_name']), array('controller' => 'telescopes', 'action' => 'view', $run['Run']['telescope_id'])); ?>&nbsp;</td> -->
			<th><?php echo $this->Paginator->sort('run_date'); ?></th>
			<th><?php echo $this->Paginator->sort('run_id','Run ID'); ?></th>
			<th><?php echo $this->Paginator->sort('transfer_timestamp'); ?></th>
			<th><?php echo $this->Paginator->sort('unique_run_id','Unique Run ID'); ?></th>
			<th><?php echo $this->Paginator->sort('run_start','Start Time'); ?></th>
			<th><?php echo $this->Paginator->sort('run_stop','Stop Time'); ?></th>
			<th><?php echo $this->Paginator->sort('run_tag','Tag'); ?></th>
			<th><?php echo $this->Paginator->sort('run_comment','Comment'); ?></th>
			<th><?php echo $this->Paginator->sort('num_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_hit_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_track_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_no_hit_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_no_hits_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_malformed_events'); ?></th>
			<th><?php echo $this->Paginator->sort('num_backward_events'); ?></th>
			<th><?php echo $this->Paginator->sort('processing_status_code'); ?></th>
			<th><?php echo $this->Paginator->sort('e3pipe_version'); ?></th>
			<th><?php echo $this->Paginator->sort('last_processing'); ?></th>
			<th><?php echo $this->Paginator->sort('last_update'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($runs as $run): ?>
	<tr>
		<td><?php echo h($run['Run']['station_name']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_date']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_id']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['transfer_timestamp']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['unique_run_id']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_start']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_stop']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_tag']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['run_comment']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_hit_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_track_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_no_hit_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_no_hits_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_malformed_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['num_backward_events']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['processing_status_code']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['e3pipe_version']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['last_processing']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['last_update']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $run['Run']['unique_run_id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $run['Run']['unique_run_id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $run['Run']['unique_run_id']), array(), __('Are you sure you want to delete # %s?', $run['Run']['unique_run_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

</div>

<div class="actions">
	<h3><?php echo __('Search'); ?></h3>
	<?php
		echo $this->Form->create('Run', 
			array(
				'url' => array_merge(
					array('action' => 'find'),
					$this->params['pass']
				),
				'type' => 'get',
				'onsubmit' => 'return itsclicked;'
			)
		);
												
		echo $this->Form->input('station_name', 
			array(
				'div' => false,
				'label' => 'Telescope ID',
				'id' => 'station_name'
			)
		);
		
		echo '<label>Run Date</label>';
		echo '<div class="leftalign">';
		echo $this->Form->input('date_from',
			array(
				'label' => 'From',
				'type' => 'text', 
                'error' => false , 
				'id' => 'select_from_date',
				'div' => false,
			)
		);
		echo $this->Html->div('datepicker_from_img w100p fl pl460p pa', 
			$this->Html->image('datepicker_calendar_icon.gif'),
			array('id' => 'datepicker_from_img')
		);
        echo $this->Html->div('datepicker_from fl pl460p pa',
			' ' ,
			array('id' => 'datepicker_from')
		);
		echo '</div>';
		echo '<div class="rightalign">';
				echo $this->Form->input('date_to',
			array(
				'label' => 'To',
				'type' => 'text', 
                'error' => false , 
				'id' => 'select_to_date',
				'div' => false,
			)
		);
		echo $this->Html->div('datepicker_to_img w100p fl pl460p pa', 
			$this->Html->image('datepicker_calendar_icon.gif'),
			array('id' => 'datepicker_to_img')
		);
		echo $this->Html->div('datepicker_to fl pl460p pa',
			' ' ,
			array('id' => 'datepicker_to')
		);
		echo '</div>';
		
		echo $this->Form->input('creationDateBetween', 
			array(
				'label' => false,
				'div' => false,
				'style' => 'display: none;'
			)
		);
		
        echo '<label>Run ID</label>';
		echo '<div class="leftalign">';
		echo $this->Form->input('runID_from',
			array(
				'label' => 'From',
				'type' => 'text', 
                'error' => false , 
				'id' => 'select_from_runID',
				'div' => false,
			)
		);
		echo '</div>';
		echo '<div class="rightalign">';
				echo $this->Form->input('runID_to',
			array(
				'label' => 'To',
				'type' => 'text', 
                'error' => false , 
				'id' => 'select_to_runID',
				'div' => false,
			)
		);
		echo '</div>';

		echo $this->Form->input('runIDBetween', 
			array(
				'label' => false,
				'div' => false,
				'style' => 'display: none;'
			)
		);
		
		echo '<div class="empty">&nbsp;</div>';		
		echo $this->Form->submit('Search', 
			array(
				'onmousedown' => 'itsclicked = true; return true;',
				'onkeydown' => 'itsclicked = true; return true;',
				'div' => false,
				'id' => 'searchButton'
			)
		);
		echo $this->Form->end();

	?>
	
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cancel'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Download table as .csv'), array('action' => 'export', '?' => $params)); ?></li>
	</ul>

</div>

