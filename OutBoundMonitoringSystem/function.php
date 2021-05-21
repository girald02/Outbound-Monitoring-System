<?php 

// ====================================
// 			REFERENCE QUERY
// ====================================

// --- FOR DATE > < ---
// SELECT * FROM tbl_outbound WHERE dayVann > '04' AND dayVann < '11' AND broker='NIPPON'



// =========================================
// 			VALIDATE DATA
// =========================================

function validateGatePass($txtGatePass){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_gatepass";
	$validateGatePass = $conn->query($sql);
	$exist = false;

	while($row = $validateGatePass->fetch_assoc()) {
		if ($row["gatepass"] == $txtGatePass) {
			echo "<script type='text/javascript'>
			alert('Data is already Exist!');
			</script>";

			$exist=true;
		}
	}
	// ADD SUPPLIER NAME
	if (!$exist) {
		addGatepass($txtGatePass);
	}
}

function validateBroker($txtBroker){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_broker";
	$validateBroker = $conn->query($sql);
	$exist = false;

	while($row = $validateBroker->fetch_assoc()) {
		if ($row["broker"] == $txtBroker) {
			echo "<script type='text/javascript'>
			alert('Data is already Exist!');
			</script>";

			$exist=true;
		}
	}
	// ADD SUPPLIER NAME
	if (!$exist) {
		addBroker($txtBroker);
	}
}

function validateDestination($txtDestination){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_destination";
	$validateDestination = $conn->query($sql);
	$exist = false;

	while($row = $validateDestination->fetch_assoc()) {
		if ($row["destination"] == $txtDestination) {
			echo "<script type='text/javascript'>
			alert('Data is already Exist!');
			</script>";

			$exist=true;
		}
	}
	// ADD SUPPLIER NAME
	if (!$exist) {
		addDestination($txtDestination);
	}
}

// =========================================
// 				ADD DATA
// =========================================

function addGatepass($txtGatePass){
	require 'connection.php';

	$txtGatePass = strtoupper($txtGatePass);

	$sql = "INSERT INTO tbl_gatepass (`gatepass`) VALUES ('".$txtGatePass."');" ;

	if ($conn->query($sql) === TRUE) {
		echo "
		<div class='alert alert-success' role='alert'>
		Record added successfully!
		</div>";
	} else {
		$conn->error;
	}
}

function addBroker($txtBroker){
	require 'connection.php';

	$txtBroker = strtoupper($txtBroker);

	$sql = "INSERT INTO tbl_broker (`broker`) VALUES ('".$txtBroker."');" ;

	if ($conn->query($sql) === TRUE) {
		echo "
		<div class='alert alert-success' role='alert'>
		Record added successfully!
		</div>";
	} else {
		$conn->error;
	}
}

function addDestination($txtDestination){
	require 'connection.php';

	$txtDestination = strtoupper($txtDestination);

	$sql = "INSERT INTO tbl_destination (`destination`) VALUES ('".$txtDestination."');" ;

	if ($conn->query($sql) === TRUE) {
		echo "
		<div class='alert alert-success' role='alert'>
		Record added successfully!
		</div>";
	} else {
		$conn->error;
	}
}

