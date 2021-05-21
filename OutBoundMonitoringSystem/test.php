  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style type="text/css">
    .table td, .table th {
    padding: .75rem;
    vertical-align: inherit;}
  </style>

  <div class="container-fluid">
    <br>

    <?php 

    require 'connection.php';

    $sql = "SELECT * FROM tbl_outbound";
    $displayGatepass = $conn->query($sql);

    $arr_dateTrans = array();
    $arr_dateVann = array();
    $arr_gatepass = array();
    $arr_air = array();
    $arr_sea = array();
    $arr_uom = array();
    $arr_address = array();
    $arr_caseNo = array();
    $arr_grossWt = array();
    $arr_truckNo = array();
    $arr_m3 = array();
    $arr_broker = array();
    $arr_linePerItems = array();
    $arr_totalQty = array();
    $arr_destination = array();
    $arr_invoice = array();


    if ($displayGatepass->num_rows > 0) {
      
    }
    else{
        echo "NO DATA........";
    }

    while($row = $displayGatepass->fetch_assoc()) {
       $arr_dateTrans[]   =   $row['dateTrans'];
       $arr_dateVann[]   =   $row['dateVann'];
       $arr_gatepass[] =   $row['gatepass'];
       $arr_air[]    =   $row['air'];
       $arr_sea[]    =   $row['sea'];
       $arr_uom[]    =   $row['uom'];
       $arr_address[]    =   $row['address'];
       $arr_caseNo[]    =   $row['caseNo'];
       $arr_grossWt[]    =   $row['grosswt'];
       $arr_truckNo[]    =   $row['truckNo'];
       $arr_m3[]    =   $row['m3'];
       $arr_broker[]    =   $row['broker'];
       $arr_linePerItems[]    =   $row['linePerItems'];
       $arr_totalQty[]    =   $row['totalQty'];
       $arr_destination[]    =   $row['destination'];
       $arr_invoice[]    =   $row['invoiceNo'];
    }


    // $sqlCountGatepassItem = "SELECT COUNT(gatepass) AS Count FROM tbl_outbound WHERE gatepass='". $row['gatepass'] ."'";
    // $CountGatepassItem = $conn->query($sqlCountGatepassItem);
    // $GatepassItem = mysqli_fetch_array($CountGatepassItem,MYSQLI_ASSOC);
    // $GatepassItem = $GatepassItem['Count'];

    ?>

    <?php 

    require 'connection.php';

    $sql = "SELECT * FROM tbl_outbound WHERE invoiceNo='EX20-TLI0136'";
    $displayGatepass = $conn->query($sql);

    $items = array();

    if ($displayGatepass->num_rows > 0) {
        echo "
        <table class='table table-bordered' width='100%' cellspacing='0'>
        <thead>
        <tr>

        <th scope='col'>DATE TRANS</th>
        <th scope='col'>DATE VANNED</th>
        <th scope='col'>GATEPASS</th>
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
        <th scope='col'>TOTAL QUALITY</th>
        <th scope='col'>DESTINATION</th>
        <th scope='col'>INVOICE</th>
        </tr>
        </thead>
        <tbody>";
    }
    else{
        echo "NO DATA........";
    }


    $sqlCountGatepassItem = "SELECT COUNT(gatepass) AS Count FROM tbl_outbound WHERE gatepass='". $row['gatepass'] ."'";
    $CountGatepassItem = $conn->query($sqlCountGatepassItem);
    $GatepassItem = mysqli_fetch_array($CountGatepassItem,MYSQLI_ASSOC);
    $GatepassItem = $GatepassItem['Count'];


        echo "
        <tr>
            <th>".$arr_dateTrans[0]."</th>
            <td>".$arr_dateVann[0]."</td>
            <td>".$arr_gatepass[0]."</td>
            <td>".$arr_air[0]."</td>
            <td>".$arr_sea[0]."</td>
            <td>".$arr_uom[0]."</td>
            <td>".$arr_address[0]."</td>
            <td>

            ";

            for($i = 0 ; $i < count($arr_caseNo); $i++){
               echo $arr_caseNo[$i]; echo "<br>";
            }


            echo "
            </td>
            <td>".$arr_grossWt[0]."</td>
            <td>".$arr_truckNo[0]."</td>
            <td>".$arr_m3[0]."</td>
            <td>".$arr_broker[0]."</td>
            <td>".$arr_linePerItems[0]."</td>
            <td>".$arr_totalQty[0]."</td>
            <td>".$arr_destination[0]."</td>
            <td>".$arr_invoice[0]."</td>

        </tr>";

        // =========================================================

                echo "
        <tr>
            <th>".$arr_dateTrans[1]."</th>
            <td>".$arr_dateVann[1]."</td>
            <td>".$arr_gatepass[1]."</td>
            <td>".$arr_air[1]."</td>
            <td>".$arr_sea[1]."</td>
            <td>".$arr_uom[1]."</td>
            <td>".$arr_address[1]."</td>
            <td>

            ";

            for($i = 0 ; $i < count($arr_caseNo); $i++){
               echo $arr_caseNo[$i]; echo "<br>";
            }


            echo "
            </td>
            <td>".$arr_grossWt[1]."</td>
            <td>".$arr_truckNo[1]."</td>
            <td>".$arr_m3[1]."</td>
            <td>".$arr_broker[1]."</td>
            <td>".$arr_linePerItems[1]."</td>
            <td>".$arr_totalQty[1]."</td>
            <td>".$arr_destination[1]."</td>
            <td>".$arr_invoice[1]."</td>

        </tr>";



    
    echo "  
    </tbody>
    </table>
    ";

    ?>

  </div>

   <!-- Bootstrap core JavaScript
   -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="js/demo/datatables-demo.js"></script>