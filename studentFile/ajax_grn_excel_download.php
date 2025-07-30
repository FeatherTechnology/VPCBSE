<?php 
// error_reporting(0);
@session_start();
include('../ajaxconfig.php');

if($_SESSION['userid']!=""){
    $userid	= $_SESSION['userid'];
}
if(isset($_POST["pono"])){
	$pono = $_POST["pono"]; 
}
if(isset($_POST["grnno"])){
	$grnno = $_POST["grnno"]; 
}

if($pono[0] == 'P'){
        
    $isgrntakenqry = $mysqli->query("SELECT isgrntaken FROM purchaseorder WHERE ponumber = '".$pono."' ");
    if($isgrntakenqry->num_rows>0){
        while($row = $isgrntakenqry->fetch_assoc()){
            $isgrntaken = $row["isgrntaken"];
        }
    }

    //If Not Taken For GRN
    if($isgrntaken == 0 || $isgrntaken == '0'){
        $getpono = $mysqli->query("SELECT * FROM purchaseorder WHERE ponumber = '".$pono."' "); 

        while($row = $getpono->fetch_assoc()){
            $partcode1      = $row["partcode"];
            $description1   = $row["description"];
            $hsncode1       = $row["hsncode"];
            $quantity1      = $row["quantity"];
            $unitprice1     = $row["unitprice"];
        }
        $partcode    = explode(',', $partcode1);
        $description = explode(',', $description1);
        $hsncode     = explode(',', $hsncode1);
        $quantity    = explode(',', $quantity1);
        $unitprice   = explode(',', $unitprice1);
    }

    //If already Taken For GRN
    else if($isgrntaken == 1 || $isgrntaken == '1')
    {
        $getpodetails = $mysqli->query("SELECT * FROM goodsreceivingnoteref WHERE pono = '".$pono."' AND quantity != receivedquantity");
        if($getpodetails->num_rows>0){
            while ($row = $getpodetails->fetch_assoc()){
                $refid[]              = $row["goodsreceivingnoterefid"];
                $partcode[]           = $row["partcode"];
                $description[]        = $row["partdescription"];
                $hsncode[]            = $row["hsncode"];
                $quantity[]           = $row["quantity"];
                $receivablequantity[] = $row["receivablequantity"];
                $unitprice[]          = $row["unitprice"];
                $rpdescription[]      = $row["rpdescription"];
                $receivedquantity[]   = $row["receivedquantity"];
            }
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excel Download</title>
    </head>
    <body>
    <input type="hidden" id="ponumber" value="<?php echo $pono; ?>" >

    <table id="grn_table">
        <thead>
        
            <th>Po No</th>
            <th>Part Number</th>
            <th>Part Description</th>
            <th>HSN Code</th>
            <th>Quantity</th>
            <?php if(isset($receivablequantity)) { ?> <th>Receivable Quantity</th> <?php } ?>
            <th>Unit Price</th>
            <th>Receiving Part Description</th>
            <th>Received Quantity</th>
            <th>Received Price</th>
            <th>GRN</th>
            <?php if(isset($refid)) { ?> <th>Ref Id</th>    <?php } ?>
        </thead>
        <tbody>
        <?php
        if(isset($partcode)){
        for($i=0; $i<=sizeof($partcode)-1; $i++){ ?>
        <tr>
        
            <td>
                <?php echo $pono; ?>
            </td>
            <td>
                <?php if(isset($partcode)){ echo $partcode[$i]; } else { echo $partcode[$i]; } ?>
            </td>
            <td>
                <?php if(isset($description)){ echo $description[$i]; } else { echo $description[$i]; } ?>
            </td>
            <td>
                <?php if(isset($hsncode)){ echo $hsncode[$i]; } else { echo $hsncode[$i]; } ?>
            </td>
            <td>
                <?php if(isset($quantity)){ echo $quantity[$i]; } else { echo $quantity[$i]; } ?>                
            </td>
            <?php if(isset($receivablequantity)){ ?>
                <td>
                    <?php  echo $receivablequantity[$i]; ?>                
                </td>
            <?php } ?>
            <td>
                <?php if(isset($unitprice)){ echo $unitprice[$i]; } else { echo $unitprice[$i]; } ?>                
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $grnno; ?></td>
            <?php if(isset($refid)){ ?>
                <td>
                    <?php echo $refid[$i]; ?>
                </td>
            <?php } ?>
        </tr>
        <?php }} ?>
        </tbody>
    </table>

<?php }else if($pono[0] == 'T'){
    $isgrntakenqry = $mysqli->query("SELECT transferid, isgrntaken FROM transfer WHERE transfernumber = '".$pono."' ");
    if($isgrntakenqry->num_rows>0){
        while($row = $isgrntakenqry->fetch_assoc()){
            $transferid = $row["transferid"];
            $isgrntaken = $row["isgrntaken"];
        }
    }

    //If Not Taken For GRN
    if($isgrntaken == 0 || $isgrntaken == '0'){
        $gettransferId=$mysqli->query("SELECT transferid FROM transfer WHERE transfernumber = '".$pono."' ");
		while($row=$gettransferId->fetch_assoc()){
			$transferid        = $row["transferid"];

			$gettransferRefdetails=$mysqli->query("SELECT * FROM transferref WHERE transferid = '".$transferid."' ");
            while($row = $gettransferRefdetails->fetch_assoc()){
                $partcode1      = $row["partnumber"];
                $description1   = $row["description"];
                $hsncode1       = $row["hsncode"];
                $quantity1      = $row["quantity"];
                $unitprice1     = $row["unitprice"];
            }
            $partcode    = explode(',', $partcode1);
            $description = explode(',', $description1);
            $hsncode     = explode(',', $hsncode1);
            $quantity    = explode(',', $quantity1);
            $unitprice   = explode(',', $unitprice1);
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Excel Download</title>
    </head>
    <body>
    <input type="hidden" id="ponumber" value="<?php echo $pono; ?>" >

    <table id="grn_table">
        <thead>
        
            <th>Po No</th>
            <th>Part Number</th>
            <th>Part Description</th>
            <th>HSN Code</th>
            <th>Quantity</th>
            <?php if(isset($receivablequantity)) { ?> <th>Receivable Quantity</th> <?php } ?>
            <th>Unit Price</th>
            <th>Receiving Part Description</th>
            <th>Received Quantity</th>
            <th>Received Price</th>
            <th>GRN</th>
            <?php if(isset($refid)) { ?> <th>Ref Id</th>    <?php } ?>
        </thead>
        <tbody>
        <?php
        if(isset($partcode)){
        for($i=0; $i<=sizeof($partcode)-1; $i++){ ?>
        <tr>
        
            <td>
                <?php echo $pono; ?>
            </td>
            <td>
                <?php if(isset($partcode)){ echo $partcode[$i]; } else { echo $partcode[$i]; } ?>
            </td>
            <td>
                <?php if(isset($description)){ echo $description[$i]; } else { echo $description[$i]; } ?>
            </td>
            <td>
                <?php if(isset($hsncode)){ echo $hsncode[$i]; } else { echo $hsncode[$i]; } ?>
            </td>
            <td>
                <?php if(isset($quantity)){ echo $quantity[$i]; } else { echo $quantity[$i]; } ?>                
            </td>
            <?php if(isset($receivablequantity)){ ?>
                <td>
                    <?php  echo $receivablequantity[$i]; ?>                
                </td>
            <?php } ?>
            <td>
                <?php if(isset($unitprice)){ echo $unitprice[$i]; } else { echo $unitprice[$i]; } ?>                
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $grnno; ?></td>
            <?php if(isset($refid)){ ?>
                <td>
                    <?php echo $refid[$i]; ?>
                </td>
            <?php } ?>
        </tr>
        <?php }} ?>
        </tbody>
    </table>
<?php } ?>
<br />

<button type="button" id="downloadpo" onclick="ExportToExcel('xlsx')">Export table to excel</button>

<script type="text/javascript">
	function ExportToExcel(type, fn, dl) {
	   var pono = document.getElementById('ponumber').value;
       var elt = document.getElementById('grn_table');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || (pono+'.' + (type || 'xlsx')));
    }
</script>
</body>
</html>