function addOutboundData($gatepass,$dateTrans,$dateVann,$selectDestination,$invoice,$air,$sea,$uom,$address,$caseNo,$gross,$truckNo,$m3,$broker,$linePerItems,$totalQty,$date4trans,$date4vann){
	require 'connection.php';

	$timestamp1 = strtotime($dateTrans);

	// echo $dateVann;
	// echo $dateTrans;

	$transDay = date("d" , $timestamp1);
	$transMonth = date("M" , $timestamp1);
	$transYear = date("Y" , $timestamp1);
	$dateTrans = $transDay . "-" . $transMonth;

	$timestamp2 = strtotime($dateVann);
	$vannDay = date("d" , $timestamp2);
	$vannMonth = date("M" , $timestamp2);
	$vannYear = date("Y" , $timestamp2);
	$dateVann = $vannDay . "-" . $vannMonth;

	$dateTrans = "";
	$transYear = "";
	$transDay = "";

	// echo $vannDay;	

	$gatepass = str_replace(' ', '', $gatepass);
	$selectDestination = str_replace(' ', '', $selectDestination);
	$invoice = str_replace(' ', '', $invoice);
	$air = str_replace(' ', '', $air);
	$sea = str_replace(' ', '', $sea);
	$uom = str_replace(' ', '', $uom);
	$caseNo = str_replace(' ', '', $caseNo);
	$gross = str_replace(' ', '', $gross);
	$truckNo = str_replace(' ', '', $truckNo);
	$m3 = str_replace(' ', '', $m3);
	$broker = str_replace(' ', '', $broker);
	$linePerItems = str_replace(' ', '', $linePerItems);
	$totalQty = str_replace(' ', '', $totalQty);

	 $sql = "INSERT INTO `tbl_outbound`(`gatepass`, `dateTrans`, `yearTrans`, `dateVann`, `yearVann`, `destination`, `invoiceNo`, `air`, `sea`, `uom`, `address`, `caseNo`, `grosswt`, `truckNo`, `m3`, `broker`, `linePerItems`, `totalQty`, `dayTrans`, `dayVann`, `date4trans`, `date4vann`) 
	 		 VALUES ('".$gatepass."','".$dateTrans."','".$transYear."','".$dateVann."','".$vannYear."','".$selectDestination."','".$invoice."','".$air."','".$sea."','".$uom."','".$address."','".$caseNo."','".$gross."','".$truckNo."','".$m3."','".$broker."','".$linePerItems."','".$totalQty."','".$transDay."','".$vannDay."','".$date4trans."','".$date4vann."')";

	if ($conn->query($sql) === TRUE) {
		echo "
		<div class='alert alert-success' role='alert'>
			Record added successfully!
		</div>";
	} else {
		$conn->error;
	}
}


// =========================================
// 				UPDATE DATA
// =========================================

function updateGatePass($id,$gatepass){
	require 'connection.php';

	$updateSQL = "UPDATE tbl_gatepass SET `gatepass`='". $gatepass ."' WHERE id='". $id ."'";
	if ($conn->query($updateSQL) === TRUE) {
		echo "

		<script type='text/javascript'>
		function reDirect() {

			alert('Update successfully!');
			window.location.replace('editGatepass.php?id=$id');
		}
		setTimeout(reDirect, 10);
		</script>
		";
	} else {
		$conn->error;
	}

}

function updateBroker($id,$broker){
	require 'connection.php';

	$broker = strtoupper($broker);

	$updateSQL = "UPDATE tbl_broker SET `broker`='". $broker ."' WHERE id='". $id ."'";
	if ($conn->query($updateSQL) === TRUE) {
		echo "

		<script type='text/javascript'>
		function reDirect() {

			alert('Update successfully!');
			window.location.replace('editBroker.php?id=$id');
		}
		setTimeout(reDirect, 10);
		</script>
		";
	} else {
		$conn->error;
	}

}

function updateDestination($id,$destination){
	require 'connection.php';

	$destination = strtoupper($destination);

	$updateSQL = "UPDATE tbl_destination SET `destination`='". $destination ."' WHERE id='". $id ."'";
	if ($conn->query($updateSQL) === TRUE) {
		echo "

		<script type='text/javascript'>
		function reDirect() {

			alert('Update successfully!');
			window.location.replace('editDestination.php?id=$id');
		}
		setTimeout(reDirect, 10);
		</script>
		";
	} else {
		$conn->error;
	}

}

