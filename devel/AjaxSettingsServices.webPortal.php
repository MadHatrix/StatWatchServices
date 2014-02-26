<script language="text/javascript">
function updateSite(){
	var serviceSite = document.getElementById("sitePicker").value;
	$('#load-ajax-services').html('<div id="load-ajax"><img class="load-ajax" src="/media/images/loading.gif" alt="Loading..." title="Loading Content"/></div>');
	$('#load-ajax-services').load('/ajax/settings/services/list?chain=<? echo $chain?>&siteID='+serviceSite+'&pc='+document.getElementById("pc").value);
	$("#message_post_settings").html("");
};

function loadServiceListOld(pc, indicatorY) {
    $('#load-ajax-services').html('<div id="load-ajax"><img class="load-ajax" src="/media/images/loading.gif" alt="Loading..." title="Loading Content"/></div>');
    $('#load-ajax-services').load('/ajax/settings/services/list?chain=<?=$chain?>&siteID='+$("#sitePicker").val()+'&pc='+pc);
    $('.settings-pc-indicator').animate({top: indicatorY + 20}, 'fast');
    $('#pc').val(pc);
    return false;
}
function loadServiceList(pc, indicatorY) {
	var loadDiv = '#load-ajax-services-'+pc;
	$(loadDiv).html('<div id="load-ajax"><img class="load-ajax" src="/media/images/loading.gif" alt="Loading..." title="Loading Content"/></div>');
	$(loadDiv).load('/ajax/settings/services/list?chain<?=$chain?>&siteID='+$("#sitePicker").val()+'&pc='+pc);
	$('.settings-pc-indicator');
	//console.log(loadDiv + ' - ' + pc);
	$('#pc').val(pc);
	return false;
}
</script>
<div class="large-table-wrapper">
	<h3>Top Services -
	    <select id="sitePicker" onChange="updateSite(this)">
	    <?
	    foreach ($sitesList as $siteArray) {
	        foreach ($siteArray as $site) {
	            if ($site['siteID']) {
	                echo "<option value='".$site['siteID']."'>".$site['siteID']."</option>";
	            }
	        }
	    } ?>
	    </select><br /><br />
	    <!--By default, StatWatch shows the top 10 services sold per profit center in 'Top Services'.<br>
	    To use a custom list, select up to 10 services per profit center to display. <br/>-->
	</h3><br/>
	<div class="wrap-services">
		<!-- start new code -->
		<div id="sitegroup-accordion" style="clear:both;">
			<?php /*
			$accordionVal = 0;
			$currentVal = 0;

			foreach ($profitCenterArray as $profitCenterRaw){
				foreach ($profitCenterRaw as $profitCenter){
					if ($profitCenter == $_GET['pc']) {
						$accordionVal = $currentVal;
					}
					$currentVal++;
					if ($profitCenter == 0) {
			            continue;
			        }
			        switch ($profitCenter){
			            case 1:
			                $profitCenterName="wash";
			                $profitCenterLabel="Wash";
			                break;
			            case 3:
			                $profitCenterName="lube";
			                $profitCenterLabel="Lube";
			                break;
			            case 4:
			                $profitCenterName="detail";
			                $profitCenterLabel="Detail";
			                break;
			            case 5:
			                $profitCenterName="express-detail";
			                $profitCenterLabel="Express";
			                break;
			            case 2:
			                $profitCenterName="store";
			                $profitCenterLabel="Store";
			                break;
			            case 6:
			                $profitCenterName="other";
			                $profitCenterLabel="Other";
			                break;
			        } ?>
			        <h3 class="" id="pc-settings-<?= $profitCenterName; ?>"><a href="#"><?= htmlspecialchars($profitCenterName); ?></a></h3>
			        <div class="sitegroup-container">
			        	<!--<ul>
			        		<li class="settings-select-pc" id="pc-settings-<? echo $profitCenterName; ?>"><a href="#"><? echo $profitCenterLabel; ?></a></li>
						</ul>-->
						<div id="load-ajax-services-<?=$profitCenter;?>" style="clear:both;"></div>

			        </div>
					<?
				}
			}
			*/?>
			<?php /*
		</div>

		<div id="sitegroup-accordion" style="clear:both;">
	        <?
		        $accordionVal = 0;
		        $currentVal = 0;
		        foreach ($siteGroups as $group) {
		            if ($group['groupID'] == $_GET['group']) {
		                $accordionVal = $currentVal;
		            }
		            $currentVal++;
	        ?>
	        <h3><?= htmlspecialchars($group['groupName']); ?></h3>
	        <div class="sitegroup-container">
	            <form method="post" action="/ajax/settings/org/group/edit" name="group-sites-<?= $group['groupID']; ?>" id="group-sites-<?= $group['groupID']; ?>">
	                <label>Group Name:</label>
	                <input type="text" name="name" class="group-name" value="<?= htmlspecialchars($group['groupName']); ?>">
	                <span class="group-message" style="font-size:12px;display:inline-block;margin-left:15px;"></span>
	                <br>
	                <input type="hidden" name="groupID" value="<?= $group['groupID']; ?>">
	                <input type="hidden" name="action" value="edit">
	                <? foreach ($sitesInChain as $site) {
	                    $checked = '';
	                    foreach ($site['groups'] as $siteGroupID) {
	                        if ($siteGroupID == $group['groupID']) {
	                            $checked = 'checked';
	                            break;
	                        }
	                    } ?>
	                        <div class="sitegroup-site <?=$checked?>">
	                            <div class="header"><input type="checkbox" name="<?= $site['siteID']; ?>" value="<?= $site['siteID']; ?>" <?= $checked; ?>> <?= $site['siteID'] ?></div>
	                            <div class="body"><?= $site['siteName'] ?> (<?= $site['city'] ?>, <?= $site['state'] ?>)</div>
	                        </div>
	                <? } ?>
	                <br style="clear:both;">
	                <div style="margin-top:10px;">
	                    <button type="submit" class="gradient-button">Save Changes</button>
	                    <? if ($group['userCount'] == 0) { ?>
	                        <button type="button" class="gradient-button" onclick="deleteGroup(<?=$group['groupID']?>);">Delete Group</button>
	                    <? } else { ?>
	                        <div style="display:inline; font-size:0.8em; color:#5C5C5C; margin-left:5px;">This group cannot be deleted because <?=$group['userCount']. ' user'.($group['userCount'] > 1 ? 's are' : ' is')?> assigned to it.</div>
	                    <? } ?>
	                </div>
	            </form>
	        </div>
	        <? } ?>
	        <h3>* Add a New Site Group</h3>
	        <div class="sitegroup-container">
	            <form method="post" action="/ajax/settings/org/group/edit" name="group-sites-add" id="group-sites-add">
	                <label>Group Name:</label>
	                <input type="text" name="name" class="group-name" value="">
	                <span class="group-message" style="font-size:12px;display:inline-block;margin-left:15px;"></span>
	                <br>
	                <input type="hidden" name="action" value="add">
	                <? foreach ($sitesInChain as $site) { ?>
	                    <div class="sitegroup-site">
	                        <div class="header"><input type="checkbox" name="<?= $site['siteID']; ?>" value="<?= $site['siteID']; ?>"> <?= $site['siteID'] ?></div>
	                        <div class="body"><?= $site['siteName'] ?> (<?= $site['city'] ?>, <?= $site['state'] ?>)</div>
	                    </div>
	                <? } ?>
	                <br style="clear:both;">
	                <div style="margin-top:10px;">
	                    <button type="submit" class="gradient-button">Add Site Group</button>
	                </div>
	            </form>
	        </div>
	    </div>

		<script type="text/javascript">
			$(document).ready(function(){
			    var lastFadeHandle = null;
			    $('#week-start').change(function() {
			        if (lastFadeHandle != null) {
			            clearTimeout(lastFadeHandle);
			        }
			        $('#week-start-message').fadeIn('fast');
			        $('#week-start-message').html('<img src="/media/images/ajax-snake.gif">');
			        $.ajax({
			            url: '/ajax/settings/org/edit',
			            type: 'POST',
			            dataType: 'json',
			            data: {weekStart: $('#week-start').val()},
			            async: false,
			            success: function(response) {
			                if (response.Success) {
			                    $('#week-start-message').css('color', '#0b0');
			                    $('#week-start-message').html('Saved!');
			                    lastFadeHandle = setTimeout(function(){
			                        $('#week-start-message').fadeOut();
			                        lastFadeHandle = null;
			                    }, 1000);
			                } else {
			                    $('#week-start-message').css('color', '#b00');
			                    $('#week-start-message').html('An error occurred trying to save your changes. Please try again.');
			                }
			            },
			            error: function(xhr, ajaxOptions, thrownError) {
			                $('#week-start-message').css('color', '#b00');
			                $('#week-start-message').html('An error occurred trying to save your changes. Please try again.');
			            }
			        });
			    });

			    <? if ($siteCount > 1) { ?>
			    var options;
			    <? foreach ($siteGroups as $group) { ?>
			    options = {
			        dataType: 'json',
			        success: function(response){
			            if (response.Success) {
			                $('#load-ajax-settings').load('/ajax/settings/org?message=Site+group+saved+successfully.');
			            } else {
			                // Clear all other messages
			                $('.group-message').each(function() {
			                    $(this).html('');
			                });
			                $('#group-sites-<?= $group['groupID']; ?> .group-message').css('color', '#b00');
			                $('#group-sites-<?= $group['groupID']; ?> .group-message').html(response.Message);
			            }
			        }
			    };
			    $('#group-sites-<?= $group['groupID']; ?>').ajaxForm(options);
			    <? } ?>

			    options = {
			        dataType: 'json',
			        success: function(response){
			            if (response.Success) {
			                $('#load-ajax-settings').load('/ajax/settings/org?group=' + response.Group + '&message=Site+group+created+successfully.');
			            } else {
			                // Clear all other messages
			                $('.group-message').each(function() {
			                    $(this).html('');
			                });
			                $('#group-sites-add .group-message').css('color', '#b00');
			                $('#group-sites-add .group-message').html(response.Message);
			            }
			        }
			    };

			    $('#group-sites-add').ajaxForm(options);

			    $('#sitegroup-accordion').accordion({
			        activate: function( event, ui ) {
			            // This won't automatically focus on the group that's originally opened, but that seems like good behavior since the user could want to edit something other than groups
			            $(ui.newPanel).find('.group-name').focus();
			        },
			        active: <?=$accordionVal?>
			    });

			    $('.sitegroup-site').click(function(e) {
			        if ( ! $(e.target).is(':checkbox') ) {
			            if ($('input', this).is(':checked')) {
			                $(this).removeClass('checked');
			                $('input', this)[0].checked = false;
			            } else {
			                $(this).addClass('checked');
			                $('input', this)[0].checked = true;
			            }
			        } else {
			            // Need special logic to handle if the checkbox itself is clicked
			            if ($('input', this).is(':checked')) {
			                $(this).addClass('checked');
			            } else {
			                $(this).removeClass('checked');
			            }
			        }
			    });
			    <? } ?>
			});
			</script>
			*/ ?>
		<!--following is old code-->
		<div class="select-services">
		<? ?>
			<img src="/media/images/select-settings-pcs-indicator.jpg" class="settings-pc-indicator">
			<ul>
			<?
			foreach ($profitCenterArray as $profitCenterRaw){
			  //if (is_array($profitCenterRaw)) {
			    foreach ($profitCenterRaw as $profitCenter){
			        if ($profitCenter == 0) {
			            continue;
			        }
			        switch ($profitCenter){
			            case 1:
			                $profitCenterName="wash";
			                $profitCenterLabel="Wash";
			                break;
			            case 3:
			                $profitCenterName="lube";
			                $profitCenterLabel="Lube";
			                break;
			            case 4:
			                $profitCenterName="detail";
			                $profitCenterLabel="Detail";
			                break;
			            case 5:
			                $profitCenterName="express-detail";
			                $profitCenterLabel="Express";
			                break;
			            case 2:
			                $profitCenterName="store";
			                $profitCenterLabel="Store";
			                break;
			            case 6:
			                $profitCenterName="other";
			                $profitCenterLabel="Other";
			                break;
			        }?>
			        <li class="settings-select-pc" id="pc-settings-<? echo $profitCenterName; ?>"><a href="#"><? echo $profitCenterLabel; ?></a></li>
			<?
			    }
			  }
			//}
			?>
			</ul>
		 <? ?>
		 </div>

		<div id="load-ajax-services"></div>
		<div style="text-align:right;margin-right:30px;"><span id="message_post_settings"></span><input style="margin-top:10px" type="button" id="services-save" value="Save"></div>
		<br style="clear:both;">
	 	<!--</p>--><!-- who left this here? :/ -->
	</div>
</div>
<input type="hidden" id="pc" value="1"><!--set value since chrome seemed to want to add it-->
	<script language="text/javascript">
		$('#services-save').click(function(){
		    $('#serviceslist').submit();
		});

		$('#pc-settings-site').click(function(){
		    return loadServiceList(0, $(this).position().top);
		});

		$('#pc-settings-wash').click(function(){
		    return loadServiceList(1, $(this).position().top);
		});

		$('#pc-settings-lube').click(function(){
		    return loadServiceList(3, $(this).position().top);
		});

		$('#pc-settings-detail').click(function(){
		    return loadServiceList(4, $(this).position().top);
		});

		$('#pc-settings-express-detail').click(function(){
		    return loadServiceList(5, $(this).position().top);
		});

		$('#pc-settings-store').click(function(){
		    return loadServiceList(2, $(this).position().top);
		});

		$('#pc-settings-other').click(function(){
		    return loadServiceList(6, $(this).position().top);
		});

		loadServiceList(1, $('#pc-settings-wash').position().top);
		$(".stripe tr:even").addClass("even");

	</script>

	<script type="text/javascript">
	  _gaq.push(['_trackPageview', '/ajax/settings/services']);
	</script>

