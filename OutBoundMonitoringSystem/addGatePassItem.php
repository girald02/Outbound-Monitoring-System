<?php include 'header.php';

$gatepass = $_GET['gatepass'];



?>

<script type="text/javascript" src="jquery.min.js"></script>

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?php echo $gatepass; ?></h1><br>

	<div class="encodeDiv">
		<form method="post">
			<div class="form-row">
					<div class="col">
					<small>DATA VANNED:</small>
					<input type="date" name="txtDateVann" class="form-control" required>
				</div>
				<div class="col">
					<?php $todayDate  = date("d-F");
					$timestamp = strtotime($todayDate);
					$thisDay = date('d' , $timestamp);
					$thisMonth = date('M' , $timestamp);
					?>
					<small>DATA TRANS:</small>
					<input type="date" name="txtDateTrans" class="form-control " readonly="" >
				</div>
				<div class="col">
					<?php echo getDestination("none"); ?>
				</div>
				<div class="col">
					<small>-</small>
					<input type="text" autofocus="" name="txtInvoice" class="form-control" placeholder="INVOICE#" required>
				</div>
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<input  type="text" class="form-control" placeholder="AIR" name="txtAir">
				</div>
				<div class="col">
					<input  autofocus="" type="text" class="form-control" placeholder="SEA" name="txtSea">
				</div>
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<input  type="text" class="form-control" placeholder="UOM" name="txtUom" value="CTN/S" required>
				</div>
				<div class="col">
					<input  type="text" class="form-control" placeholder="ADDRESS" name="txtAddress" required>
				</div>
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<textarea class="form-control" placeholder="ENTER CASENO" name="txtCaseNo" style="height: 100px;" required></textarea>
				</div>
				<div class="col">
					<input  type="text" class="form-control" placeholder="GROSS WT." name="txtGross" required id="grosswt" onkeypress="myFunction()" >
				</div> 
				<div class="col">
					<input  type="text" class="form-control" placeholder="TRUCK NO." name="txtTruckNo" required>
				</div> 
				<div class="col">
					<input  type="text" class="form-control" placeholder="M3" name="txtM3" required>
				</div> 
			</div>
			<br> <!-- NEW LINE -->


			<div class="form-row">
				<div class="col">
					<?php echo getBroker("none"); ?>
				</div>

				<div class="col">
					<small>-</small>
					<input  type="text" class="form-control" placeholder="LINE PER ITEMS" name="txtLinePerItems" required>

				</div> 
				<div class="col">
					<small>-</small>
					<input  type="text" class="form-control" placeholder="TOTAL QUALITY" name="txtTotalQty" required>
				</div> 
			</div>
			<?php 
			if (isset($_POST["btnSave"])) {

				$gatepass = $_GET["gatepass"];			
				$dateTrans = $_POST["txtDateTrans"];
				$dateVann = $_POST["txtDateVann"];

				$date4trans = $dateTrans;
				$date4vann = $dateVann;

				$selectDestination = $_POST["selectDestination"];
				$invoice = $_POST["txtInvoice"];
				$air = $_POST["txtAir"];
				$sea = $_POST["txtSea"];
				$uom = $_POST["txtUom"];
				$address = $_POST["txtAddress"];
				$caseNo = $_POST["txtCaseNo"];
				$gross = $_POST["txtGross"];
				$truckNo = $_POST["txtTruckNo"];
				$m3 = $_POST["txtM3"];
				$broker = $_POST["selectBroker"];
				$linePerItems = $_POST["txtLinePerItems"];
				$totalQty = $_POST["txtTotalQty"];

				require 'connection.php';

				// echo $dateVann;

				// ][ ][_ [0] V/ |E



				$caseNo = nl2br($caseNo);
				$caseNo = trim($caseNo);

				 addOutboundData($gatepass,$dateTrans,$dateVann,$selectDestination,$invoice,$air,$sea,$uom,$address,$caseNo,$gross,$truckNo,$m3,$broker,$linePerItems,$totalQty,$date4trans,$date4vann);
			}

			?>
			<br><br>
			<div style="text-align: right;">
				<button name="btnSave" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-check"></i>
					</span>
					<span class="text">Save</span>
				</button>
				<a href="displayGatepass.php" class="btn btn-secondary btn-icon-split">
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