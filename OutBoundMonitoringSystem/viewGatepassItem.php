<?php include 'header.php'; ?>

<div class="container-fluid">

	<!-- Page Heading -->

	<a class="back-icon" href="displayGatepass.php"><h4><i class="fas fa-arrow-circle-left"></i> BACK</h4></a>

	<br>

	<div class="row">
		<div class="col-6">
			<h1 class="h3 mb-4 text-gray-800"><?php echo $_GET["gatepass"]; ?></h1>

		</div>
		<div class="col-6">
			<div style="text-align: right;">
				<a href="addGatePassItem.php?gatepass=<?php echo $_GET["gatepass"] ?>" style="font-size: 20px;"><i id="d-icon" class="fas fa-plus-circle"></i>ADD ITEMS</a>
			</div>
		</div>
	</div>



	<?php $gatepass = $_GET['gatepass']; ?>

	<?php echo displayGatepassItems($gatepass); ?>

</div>

<?php include 'footer.php'; ?>