function updateGatepassItems($gatepass,$id,$dateTrans,$dateVann,$transYear,$vannYear,$selectDestination,$invoice,$air,$sea,$uom,$address,$caseNo,$gross,$truckNo,$m3,$broker,$linePerItems,$totalQty,$transDay,$vannDay,$date4trans,$date4vann){
	require 'connection.php';

	$updateSQL = "UPDATE tbl_outbound SET 
	dateTrans='".$dateTrans."',
	dateVann='".$dateVann."',
	yearTrans='".$transYear."',
	yearVann='".$vannYear."',
	destination='".$selectDestination."',
	invoiceNo='".$invoice."',
	air='".$air."',
	sea='".$sea."',
	uom='".$uom."',
	address='".$address."',
	caseNo='".$caseNo."',
	grosswt='".$gross."',
	truckNo='".$truckNo."',
	m3='".$m3."',
	broker='".$broker."',
	linePerItems='".$linePerItems."',
	totalQty='".$totalQty."',
	dayTrans='".$transDay."',
	dayVann='".$vannDay."',

	date4trans='".$date4trans."',
	date4vann='".$date4vann."'

	WHERE id='".$id."'";
	if ($conn->query($updateSQL) === TRUE) {
		echo "
		<script type='text/javascript'>
			function reDirect() {
				alert('Update successfully!');
				window.location.replace('viewGatepassItem.php?gatepass=$gatepass');
			}
			setTimeout(reDirect, 10);
		</script>
		";
	} else {
		$conn->error;
	}
}


// =========================================
// 				DISPLAY DATA
// =========================================

function displayGatepass(){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_gatepass";
	$displayGatepass = $conn->query($sql);

	if ($displayGatepass->num_rows > 0) {
		echo "
		<table class='table' 'table-bordered' id='gatepass-table' width='100%' cellspacing='0'>
		<thead>
		<tr>
		<th scope='col'>ID</th>
		<th scope='col'>GATEPASS</th>
		<th scope='col'>ACTION</th>
		</tr>
		</thead>
		<tbody>";
	}
	else{
		echo "NO DATA........";
	}
	while($row = $displayGatepass->fetch_assoc()) {
		echo "
		<tr>
		<th scope='row'>". $row['id']. "</th>
		<td>" . $row['gatepass']. "</td>
		<td>  
		<form class='deleteFORM' name='deleteForm' method='POST'> 

		<a href=editGatepass.php?id=". $row['id']. "><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-edit'>Edit</i>
		</button>
		</a>

		<button value='". $row['gatepass'] ."' name='btnDeleteData' type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-trash'></i>
		</button>
		</form>
		</td>
		</tr>";
	}

	echo "  
	</tbody>
	</table>
	";

	// WITH DELETE
	if (isset($_POST['btnDeleteData'])) {
		$deleteGatepass = $_POST['btnDeleteData'];

		$sql = "DELETE FROM `tbl_outbound` WHERE gatepass='". $deleteGatepass ."'";
		$sql1 = "DELETE FROM `tbl_gatepass` WHERE gatepass='". $deleteGatepass ."'";

		if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
			echo "
			<script>
			alert('Data has been deleted!');
			window.location.href='viewGatepass.php';
			</script>
			";
		} else {
			$conn->error;
		}							
	}
}



