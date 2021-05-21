  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
    ?>

    <title><?php echo "PTI-". generateRandomString(); ?></title>

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

    </head>


    <body onload="window.print()" id="rrd">  


      <div class="container-fluid">

       <br>

       <?php 
       require 'connection.php';

       $date1 = $_GET["txtDate1"];
       $date2 = $_GET["txtDate2"];
       ?>

       <h5><b>PENDING WAITING FOR TMAP INVOICE</b></h5>

       <?php 

       $sql = "SELECT * FROM tbl_outbound WHERE date4trans >='".$date1."' AND date4trans <='".$date2."' ORDER BY date4trans ASC";

       $displayGatepass = $conn->query($sql);

       if ($displayGatepass->num_rows > 0) {
        echo "
        <table class='table table-bordered tmap-Table' width='100%' cellspacing='0'>
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
        <th scope='col'>TOTAL QTY</th>
        <th scope='col'>DESTINATION</th>
        <th scope='col'>INVOICE</th>
        <th scope='col'>NO. OF PKGS</th>
        <th scope='col'>LINE PER ITEM</th>
        <th scope='col'>QTY</th>
        </tr>
        </thead>
        <tbody>
        ";

      }
      else{
       echo "
       <script type='text/javascript'>
       function reDirect() {

        alert('NO DATA!');
        window.close();
      }
      setTimeout(reDirect, 10);
      </script>";

    }

    while($row = $displayGatepass->fetch_assoc()) {
      echo "
      <tr>
      <td>".$row['dateTrans']."</td>
      <td>".$row['dateVann']."</td>
      <td>".$row['gatepass']."</td>
      <td>".$row['air']."</td>
      <td>".$row['sea']."</td>
      <td>".$row['uom']."</td>
      <td>".$row['address']."</td>
      <td>".$row['caseNo']."</td> 
      <td>".$row['grosswt']."</td>
      <td>".$row['truckNo']."</td>
      <td>".$row['m3']."</td>
      <td>".$row['broker']."</td>
      <td>".$row['linePerItems']."</td>
      <td>".$row['totalQty']."</td>
      <td>".$row['destination']."</td>
      <td>".$row['invoiceNo']."</td>
      <td></td>
      <td></td>
      <td></td>

      </tr>
      ";
    }
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

 </body>


 </html>