<?php include 'header.php';
require 'connection.php';

$gatepass = $_GET['gatepass'];

$sqlGetGatepass = "SELECT * FROM tbl_outbound WHERE gatepass='". $gatepass ."'";
$getGatepass = $conn->query($sqlGetGatepass);

$row = mysqli_fetch_array($getGatepass,MYSQLI_ASSOC);

$gatepass = $row['gatepass'];

$dateTrans = $row['dateTrans'];
$yearTrans = $row['yearTrans'];

$dateVann = $row['dateVann'];
$yearVann = $row['yearVann'];

if ($dateTrans == "" || $yearTrans =="") {
	$zipDateTrans = "";
	$zipDateVann = "";
}else{
$zipDateTrans = $dateTrans."-".$yearTrans;
$date = new DateTime($zipDateTrans);
$zipDateTrans = $date->format('Y-m-d');
$zipDateTrans = "value='".$zipDateTrans."'";

$zipDateVann = $dateVann."-".$yearVann;
$date = new DateTime($zipDateVann);
$zipDateVann = $date->format('Y-m-d');
$zipDateVann = "value='".$zipDateVann."'";
}

$broker = $row['broker'];
$destination = $row['destination'];

?>

<script type="text/javascript" src="jquery.min.js"></script>

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?php echo $gatepass; ?></h1><br>

	<div class="encodeDiv">
		<form method="post">
			<div class="form-row">
				<div class="col">
					<?php $todayDate  = date("d-F");
					$timestamp = strtotime($todayDate);
					$thisDay = date('d' , $timestamp);
					$thisMonth = date('M' , $timestamp);
					?>
					<small>DATA TRANS:</small>
					<input type="date" name="txtDateTrans" <?php echo $zipDateTrans ?> class="form-control ">
				</div>
				<div class="col">
					<small>DATA VANNED:</small>
					<input type="date" name="txtDateVann" <?php echo "$zipDateVann"; ?>class="form-control ">
				</div>
				<div class="col">
					<?php echo getDestination($destination); ?>
				</div>
				<div class="col">
					<small>-</small>
					<input type="text" autofocus="" name="txtInvoice" class="form-control" placeholder="INVOICE#">
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
					<input  type="text" class="form-control" placeholder="UOM" name="txtUom" value="CTN/S">
				</div>
				<div class="col">
					<input  type="text" class="form-control" placeholder="ADDRESS" name="txtAddress">
				</div>
				
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">

					<div id="InputsWrapper">
						<div><input type="text" name="myCaseNo[]" id="field_1" value="" class="form-control" placeholder="CASE NO"><a href="#" class="removeclass"></a></div>
					</div><br>
					<div id="AddMoreFileId">
						<a href="#" id="AddMoreFileBox" class="btn btn-info">Add field</a><br><br>
					</div>

				</div>



				<div class="col">
					<input  type="text" class="form-control" placeholder="GROSS WT." name="txtGross" id="grosswt" onkeypress="myFunction()" >
				</div> 
				<div class="col">
					<input  type="text" class="form-control" placeholder="TRUCK NO." name="txtTruckNo">
				</div> 
				<div class="col">
					<input  type="text" class="form-control" placeholder="M3" name="txtM3">
				</div> 
			</div>
			<br> <!-- NEW LINE -->
			<div class="form-row">
				<div class="col">
					<?php echo getBroker($broker); ?>
				</div>
				<div class="col">
					<small>-</small>
					<input  type="text" class="form-control" placeholder="LINE PER ITEMS" name="txtLinePerItems">
				</div> 
				<div class="col">
					<small>-</small>
					<input  type="text" class="form-control" placeholder="TOTAL QUALITY" name="txtTotalQty">
				</div> 
			</div>
			<?php 
			if (isset($_POST["btnSave"])) {

				$gatepass = $_GET["gatepass"];			
				$dateTrans = $_POST["txtDateTrans"];
				$dateVann = $_POST["txtDateVann"];
				$selectDestination = $_POST["selectDestination"];
				$invoice = $_POST["txtInvoice"];
				$air = $_POST["txtAir"];
				$sea = $_POST["txtSea"];
				$uom = $_POST["txtUom"];
				$address = $_POST["txtAddress"];
				// $caseNo = $_POST["txtCaseNo"];
				$gross = $_POST["txtGross"];
				$truckNo = $_POST["txtTruckNo"];
				$m3 = $_POST["txtM3"];
				$broker = $_POST["selectBroker"];
				$linePerItems = $_POST["txtLinePerItems"];
				$totalQty = $_POST["txtTotalQty"];

				require 'connection.php';


				$timestamp1 = strtotime($dateTrans);

				$transDate = date("d" , $timestamp1);
				$transMonth = date("M" , $timestamp1);
				$transYear = date("Y" , $timestamp1);
				$dateTrans = $transDate . "-" . $transMonth;

				$timestamp2 = strtotime($dateVann);
				$vannDate = date("d" , $timestamp2);
				$vannMonth = date("M" , $timestamp2);
				$vannYear = date("Y" , $timestamp2);
				$dateVann = $vannDate . "-" . $vannMonth;


				$myCaseNoValue = $_POST["myCaseNo"];


				for($i = 0; $i < count($myCaseNoValue); $i++){

					$sql = "INSERT INTO `tbl_outbound`(`gatepass`, `dateTrans`, `yearTrans`, `dateVann`, `yearVann`, `destination`, `invoiceNo`, `air`, `sea`, `uom`, `address`, `caseNo`, `grosswt`, `truckNo`, `m3`, `broker`, `linePerItems`, `totalQty`) 
					VALUES ('".$gatepass."','".$dateTrans."','".$transYear."','".$dateVann."','".$vannYear."','".$selectDestination."','".$invoice."','".$air."','".$sea."','".$uom."','".$address."','".$myCaseNoValue[$i]."','".$gross."','".$truckNo."','".$m3."','".$broker."','".$linePerItems."','".$totalQty."');";

					if ($conn->query($sql) === TRUE) {
						echo "
						<div class='alert alert-success' role='alert'>
						Record added successfully!
						</div>";
					} else {
						$conn->error;
					}

				}


				// addOutboundData($gatepass,$dateTrans,$dateVann,$selectDestination,$invoice,$air,$sea,$uom,$address,$caseNo,$gross,$truckNo,$m3,$broker,$linePerItems,$totalQty);
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

		<script type="text/javascript">
			$(document).ready(function() {

				var MaxInputs       = 10; //maximum extra input boxes allowed
				var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
				var AddButton       = $("#AddMoreFileBox"); //Add button ID
				
				var x = InputsWrapper.length; //initlal text box count
				var FieldCount=1; //to keep track of text box added
				
				//on add input button click
				$(AddButton).click(function (e) {
				        //max input box allowed
				        if(x <= MaxInputs) {
				            FieldCount++; //text box added ncrement
				            //add input box
				            $(InputsWrapper).append('<div><br><input autofocus class="form-control" placeholder="CASE NO" 				type="text" name="myCaseNo[]" id="field_'+ FieldCount +'"/> <a href="#" 				class="removeclass">Remove</a></div>');
				            x++; //text box increment
				            
				            $("#AddMoreFileId").show();
				            
				            $('AddMoreFileBox').html("Add field");
				            
				            // Delete the "add"-link if there is 3 fields.
				            if(x == 10) {
				            	$("#AddMoreFileId").hide();
				            	$("#lineBreak").html("<br>");
				            }
				        }
				        return false;
				    });
				
				$("body").on("click",".removeclass", function(e){ //user click on remove text
					if( x > 1 ) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox

                $("#AddMoreFileId").show();

                $("#lineBreak").html("");

                // Adds the "add" link again when a field is removed.
                $('AddMoreFileBox').html("Add field");
            }
            return false;
        }) 

			});
		</script>
	</div>
</div>



<?php include 'footer.php'; ?>