function displayDestination(){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_destination";
	$displayDestination = $conn->query($sql);

	if ($displayDestination->num_rows > 0) {
		echo "
		<table class='table' 'table-bordered' id='dataTable' width='100%' cellspacing='0'>
		<thead>
		<tr>
		<th scope='col'>ID</th>
		<th scope='col'>DESTINATION</th>
		<th scope='col'>ACTION</th>
		</tr>
		</thead>
		<tbody>";
	}
	else{
		echo "NO DATA........";
	}
	while($row = $displayDestination->fetch_assoc()) {
		echo "
		<tr>
		<th scope='row'>". $row['id']. "</th>
		<td>" . $row['destination']. "</td>
		<td>  
		<form class='deleteFORM' name='deleteForm' method='POST'> 

		<a href=editDestination.php?id=". $row['id']. "><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-edit'>Edit</i>
		</button>
		</a>

		<button value='". $row['id'] ."' name='btnDeleteData' type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-trash'></i>
		</button>
		</form>
		</td>
		</tr>";
	}

	echo "  
	</tbody>
	</table>
	";

	// WITH DELETE
	if (isset($_POST['btnDeleteData'])) {
		$deleteID = $_POST['btnDeleteData'];
		$sql = "DELETE FROM `tbl_destination` WHERE id='". $deleteID ."'";
		if ($conn->query($sql) === TRUE) {
			echo "
			<script>
			alert('Data has been deleted!');
			window.location.href='viewBroker.php';
			</script>
			";
		} else {
			$conn->error;
		}							
	}
}


function displayBroker(){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_broker";
	$displayBroker = $conn->query($sql);

	if ($displayBroker->num_rows > 0) {
		echo "
		<table class='table' 'table-bordered' id='broker-table' width='100%' cellspacing='0'>
		<thead>
		<tr>
		<th scope='col'>ID</th>
		<th scope='col'>BROKER</th>
		<th scope='col'>ACTION</th>
		</tr>
		</thead>
		<tbody>";
	}
	else{
		echo "NO DATA........";
	}
	while($row = $displayBroker->fetch_assoc()) {
		echo "
		<tr>
		<th scope='row'>". $row['id']. "</th>
		<td>" . $row['broker']. "</td>
		<td>  
		<form class='deleteFORM' name='deleteForm' method='POST'> 

		<a href=editBroker.php?id=". $row['id']. "><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-edit'>Edit</i>
		</button>
		</a>

		<button value='". $row['id'] ."' name='btnDeleteData' type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-trash'></i>
		</button>
		</form>
		</td>
		</tr>";
	}

	echo "  
	</tbody>
	</table>
	";

	// WITH DELETE
	if (isset($_POST['btnDeleteData'])) {
		$deleteID = $_POST['btnDeleteData'];
		$sql = "DELETE FROM `tbl_broker` WHERE id='". $deleteID ."'";
		if ($conn->query($sql) === TRUE) {
			echo "
			<script>
			alert('Data has been deleted!');
			window.location.href='viewBroker.php';
			</script>
			";
		} else {
			$conn->error;
		}							
	}
}

