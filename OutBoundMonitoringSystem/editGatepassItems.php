<?php include 'header.php';
require 'connection.php';

$getID = $_GET["id"];


// echo $myID;
$sqlGetID = "SELECT * FROM tbl_outbound WHERE id='$getID'";
$getID = $conn->query($sqlGetID);

$row = mysqli_fetch_array($getID,MYSQLI_ASSOC);


$id = $row['id'];

$gatepass = $row['gatepass'];

$dateTrans = $row['dateTrans'];
$yearTrans = $row['yearTrans'];

$dateVann = $row['dateVann'];
$yearVann = $row['yearVann'];

$dateVann = $row['dateVann'];
$invoiceNo = $row['invoiceNo'];
$air = $row['air'];
$sea = $row['sea'];
$uom = $row['uom'];

$address = $row['address'];
$destination = $row['destination'];
$caseNo = $row['caseNo'];


$caseNo = str_replace(" ", "", $caseNo);

$caseNo = str_replace("<br/>", "", $caseNo);

$grosswt = $row['grosswt'];
$truckNo = $row['truckNo'];
$m3 = $row['m3'];
$broker = $row['broker'];
$linePerItems = $row['linePerItems'];
$totalQty = $row['totalQty'];

$zipDateVann = $dateVann."-".$yearVann;
$date = new DateTime($zipDateVann);
$zipDateVann = $date->format('Y-m-d');
$zipDateVann = "value='".$zipDateVann."'";

?>

<script type="text/javascript" src="jquery.min.js"></script>

<div class="container-fluid">

	<!-- Page Heading -->

	<div class="encodeDiv">
		<form method="post">
			<div class="form-row">
				<div class="col">
					<small>DATA VANNED:</small>
					<input type="date" name="txtDateVann" class="form-control" <?php echo $zipDateVann; ?> >
				</div>
				<div class="col">
					<?php
						$todayDate  = date("d-F");
						$timestamp = strtotime($todayDate);
						$thisDay = date('d' , $timestamp);
						$thisMonth = date('M' , $timestamp);
					?>
					<small>DATA TRANS:</small>
					<input type="date" name="txtDateTrans" class="form-control" 
						<?php 
						if (!$dateTrans == "" && !$yearTrans == "") {
							$zipDateTrans = $dateTrans."-".$yearTrans;
							$date = new DateTime($zipDateTrans);
							$zipDateTrans = $date->format('Y-m-d');
							$zipDateTrans = "value='".$zipDateTrans."'";
							echo $zipDateTrans;
						}else{
							echo "";
						}
						?> >
				</div>
				<div class="col">
					<?php echo getDestination($destination); ?>
				</div>
				<div class="col">
					<small>INVOICE</small>
					<input type="text" autofocus="" name="txtInvoice" class="form-control" placeholder="INVOICE#" value="<?php echo $invoiceNo; ?>">
				</div>
			</div>
			 <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<small>AIR:</small>
					<input  type="text" class="form-control" placeholder="AIR" name="txtAir" value="<?php echo $air ?>">
				</div>
				<div class="col">
					<small>SEA:</small>
					<input  autofocus="" value="<?php echo $sea ?>" type="text" class="form-control" placeholder="SEA" name="txtSea">
				</div>
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<small>UOM:</small>
					<input  type="text" class="form-control" value="<?php echo $uom ?>" placeholder="UOM" name="txtUom" >
				</div>
				<div class="col">
					<small>ADDRESS:</small>
					<input  type="text" value="<?php echo $address; ?>" class="form-control" placeholder="ADDRESS" name="txtAddress">
				</div>
				
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">

					<small>CASE NO:</small>
					<textarea class="form-control" value="sd" placeholder="ENTER CASENO" name="txtCaseNo" style="height: 200px;"><?php echo $caseNo;?></textarea>
				</div>



				<div class="col">
					<small>GROSS WT:</small>
					<input  type="text" value="<?php echo $grosswt ?>"  class="form-control" placeholder="GROSS WT." name="txtGross" id="grosswt" onkeypress="myFunction()" >
				</div> 
				<div class="col">
					<small>TRUCK NO:</small>
					<input  type="text" value="<?php echo $truckNo ?>" class="form-control" placeholder="TRUCK NO." name="txtTruckNo">
				</div> 
				<div class="col">
					<small>M3:</small>
					<input  type="text" value="<?php echo $m3 ?>" class="form-control" placeholder="M3" name="txtM3">
				</div> 
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<?php echo getBroker($broker); ?>
				</div>
				<div class="col">
					<small>LINE PER ITEMS:</small>
					<input  type="text" value="<?php echo $linePerItems ?>" class="form-control" placeholder="LINE PER ITEMS" name="txtLinePerItems">
				</div> 
				<div class="col">
					<small>TOTAL QTY:</small>
					<input  type="text" value="<?php echo $totalQty ?>" class="form-control" placeholder="TOTAL QUALITY" name="txtTotalQty">
				</div> 
			</div>
			<?php 
			if (isset($_POST["btnSave"])) {

				$dateTrans = $_POST["txtDateTrans"];
				$dateVann = $_POST["txtDateVann"];
				$selectDestination = $_POST["selectDestination"];
				$invoice = $_POST["txtInvoice"];
				$air = $_POST["txtAir"];
				$sea = $_POST["txtSea"];
				$uom = $_POST["txtUom"];
				$caseNo = $_POST["txtCaseNo"];

				$address = $_POST["txtAddress"];
				$gross = $_POST["txtGross"];
				$truckNo = $_POST["txtTruckNo"];
				$m3 = $_POST["txtM3"];
				$broker = $_POST["selectBroker"];
				$linePerItems = $_POST["txtLinePerItems"];
				$totalQty = $_POST["txtTotalQty"];

				require 'connection.php';

				$date4trans = $dateTrans;
				$date4vann = $dateVann;

				// echo $dateTrans; echo "<br>";
				// echo $dateVann; 

				$timestamp1 = strtotime($dateTrans);

				$transDate = date("d" , $timestamp1);
				$transDay = $transDate;
				$transMonth = date("M" , $timestamp1);
				$transYear = date("Y" , $timestamp1);
				$dateTrans = $transDate . "-" . $transMonth;

				$timestamp2 = strtotime($dateVann);
				$vannDate = date("d" , $timestamp2);
				$vannDay = $vannDate;
				$vannMonth = date("M" , $timestamp2);
				$vannYear = date("Y" , $timestamp2);
				$dateVann = $vannDate . "-" . $vannMonth;

				$caseNo = nl2br($caseNo);
				$caseNo = trim($caseNo);

				updateGatepassItems($gatepass,$id,$dateTrans,$dateVann,$transYear,$vannYear,$selectDestination,$invoice,$air,$sea,$uom,$address,$caseNo,$gross,$truckNo,$m3,$broker,$linePerItems,$totalQty,$transDay,$vannDay,$date4trans,$date4vann);
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
				<a href="viewGatepassItem.php?gatepass=<?php echo $gatepass ?>" class="btn btn-secondary btn-icon-split">
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