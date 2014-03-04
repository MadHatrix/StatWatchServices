<?php
	require('app/db.php');
	include('app/functions.php');

	$siteID = 'NCA'; // default
	if (!empty($_POST['sitePicker']) && is_string($_POST['sitePicker']) && (strlen($_POST['sitePicker']) == 3) ) $siteID = $_POST['sitePicker'];			
	$allServices = "
		SELECT a.profitCenter, a.serviceID, a.serviceName, c.siteID AS 'selected' FROM allservices a
		LEFT JOIN customservices c ON
			a.profitCenter = c.profitCenter AND
			a.siteID = c.siteID AND
			a.serviceID = c.serviceID					
		WHERE a.siteID = :siteID
		ORDER BY a.profitCenter ASC
	";
	//$stmt = $db->prepare("SELECT profitCenter, serviceID, serviceName FROM allservices WHERE siteID = :siteID ORDER BY profitCenter ASC");
	$stmt = $db->prepare($allServices);
	$stmt->bindParam(":siteID", $siteID);
	$stmt->execute();

	$customCheck = "SELECT COUNT('siteID') as 'customCheck' FROM customservices WHERE profitCenter = :profitCenter AND siteID = :siteID";	
	$customStmt = $db->prepare($customCheck);
	$customStmt->bindParam(":siteID", $siteID);
	
	include('assets/header.php');
?>

                <div class="col-md-12 services-section">
                	<div class="large-table-wrapper">
                		<form id="site" method="post" action="">
	                		<h3>Top Services -
		                		<select name="sitePicker" id="sitePicker">
		                			<option value="NCA" <?php echo ($siteID=='NCA') ? 'selected' : ''; ?>>NCA</option>
		                			<option value="NCB" <?php echo ($siteID == 'NCB') ? 'selected' : ''; ?>>NCB</option>
		                			<option value="NCC" <?php echo ($siteID == 'NCC') ? 'selected' : ''; ?>>NCC</option>
		                			<option value="NCD" <?php echo ($siteID == 'NCD') ? 'selected' : ''; ?>>NCD</option>
		                			<option value="NCE" <?php echo ($siteID == 'NCE') ? 'selected' : ''; ?>>NCE</option>
		                			<option value="NCF" <?php echo ($siteID == 'NCF') ? 'selected' : ''; ?>>NCF</option>
		                			<option value="NCG" <?php echo ($siteID == 'NCG') ? 'selected' : ''; ?>>NCG</option>
		                		</select>
		                		<br><br>
		                		Top 5 Services sold shown by default. Select 'Custom' to use a custom list.
	                		</h3>
                		</form>                		
                		<div id="message" class="alert"></div>
                		<div class="wrap-services">
	                		<form method="post" action="ajax-services.php">	
	                			<?php
	                				$currentProfitCenter = -1;																
									while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {			                	
				                		$classSelected = '';
										$boxChecked = '';
										if ($data['selected'] != NULL) {
		                					$classSelected = 'btn-success'; 
											$boxChecked = 'checked';
										}
										
										if ($currentProfitCenter !== $data['profitCenter']) { 
				                			if ($currentProfitCenter != -1) { 
					                			// if not first iteration, closes previously open panel and panel-body ?>
					                			</div><!--panel-body-->
						     					</div><!--panel panel-default--><?php
					     					} ?>
				                			<div class="panel panel-default">
					                			<div class="panel-heading clearfix" id="<?php echo $data['profitCenter']; ?>"><span><?php echo ucfirst(profitCenterTitle($data['profitCenter'])); ?></span><?php
					                				$profitCenter = $data['profitCenter']; 
													$customStmt->bindParam(":profitCenter", $profitCenter);
													$customStmt->execute();
					                				$customCheck = $customStmt->fetchColumn(); ?>
					                				<div class="btn-group pull-right">
					                					<button type="button" class="btn btn-default btn-select btn-custom<?php if ($customCheck != 0) echo ' btn-success'; ?>">Custom</button>
					                					<button type="button" class="btn <?php if ($customCheck == 0) echo 'btn-success'; ?> btn-select btn-default">Default</button>
					                				</div>
					                			</div>
					                			<div class="panel-body<?php if ($customCheck == 0) echo ' default-services'; ?>"><?php
					                			$currentProfitCenter = $data['profitCenter'];
				                			} 			                				
				                				?>
			                					<button type="button" name="<?php echo $data['serviceID']; ?>" id="<?php echo $data['serviceID']; ?>" class="btn btn-option <?php echo $classSelected; ?> btn-default"><?php echo htmlspecialchars($data['serviceName']); ?></button>
												<input type="checkbox" <?php echo $boxChecked; ?> name="<?php echo $data['serviceID']; ?>" id="<?php echo $data['serviceID']; ?>" class="hidden-checkbox"><?php											
																
									}?>								
									</div><!--panel-body-->
								</div><!--panel panel-default-->							
							</form>		
                		</div><!--/wrap-services-->        
		</div><!--/container-->
		
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- <script src="assets/js/bootstrap.js"></script> -->
	    <!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="assets/js/site.js"></script>

	
	</body>
</html>