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

  <style type="text/css">.table td, .table th{vertical-align: middle!important;}</style>
  <title><?php echo "OBS-". generateRandomString(); ?></title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
  <?php $year = date("Y"); ?>
  <?php include 'function.php'; 
  ?>
</head>
<body onload="window.print()" id="rrd">  
  <br>
  <div class="container">
    <img src="img/company-logo.png" id="company-logo">
    <br>
    <br>
    <p>To :&nbsp&nbsp&nbsp <span class="r-head">Toyota Motor Philippines Logistics. Inc.</span></p>
    <p>Attn : <span class="r-name">Larry Tejano</span></p>
    <span class="r-posi">Service Parts</span>
    <p>Re :&nbsp&nbsp&nbsp&nbsp<span class="r-title">RECEIVING DELIVERY</span></p>
    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i><u>Control Number:</u></i>&nbsp&nbsp&nbsp&nbsp&nbsp<i style="font-size: 18px; font-weight: 100;"><b>GAP-</b>
      <?php
      $myDate = date('m/d/Y');  
      $timestamp = strtotime($myDate);
      $xMonth = date("m" , $timestamp);
      $xMonth = strtoupper($xMonth);
      $xYear = date("Y" , $timestamp);
        echo $xYear."-".$xMonth; //   Control Number:     GAP- 2020-02
        ?>
      </i></p>

      <?php 
      require 'connection.php';

      $date1 = $_GET["txtDate1"];
      $date2 = $_GET["txtDate2"];
      $count = 1;

      $sql = "SELECT * FROM tbl_outbound WHERE date4trans >='".$date1."' AND date4trans <='".$date2."' ORDER BY date4Vann ASC";

      $displayGatepass = $conn->query($sql);

      if ($displayGatepass->num_rows > 0) {
        echo "
        <table class='table table-bordered tmap-Table' width='100%' cellspacing='0'>
        <thead> 
        <tr>
          <th scope='col'>NO</th>
          <th scope='col'>DN DATE</th>
          <th scope='col'>DESTINATION</th>
          <th scope='col'>GATEPASS #</th>
          <th scope='col'>CASE NO.</th>
          <th scope='col'>AIR</th>
          <th scope='col'>SEA</th>  
          <th scope='col'>BROKER</th>
          <th scope='col'>DATE P-O</th>
          <th scope='col'>TMP INVOICE</th>
          <th scope='col'>M3</th>
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
          <td>".$count++."</td>
          <td>".$row['dateVann']."</td>
          <td>".$row['destination']."</td>
          <td>".$row['gatepass']."</td>
          <td>".$row['caseNo']."</td>
          <td>".$row['air']."</td>
          <td>".$row['sea']."</td>
          <td>".$row['broker']."</td>
          <td>".$row['dateTrans']."</td>
          <td>".$row['invoiceNo']."</td>
          <td>".$row['m3']."</td>
        </tr>
        ";
      }
      echo "  
      </tbody>                                                      
      </table>
      ";
      ?>
      <br>
      <br>
    </div>
  </body>
  </html>


