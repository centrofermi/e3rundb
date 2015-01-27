<script type="text/javascript">
	var reset_function = null;
	$(function(){
		$("#ItemCode").focus();
		if($("#ItemCode").val().substr(-1)!=" " && $("#ItemCode").val() != ""){
			$("#ItemCode").val($("#ItemCode").val()+" ");//add space to the end if the last element isn't a space
		}else{
			$("#ItemCode").val($("#ItemCode").val());
		}
		$("#ItemIndexForm input[type=submit]").click(function(){
			//get last character in input field
			if($("#ItemCode").val().substr(-1)!=" " && $("#ItemCode").val() != ""){
				$("#ItemCode").val($("#ItemCode").val()+" ");//add space to the end if the last element isn't a space
			}else{
				$("#ItemCode").val($("#ItemCode").val());
			}
		});
	})
	function resetSearch(){
		//call the reset function if it has been initialized
		if(reset_function) reset_function();

		$("#ItemCode").val("");
		$("#ItemIndexForm input[type=submit]").click();
	}
</script>
<style type="text/css">
	#searchDIV{
		width:100%;
		display:inline-block;
  }
  /* allow the select boxes to float next to each other */
  .select_keepClosed, .select_keepOpen {
      display:inline-block;
      vertical-align:top;
      margin:5px;
      /* make the selects shrink on narrow monitors */
      width:100%;
      max-width: 30em;
  }
  .ms-parent, .ms-choice, .ms-choice div, .search_optional, .search_items {
      /* override cake.css form div rule for padding and margin */
      padding: 0;
      margin: 0;
  }
  .ms-drop, .select_keepClosed, .select_keepOpen {
      /* override cake.css form div rule for padding and margin */
      margin-bottom: 0;
  }
  .select_keepClosed select, .select_keepOpen select { width:100%; }
  /* The item_type, item_subtype and item_subtype_version selects should look
  more like stanadard multi selects as they are the most used ones. So we have to
  play a bit with the css markup */
  /* hide the combo box */
  .select_keepOpen .ms-choice {display:none;}
  /* show the parent all the time */
  .select_keepOpen .ms-parent {display:block; position:static;}
  .select_keepOpen .ms-drop.bottom {
      /* reset absolute position, z-index and width settings for the drop down */
      width: auto;
      top:auto;
      position:static;
      z-index:auto;
      /* it does not float anymore so no shadow */
      -webkit-box-shadow:none;
      box-shadow:none;
  }
  /* revert z-index */
  .select_keepOpen .ms-search {z-index: auto;}
  /* make the (select all) less prominent */
  .ms-select-all { font-style: italic; color:#999; }
  /* make the open selects all the same height */
  .select_keepOpen .ms-drop ul { height: 250px; }

  .input.checkbox{
  	display: inline-block;
  }
</style>

		<?php echo $this->Form->create('Run', array('style' => 'width: 100%', 'type' => 'get'));?>
			<fieldset>
				<div style="display: inline">
				<?php
					if(empty($filter['code'])) {
						echo $this->Form->input('code', array(
								'div' => false,
								'label' => false,
								'maxlength' => 3000,
								'placeholder' => 'Search items by code ...',
								'after' => '<div class="input-message" id="search">Extended search...</div>'));
					} else {
						echo $this->Form->input('code', array(
								'div' => false,
								'label' => false,
								'maxlength' => 3000,
								'placeholder' => 'Search items by code ...',
								'default' => $filter['code'],
								'after' => '<div class="input-message" id="search">Extended search...</div>'));
					}?>
				</div>

				<div class="search" id="searchDIV" style="display: none">
            <div class="search_optional">
						<div class="select_keepClosed"><?php
								if(empty($filter['tag_id']))
									$filter['tag_id'] = '';

								echo $this->Form->input('tag_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											'options' => $itemTags,
											'default' => $filter['tag_id'],
											'class' => 'multiple',
											'id' =>'tag_id')); ?>
						</div>
						<div class="select_keepClosed"><?php
								if(empty($filter['state_id']))
									$filter['state_id'] = '';

								echo $this->Form->input('state_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											'options' => $states,
											'default' => $filter['state_id'],
											'class' => 'multiple',
											'id' =>'state_id')); ?>
						</div>
						<div class="select_keepClosed"><?php
								if(empty($filter['item_quality_id']))
									$filter['item_quality_id'] = '';

								echo $this->Form->input('item_quality_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											'options' => $itemQualities,
											'default' => $filter['item_quality_id'],
											'class' => 'multiple',
											'id' =>'item_quality_id')); ?>
						</div>
						<div class="select_keepClosed"><?php
								if(empty($filter['location_id'])) $filter['location_id'] = '';
								echo $this->Form->input('location_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											'options' => $locations,
											'id' => 'location_id',
											'class' => 'multiple',
											'default' => $filter['location_id'])); ?>
						</div>
						<div class="select_keepClosed"><?php echo $this->Form->input('project_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											//'options' => array(),
											//'default' => $filter['project_id'],
											'class' => 'multiple',
											'id' => 'project_id')); ?>
						</div>
						<div class="select_keepClosed"><?php echo $this->Form->input('manufacturer_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											//'options' => $manufacturers,
											//'default' => $filter['manufacturer_id'],
											'class' => 'multiple',
											'id' => 'manufacturer_id')); ?>
            </div>
            </div><div class="search_items">
						<div class="select_keepOpen"><?php echo $this->Form->input('item_type_id', array(
											'div' => false, '
											size' => 18,
											'multiple' => true,
											//'options' => $itemTypes,
											//'default' => $filter['item_type_id'],
											'class' => 'multiple',
											'id' => 'item_type_id')); ?>
						</div>
						<div class="select_keepOpen"><?php echo $this->Form->input('item_subtype_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											//'options' => $itemSubtypes,
											//'default' => $filter['item_subtype_id'],
											'class' => 'multiple',
											'id' => 'item_subtype_id')); ?>
						</div>
						<div class="select_keepOpen"><?php echo $this->Form->input('item_subtype_version_id', array(
											'div' => false,
											'size' => 18,
											'multiple' => true,
											'options' => array(),
											//'default' => $filter['item_subtype_version_id'],
											'class' => 'multiple',
											'id' => 'item_subtype_version_id')); ?>
							<?php echo $this->Html->link(__('Show Changelog'), array('controller' => 'itemSubtypes', 'action' => 'changelog'), array('id' => 'show_changelog', 'target' => '_blank')); ?>
            </div>
            </div>
			</div>
			<div style="display:block"><?php
		 			if(empty($filter['show_all']) || $filter['show_all'] == 0) {
		 				$filter['show_all'] = false;
					} else if ($filter['show_all'] == 1) {
						$filter['show_all'] = true;
					}

					echo $this->Form->input('show_all', array(
											'div' => true,
											'size' => 18,
											'type' => 'checkbox',
											'checked' => $filter['show_all'],
											'after' => '<div class="input-message">Show also attached items</div>'));

					if(empty($filter['limit']))
						$filter['limit'] = 50;

					$limits = array(25 => '25', 50 => '50', 100 => '100', 200 => '200', 500 => '500');
					echo "<div class='input checkbox'>".$this->Form->input('limit', array(
											'options' => $limits,
											'div' => false,
											'selected' => $filter['limit'],
											'label' => 'Results/page'))."</div>";
				?>
			</div>
			<?php echo $this->Js->submit('Search', array(
							//'url'=> array('controller'=>'transfers', 'action'=>'addToCart'),
							'update'=>'#results',
							'div' => false
						));
			?>
			<input type="button" onclick="resetSearch()" value="Reset" style="width:80px; height:25px; font-size:110%;"/>
		</fieldset>
		<?php echo $this->Form->end(); ?>
		<script type="text/javascript">
				//Select all items for tag, state, quality and location if none is
				//selected as that makes no sense
				$("#tag_id, #state_id, #item_quality_id, #location_id").each(function(index){
						if($(this).val() === null){
								$(this).find("option").prop("selected", true);
						}
				});
				var search_values = <?php echo $this->My->toJson($itemSubtypeVersions); ?>;
				reset_function = init_searchItemsForm(search_values[0], search_values[1], search_values[2]);
		</script>
