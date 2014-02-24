<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<title>Bootstrap 101 Template</title>
		<base href="http://localhost/StatWatchServices/">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- http://startbootstrap.com/sb-admin -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					StatWatch Logo
				</div>
				<div class="col-md-3">
					Refresh On
				</div>
				<div class="col-md-3">
					Logged in as StatWatch Project Admin<br>
					<a href="#">Logout</a> | <a href="#">Settings</a>
				</div>
				<div class="col-md-3">DRB Systems Logo</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar main navbar-default" role="navigation">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="#">Currently</a></li>
							<li><a href="#">Sales</a></li>
							<li><a href="#">Labor</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Almanac</a></li>
							<li><a href="#">Multi-Site</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="row main-data-wrapper">
                <div class="col-md-12">
                	<nav class="navbar sub-nav navbar-default" role="navigation">
                	<ul class="nav nav-tabs">
                		<li><a href="#">Status</a>
                		<li><a href="#">Users</a>
                		<li class="active"><a href="#">Services</a>
                		<li><a href="#">Organization</a>
                	</ul>
                	</nav>
                </div>

                <div class="col-md-12" style="background-color: white; margin-left: 15px; width:97%; margin-top:-27px;">
                	<div class="large-table-wrapper">
                		<h3>Top Services -
	                		<select id="sitePicker" onchange="updateSite(this)">
	                			<option value="NCA">NCA</option>
	                			<option value="NCB">NCB</option>
	                			<option value="NCC">NCC</option>
	                			<option value="NCD">NCD</option>
	                			<option value="NCE">NCE</option>
	                			<option value="NCF">NCF</option>
	                			<option value="NCG">NCG</option>
	                		</select>
	                		<br><br>
	                		Top 10 Services sold shown by default. Select 'Custom' to use a custom 10 list.
                		</h3>
                		<br>
                		<div class="wrap-services">
                			<div id="sitegroup-accordion" style="clear:both;" class="ui-accordion ui-wedget ui-helper-reset" role="tablist">
								<h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-header-active ui-state-active ui-corner-top ui-accordion-icons" id="pc-settings-wash" role="tab" aria-controls="ui-accordion-sitegroup-accordion-panel-0" aria-selected="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span><a href="#">wash</a></h3>
                				<div class="sitegroup-container ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" id="ui-accordion-sitegroup-accordion-panel-0" aria-labelledby="pc-settings-wash" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block; height: 0px;">
						        	<!--<ul>
						        		<li class="settings-select-pc" id="pc-settings-wash"><a href="#">Wash</a></li>
									</ul>-->
									<div id="load-ajax-services-1" style="clear:both;">
										<script type="text/javascript">
											(function($){
											    $.bind = function(object, method){
											        var args = Array.prototype.slice.call(arguments, 2);
											        if(args.length){
											            return function() {
											                var args2 = [this].concat(args, $.makeArray( arguments ));
											                return method.apply(object, args2);
											            };
											        } else {
											            return function() {
											                var args2 = [this].concat($.makeArray( arguments ));
											                return method.apply(object, args2);
											            };
											        }
											    };
											})(jQuery);
										</script>

										<script type="text/javascript">
											$(document).ready(function(){
											    $(':checkbox').checkBox({replaceInput:true, addLabel:true});
											    setLimitSelection();
											    var formURL = '/ajax/settings/services/update?pc='+document.getElementById("pc").value+'&siteID='+document.getElementById("sitePicker").value;

											    $('#serviceslist').ajaxForm({
											        url: formURL,
											        responseType: 'html',
											        success: function(response){
											            if (response == 'ok'){
											                $("#error").html("<div id='message' style='color:black !important;'>Services saved!</div>");
											            } else if(response == 'exceeded'){
											                $("#error").html("<div id='message' style='color:red;'>Unable to save. More than 10 services selected.</div>");
											            } else if(response == 'error'){
											                $("#error").html("<div id='message' style='color:red;'>Error saving services. Please try again.</div>");
											            }
											        }
											    });
											});

											function setLimitSelection(){
											    $(':checkbox').limitSelection({
											        limit: 10,
											        onfailure: function (n){
											            $("#error").html("Please select no more than " + n + " items.");
											        },
											        onsuccess: function (n){
											            $("#error").html("");
											            return false;
											        }
											    });
											    $('select[name="selLimit"]').limitSelection(10);
											}
										</script>

										<div id="error"></div>

									    <form id="serviceslist" action="/ajax/settings/services/update" method="post">
										    <ul class="settings-services-list">
										            <li><p><label for="500001" class=" ui-checkbox-state-checked">Wash Replacement            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="500001" id="500001" value="500001" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1000007" class=" ui-checkbox-state-checked-hover">Outside Works            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1000007" id="1000007" value="1000007" checked=""><span class="ui-checkbox ui-checkbox-state-checked-hover"></span>
										        </label></p></li>
										            <li><p><label for="1000008" class=" ui-checkbox-state-checked">Sparkler+            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1000008" id="1000008" value="1000008" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1000009" class=" ui-checkbox-state-checked">Sparkler+Max            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1000009" id="1000009" value="1000009" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1000010" class=" ui-checkbox-state-checked">The Works            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1000010" id="1000010" value="1000010" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1500006" class=" ui-checkbox-state-checked">Wax Express            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1500006" id="1500006" value="1500006" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1500007" class=" ui-checkbox-state-checked">Works Express            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1500007" id="1500007" value="1500007" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1500010" class=" ui-checkbox-state-checked">Basic Wash            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1500010" id="1500010" value="1500010" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="1500014" class=" ui-checkbox-state-checked">Basic Express Wash            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="1500014" id="1500014" value="1500014" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="2500014" class=" ui-checkbox-state-checked">CTA            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="2500014" id="2500014" value="2500014" checked=""><span class="ui-checkbox ui-checkbox-state-checked"></span>
										        </label></p></li>
										            <li><p><label for="3500002" class=" ">DELUXE EXTERIOR            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500002" id="3500002" value="3500002"><span class="ui-checkbox "></span>
										        </label></p></li>
										            <li><p><label for="3500003">SUPER EXTERIOR            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500003" id="3500003" value="3500003"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500004">RX TTL SHINE EXT            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500004" id="3500004" value="3500004"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500009">INTERIOR CLEAN            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500009" id="3500009" value="3500009"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500011">COMPLETE DRESSING            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500011" id="3500011" value="3500011"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500023">Tire Shine History            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500023" id="3500023" value="3500023"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500024">Tri Foam History            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500024" id="3500024" value="3500024"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500025">RainX Pkg History            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500025" id="3500025" value="3500025"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500028">RX TTL SHINE FULL            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500028" id="3500028" value="3500028"><span class="ui-checkbox"></span>
										        </label></p></li>
										            <li><p><label for="3500029">SUPER FULL            <input class="checkbox ui-helper-hidden-accessible" type="checkbox" style="position:absolute; left:-100000px" name="3500029" id="3500029" value="3500029"><span class="ui-checkbox"></span>
										        </label></p></li>
									        </ul>
									    </form><script type="text/javascript">
									  _gaq.push(['_trackPageview', '/ajax/settings/services/list']);
									</script>
								</div>
							</div>
                		</div>
                	</div>
                </div>
            </div>

			<div class="jumbotron">
				<h1>Hello, world! - tes</h1>
			</div>

		</div><!--/container-->
		<?php /*
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		*/ ?>
	    <!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	</body>
</html>