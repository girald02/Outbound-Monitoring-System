<?php 

		// RANDOM SUPPLIER
$supplier = array("DENSO", "DENSO TEN", "MARIROKU" , "ROBER AUTO & IND L. PARTS","F-TECH","TOKAI RICA");

$randSupplier ="";

		 // RANDOM DATE
$date = array("Jan", "Feb", "Mar" , "Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

$randDate ="20";


$transDate = "";


for ($p = 1; $p <= 5; $p++){

	if (mt_rand(1,$p) == 1) {
		$transDate = "Jan";
	}


		// RANDOM BROKER
	if (mt_rand(1,$p) == 1) {
		$ranBroker = "NIPPON";
	}
	if (mt_rand(1,$p) == 2) {
		$ranBroker = "DHL";
	}
	if (mt_rand(1,$p) == 3) {
		$ranBroker = "YUSEN";
	}
	if (mt_rand(1,$p) == 4) {
		$ranBroker = "MSE";
	}
	if (mt_rand(1,$p) == 5) {
		$ranBroker = "YLPH";
	}

		// RANDOM SUPPLIER
	if (mt_rand(1,$p) == 1) {
		$ranDestination = "THAILAND";
	}
	if (mt_rand(1,$p) == 2) {
		$ranDestination = "SOUTH AFRICA";
	}
	if (mt_rand(1,$p) == 3) {
		$ranDestination = "INDIA";
	}
	if (mt_rand(1,$p) == 4) {
		$ranDestination = "MALAYSIA";
	}
	if (mt_rand(1,$p) == 5) {
		$ranDestination = "VIETNAM";
	}
	if (mt_rand(1,$p) == 6) {
		$ranDestination = "JAPAN";
	}

	if (mt_rand(1,$p) == 1) {
		$ranAddress = "103  Black Oak Hollow Road";
	}
	if (mt_rand(1,$p) == 2) {
		$ranAddress = "1888  Lowes Alley";
	}
	if (mt_rand(1,$p) == 3) {
		$ranAddress = "4686  Stewart Street";
	}
	if (mt_rand(1,$p) == 4) {
		$ranAddress = "885  Maple Court";
	}
	if (mt_rand(1,$p) == 5) {
		$ranAddress = "3644  Shobe Lane";
	}
	if (mt_rand(1,$p) == 6) {
		$ranAddress = "2190  Pearcy Avenue";
	}
	if (mt_rand(1,$p) == 7) {
		$ranAddress = "1787  Roosevelt Wilson Lane";
	}
	if (mt_rand(1,$p) == 8) {
		$ranAddress = "1247  Willis Avenue";
	}
	if (mt_rand(1,$p) == 9) {
		$ranAddress = "2367  Indiana Avenue";
	}
	if (mt_rand(1,$p) == 10) {
		$ranAddress = "2362  Redbud Drive";
	}

	////CASE No
	if (mt_rand(1,$p) == 1) {
		$ranCaseNo = "ABCDE1<br>
					  ABCDE2<br>
					  ABCDE3<br>
					  ABCDE4<br>
					  ABCDE5<br>
					  ABCDE6<br>
					  ABCDE7<br>
					  ABCDE8<br>
					  ABCDE9<br>
					  ABCDE10
		";
	}
	if (mt_rand(1,$p) == 2) {
		$ranCaseNo = "QWEASD1<br>
					  QWEASD2<br>
					  QWEASD3<br>
					  QWEASD4<br>
					  QWEASD5<br>
					  QWEASD6<br>
					  QWEASD7<br>
					  QWEASD8<br>
					  QWEASD9<br>
					  QWEASD10
		";
	}
	if (mt_rand(1,$p) == 3) {
		$ranCaseNo = "ERWWER1<br>
					  ERWWER2<br>
					  ERWWER3<br>
					  ERWWER4<br>
					  ERWWER5<br>
					  ERWWER6<br>
					  ERWWER7<br>
					  ERWWER8<br>
					  ERWWER9<br>
					  ERWWER10
		";
	}

		if (mt_rand(1,$p) == 3) {
		$ranCaseNo = "XCWEQ1<br>
					  XCWEQ2<br>
					  XCWEQ3<br>
					  XCWEQ4<br>
					  XCWEQ5<br>
					  XCWEQ6<br>
					  XCWEQ7<br>
					  XCWEQ8
		";
	}


	$month = "Feb";

	echo "INSERT INTO `tbl_outbound`(`gatepass` , `dateTrans` , `yearTrans`, `dateVann` , `yearVann` , `destination` , `invoiceNo` , `air` , `sea` , `uom` , `address` , `caseNo` , `grosswt` , `truckNo` , `m3` , `broker` , `linePerItems` , `totalQty`) VALUES ('GAP-SP-00".$p."-".$randDate."', 
	'".mt_rand(1,12)."-".$month."',
	'2020',
	'".mt_rand(12,28)."-".$month."',
	'2020',
	'".$ranDestination."',
	'EXE-20-TLI0".mt_rand(1,123)."',
	'".mt_rand(1,10)."',
	'".mt_rand(1,10)."',
	'CTN/S',
	'".$ranAddress."',
	'".$ranAddress."',
	'".$ranCaseNo."',
	'".mt_rand(1,10)."',
	'".$p."',
	'".$p."',
	'".$ranBroker."',
	'".mt_rand(1,10)."',
	'".mt_rand(1,10)."'





















);";

echo "<br>";

}

	// for ($p = 1; $p <= 30; $p++) {
	// 		// RANDOM DATE
	// 	if (mt_rand(1,$p) == 1) {
	// 		$randDate = "Jan";
	// 	}
	// 	if (mt_rand(1,$p) == 2) {
	// 		$randDate = "Feb";
	// 	}
	// 	if (mt_rand(1,$p) == 3) {
	// 		$randDate = "Mar";
	// 	}
	// 	if (mt_rand(1,$p) == 4) {
	// 		$randDate = "Apr";
	// 	}
	// 	if (mt_rand(1,$p) == 5) {
	// 		$randDate = "May";
	// 	}
	// 	if (mt_rand(1,$p) == 6) {
	// 		$randDate = "Jun";
	// 	}
	// 		// RANDOM SUPPLIER
	// 	if (mt_rand(1,$p) == 1) {
	// 		$randSupplier = "DENSO";
	// 	}
	// 	if (mt_rand(1,$p) == 2) {
	// 		$randSupplier = "DENSO TEN";
	// 	}
	// 	if (mt_rand(1,$p) == 3) {
	// 		$randSupplier = "MARIROKU";
	// 	}
	// 	if (mt_rand(1,$p) == 4) {
	// 		$randSupplier = "ROBER AUTO & IND L. PARTS";
	// 	}
	// 	if (mt_rand(1,$p) == 5) {
	// 		$randSupplier = "F-TECH";
	// 	}
	// 	if (mt_rand(1,$p) == 6) {
	// 		$randSupplier = "TOKAI RICA";
	// 	}

	// 	$randDate = "Jan";

	// 	echo "<br>";
	 	// echo "INSERT INTO `tbl_inbound`(`date`, `rrNo`, `suppName`, `drNo`, `linePerItems`, `qty`, `year`) VALUES ('".mt_rand(10,28)."-".$randDate."','".mt_rand(1,20)."','".$randSupplier."','D".mt_rand()."','".mt_rand(1,20)."','".mt_rand(1,20)."','2020');";
	// }



?>