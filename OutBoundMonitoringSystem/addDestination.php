<?php include 'header.php'; ?>


<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">ADD DESTINATION</h1><br>

	<div class="encodeDiv">
		<form method="post">
			<div class="form-row">
				<div class="col-md-4">
					<input required="" autofocus="" style="text-transform: uppercase;" type="text" class="form-control" style="text-transform:uppercase" placeholder="DESTINATION" name="txtDestination">
				</div>
			</div>
			<br>
			<?php 
				if (isset($_POST["btnSave"])) {
					$txtDestination = $_POST["txtDestination"]; 
					$txtDestination = strtoupper($txtDestination);
					$txtDestination = str_replace(' ', '', $txtDestination);
					
						echo validateDestination($txtDestination);
				}
			?>
			
			<br><br>
			<div style="text-align: left;">
				<button name="btnSave" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-check"></i>
					</span>
					<span class="text">Save</span>
				</button>
				<a href="viewGatepass.php" class="btn btn-secondary btn-icon-split">
					<span class="icon text-white-50">
						<i class="fa fa-close"></i>
					</span>
					<span class="text">Cancel</span>
				</a>
			</div>
		</form>
	</div>
</div>

<?php include 'footer.php'; ?>