function displayGatepassItem(){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_gatepass ORDER BY id DESC ";
	$displayGatepass = $conn->query($sql);

	if ($displayGatepass->num_rows > 0) {
		echo "
		<table class='table' 'table-bordered' id='displayGatepass' width='100%' cellspacing='0'>
		<thead>
		<tr>
		<th scope='col'>ID</th>
		<th scope='col' class='sorting_asc'>GATEPASS</th>
		<th scope='col'>ACTION</th>
		<th scope='col'>*</th>
		</tr>
		</thead>
		<tbody>";
	}
	else{
		echo "NO DATA........";
	}
	while($row = $displayGatepass->fetch_assoc()) {

		$sqlCountGatepassItem = "SELECT COUNT(gatepass) AS Count FROM tbl_outbound WHERE gatepass='". $row['gatepass'] ."'";
		$CountGatepassItem = $conn->query($sqlCountGatepassItem);
		$GatepassItem = mysqli_fetch_array($CountGatepassItem,MYSQLI_ASSOC);

		echo "
		<tr>
		<th scope='row'>". $row['id']. "</th>
		<td>" . $row['gatepass']. "</td>

		<td>  

		<a class='hover-none' href=addGatePassItem.php?gatepass=". $row['gatepass']. "><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-plus'> NEW ITEM</i>
		</button>
		</a>	

		";

		if($GatepassItem['Count'] == 0){
			echo "</td>
			<td></td>
			</tr>";
		}else{
			echo "<a class='hover-none' href=viewGatepassItem.php?gatepass=". $row['gatepass']. "><button type='button' class='btn btn-info' data-toggle='modal' data-target='#exampleModal'>
			<i class='fas fa-eye'> 
			";

			$sqlCountGatepassItem = mysqli_query($conn,"SELECT COUNT(id) AS `count` FROM `tbl_outbound` WHERE gatepass = '" .$row['gatepass']."'");
			$CountGatepassItem = mysqli_fetch_assoc($sqlCountGatepassItem);
			$CountGatepassItem = $CountGatepassItem['count'];
			
			if ($CountGatepassItem == 1) {
				echo $CountGatepassItem;
				echo " ITEM</i>";
			}else{
				echo $CountGatepassItem;
				echo " ITEMS</i>";
			}

			echo "
			</button>
			</a></td>

			<td>
			<form style='' class='deleteFORM' name='deleteForm' method='POST'> 
			<button value='". $row['gatepass'] ."' name='btnDeleteData' type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>
			<i class='fas fa-trash'>&nbsp&nbspTRASH ALL</i>
			</button>
			</form>
			</td>

			";
			echo "
			</tr>";
		}
	}
	echo "  
	</tbody>
	</table>
	";

	// WITH DELETE
  if (isset($_POST['btnDeleteData'])) {

  	$gatepass = $_POST["btnDeleteData"];

  	echo $gatepass;

  	$sql = "DELETE FROM `tbl_outbound` WHERE gatepass='$gatepass'";
  	// $sql1 = "DELETE FROM `tbl_outbound` WHERE id='$id'";

  	if ($conn->query($sql) === TRUE) {
  		echo "
  		<script>
  		alert('Data has been deleted!')
  		window.location.href='displayGatepass.php';
  		</script>
  		";
  	} else {
  		$conn->error;
  	}							
  }

}

function displayGatepassItems($gatepass){
	require 'connection.php';
	$sql = "SELECT * FROM tbl_outbound WHERE gatepass='".$gatepass."'";
	$displayGatepass = $conn->query($sql);

	if ($displayGatepass->num_rows > 0) {
		echo "
		<table class='table table-bordered gatepassitem-table' id='dataTable' width='100%' cellspacing='0'>
		<thead> 
		<tr>
		<th scope='col'>DATE VANNED</th>
		<th scope='col'>DATE TRANS</th>
		<th scope='col'>AIR</th>
		<th scope='col'>SEA</th>
		<th scope='col'>UOM</th>
		<th scope='col'>ADDRESS</th>
		<th scope='col'>CASE NO</th>
		<th scope='col'>GROSS WT</th>
		<th scope='col'>TRUCK NO.</th>
		<th scope='col'>M3</th>
		<th scope='col'>BROKER</th>
		<th scope='col'>LINE PER ITEMS</th>
		<th scope='col'>TOTAL QTY</th>
		<th scope='col'>DESTINATION</th>
		<th scope='col'>INVOICE</th>
		<th scope='col' colspan='2' style='text-align:center;'>ACTION</th>
		</tr>
		</thead>
		<tbody>";
	}
	else{
		echo "NO DATA........";
	}

	while($row = $displayGatepass->fetch_assoc()) {
		echo "
		<tr>
		<td>".$row['dateVann']."</td>
		<td>".$row['dateTrans']."</td>
		<td>".$row['air']."</td>
		<td>".$row['sea']."</td>
		<td>".$row['uom']."</td>
		<td id='td-address'>".$row['address']."</td>
      	<td>".$row['caseNo']."</td> 
      	<td>".$row['grosswt']."</td>
      	<td>".$row['truckNo']."</td>
      	<td>".$row['m3']."</td>
      	<td>".$row['broker']."</td>
      	<td>".$row['linePerItems']."</td>
      	<td>".$row['totalQty']."</td>
      	<td>".$row['destination']."</td>
      	<td>".$row['invoiceNo']."</td>
   		<td>  
		<form style='text-align:center;' class='deleteFORM' name='deleteForm' method='POST'> 

		<a href=editGatepassItems.php?id=". $row['id']. "><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-edit'></i>
		</button>
		</a>

		</td>

		<td>

		<button value='". $row['id'] ."' name='btnDeleteData' type='submit' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>
		<i class='fas fa-trash'></i>
		</button>
		</form>
		</td>
      	</tr>
      	";

      }
  echo "  
  </tbody>                                                      
  </table>
  ";

	// WITH DELETE
  if (isset($_POST['btnDeleteData'])) {

  	$id = $_POST["btnDeleteData"];

  	$sql = "DELETE FROM `tbl_outbound` WHERE id='$id'";
  	if ($conn->query($sql) === TRUE) {
  		echo "
  		<script>
  		alert('Data has been deleted!')
  		window.location.href='viewGatepassItem.php?gatepass=".$gatepass."';
  		</script>
  		";
  	} else {
  		$conn->error;
  	}							
  }
}


