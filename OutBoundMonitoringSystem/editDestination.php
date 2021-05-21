<?php include 'header.php'; ?>


<?php 
include 'connection.php';
	
	$id = $_GET['id'];

	// echo $myID;
	$sqlGetID = "SELECT * FROM tbl_destination WHERE id='". $id ."'";
	$getID = $conn->query($sqlGetID);

	$row = mysqli_fetch_array($getID,MYSQLI_ASSOC);

	$broker = $row["destination"];

?>

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Edit Destination</h1>


	<div class="encodeDiv">
		<form method="post">
			<div class="form-row">
				<div class="col-md-4">
					<small>DESTINATION:</small>
					<input style="text-transform: uppercase;" type="text" value="<?php echo $broker;?>" class="form-control" placeholder="Broker" name="txtDestination">
				</div>
			</div>
		
			<?php 
			if (isset($_POST["btnSave"])) {
				updateDestination($id,$_POST["txtDestination"]);
			}
			?>
			<br>
		
			<div style="text-align: left;">
				<button name="btnSave" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-check"></i>
					</span>
					<span class="text">Save</span>
				</button>
				<a href="viewDestination.php" class="btn btn-secondary btn-icon-split">
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