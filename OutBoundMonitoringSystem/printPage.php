<?php include 'header.php'; ?>

<div class="container-fluid">
 <br>
 <br>
   <br>
   <div class="row">

      <div class="col-md-6">
        <center>
          <h1>TMAP INVOICE</h1>
          <div class="col-md-6">
            <small>SPECIFIC DATE</small>
            <form name="printByDate" method="get" action="reportPendingTmapInvoice.php" target="_blank">
              <input type="date" required="true" name="txtDate1" class="form-control">
              <small>TO</small>
              <input type="date" required="true" name="txtDate2" class="form-control">
              <br>
              <input type="submit" name="btnTmapInvoice" value="PRINT" class="btn btn-success">
            </form>
          </div>
        </center>
      </div>

      <div class="col-md-6">
        <center>
          <h1>OUTBOUND SHIPMENT</h1>
          <div class="col-md-6">
            <small>SPECIFIC DATE</small>
            <form name="printByDate" method="get" action="reportOutboundShipment.php" target="_blank">
              <input type="date" required="true" name="txtDate1" class="form-control">
              <small>TO</small>
              <input type="date" required="true" name="txtDate2" class="form-control">
              <br>
              <input type="submit" name="btnTmapInvoice" value="PRINT" class="btn btn-success">
            </form>
          </div>
        </center>
      </div>
  </div>
</div>


<?php include 'footer.php' ?>