// DISPLAY AND FOR UPDATING  
// note : parameters "none" for display
// note : parameters $suppName for Update Select option
function getDestination($destination){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_destination ORDER BY destination ASC";

	$getDestination = $conn->query($sql);

	if ($getDestination->num_rows > 0) {
		echo "
		<div class='col'>
		<div class='form-group'>
		<small for='sel1'>DESTINATION:</small>
		<select class='form-control' id='selectDestination' name='selectDestination'> 
		";		
	}

	while($row = $getDestination->fetch_assoc()) {

		if ($destination == $row["destination"]) {
			echo "<option selected>". $row["destination"] ." </option>";
		}
		else{
			echo "
			<option>".$row["destination"]."</option>
			";
		}
	}
	echo "
	</select> 
	</div>
	</div>
	";
}

function getBroker($broker){
	require 'connection.php';

	$sql = "SELECT * FROM tbl_broker ORDER BY broker ASC";
	$getBroker = $conn->query($sql);

	if ($getBroker->num_rows > 0) {
		echo "
		<div class='col'>
		<div class='form-group'>
		<small for='sel1'>BROKER:</small>
		<select class='form-control' id='selectBroker' name='selectBroker'> 
		";		
	}

	while($row = $getBroker->fetch_assoc()) {

		if ($broker == $row["broker"]) {
			echo "<option selected>". $row["broker"] ." </option>";
		}
		else{
			echo "
			<option>".$row["broker"]."</option>
			";
		}
	}
	echo "
	</select> 
	</div>
	</div>
	";
}

function printOutboundShipment($dateData){
	echo "string"; 
}


// Welcome to PLDT Enterprise
// FOR PLDT PRESS 1
// FOR E-PLDT PRESS 2

// IF PRESS 1{
// 	WELCOME TO PLDT
// 	FOR TECHNICAL CONCERN PRESS 1
// 	FOR ACCOUNT AND BILLINGS PRESS 2
// 	FOR INQUIRY OF PRODUCTS PRESS 3

// 	IF PRESS 1{
// 		FOR VOICE REPAIR PRESS 1
// 		FOR DATA REPAIR PRESS 2

// 		IF PRESS 1{
// 			PLEASE ENTER YOUR AREA CODE AND 7 DIGITS

// 			*ENTER 04212545454*

// 			YOU HAVE ENTER 04212545454

// 			IF CORRECT PRESS 1:
// 			IF IN-CORRECT PRESS 2:
// 		}

// 		IF PRESS 2{
// 			YOU MAYBE ASK FOR IMPORTANT INFORMATION AND CONCENT TO OUR WEBSITE @ WWW.PLDT.COM.PH,
// 			THIS CALL WILL RECORDED FOR QUALITY ASSURANCE PURPOSES. PLEASE STAY ON THE LINE I AM CONNECTING YOU NOW....
// 		}
// 	}
// }


?>