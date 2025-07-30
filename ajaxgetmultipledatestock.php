<?php
include 'ajaxconfig.php';
@session_start();

if(isset($_SESSION["userid"])){
	$userid = $_SESSION["userid"];
}

if(isset($_POST["startdate"])){
	$startdate1 = $_POST["startdate"];
	$startdate  = date("Y-m-d", strtotime($startdate1));  
}
if(isset($_POST["enddate"])){
	$enddate1 = $_POST["enddate"];
	$enddate  = date("Y-m-d", strtotime($enddate1));  
}

?>
<!-- Ajax Get multiple Date Stock -->
<div class="card" id="stockinformation">
	<div class="card-header">Stock Information</div>
	<div class="card-body">
	<div class="text-right">
		<button type="button" id="downloadstd" class="btn btn-outline-success" onclick="ExportToExcel('xlsx')"><span class="icon-download"></span>&nbsp; Excel </button>
	</div><br>  
	<div style="overflow-x: scroll;">
	<table class="table custom-table" id="sstable1">
		<tr>
			<th>Item Code</th>
			<th>Item Description</th>
			<th>Opening Stock</th>
			<th>Old Purchase Qty</th>
			<th>Old Issued Qty</th>
			<th>Purchase Qty</th>
			<th>Issued Qty</th>
			<th>Closing Qty</th>
		</tr>
<?php

$partnumber1          = array();
$itemname1            = array();
$openingquantity1     = array();
$openunitprice1       = array();
$purchasequantity1    = array();
$receivedquantity1    = array();
$receivedunitprice1   = array();
$damagetype1          = array();
$quantity1            = array();
$unitprice1           = array();
$selledquantity1      = array();
$partnumber1ref       = array();
$item_id          = array();
$account1id 		  = array();
$initialopeningstock1 = array();
$exp_quantity1		  = array();
$subquantity1		  = array();
$subprice1		      = array();
$item_ids		      = array();
$itemids		      = array();
$itemids1		      = array();



 if($startdate1 != 0 || $startdate != '' && $enddate1 != 0 || $enddate != '') {

	$getitem1 = $mysqli->query("SELECT * FROM purchaseorderref WHERE DATE(createddate) >= '".$startdate."' AND DATE(createddate) <= '".$enddate."' ") or die("Error :".$mysqli->error);
	
	while ($row=$getitem1->fetch_assoc()){

		$item_id[] = $row["item_id"];  
		
		
	}

	$getitem2 = $mysqli->query("SELECT * FROM stock_issuance_ref WHERE DATE(createddate) >= '".$startdate."' AND DATE(createddate) <= '".$enddate."' ") or die("Error :".$mysqli->error);

	while ($row=$getitem2->fetch_assoc()){

		$item_ids[] = $row["item_id"];
		
		
	}


	$Sitemid  = array_merge($item_id, $item_ids); 
	
	// remove array duplicates without affect array index
	$account1id1=$Sitemid;
	$duplicated=array();

	foreach($account1id1 as $k=>$v) {

		if( ($kt=array_search($v,$account1id1))!==false and $k!=$kt ){ 
				unset($account1id1[$kt]);  $duplicated[]=$v; }
		}

			sort($account1id1);  // optional

	for($i=0; $i<=sizeof($account1id1)-1; $i++){
		$getitem1ref = $mysqli->query("SELECT * FROM item_creation WHERE item_id = '".$account1id1[$i]."' ") or die("Error :".$mysqli->error);
		while ($row1=$getitem1ref->fetch_assoc()){
	
				$account1id[] = $row1["item_id"]; 
				$itemname1[]   = $row1["description"]; 
				$item_code[]   = $row1["item_code"]; 
		
		} 
	}
}
	// ACCOUNT 1
	if(isset($account1id)){
		for($o=0; $o<=sizeof($account1id)-1; $o++){
			$getrefqry =$mysqli->query("SELECT account1ref.openingstock AS openingquantity, account1ref.purchaseprice,account1ref.initialopeningstock, account1ref.purchasestock,  account1ref.createddate, 
			goodsreceivingnoteref.receivedquantity, goodsreceivingnoteref.receivedunitprice, goodsreceivingnoteref.createddate, damageexpiryref.damagetype, SUM(damageexpiryref.quantity) AS quantity,
				SUM(damageexpiryref.exp_quantity) AS exp_quantity,  
			damageexpiryref.unitprice, damageexpiryref.createddate,  posreceivesub.subquantity, posreceivesub.subprice, posreceivesub.createddate FROM `account1ref` LEFT JOIN damageexpiryref 
			ON (account1ref.account1id = damageexpiryref.item_id) LEFT JOIN posreceivesub ON (account1ref.account1id = posreceivesub.item_id)
			LEFT JOIN goodsreceivingnoteref ON (account1ref.account1id = goodsreceivingnoteref.itemid)
			WHERE purchaseorderref.item_id = '".$account1id[$o]."' OR stock_issuance_ref.item_id = '".$account1id[$o]."' OR purchaseorderref.createddate >= '".$startdate."' AND purchaseorderref.createddate <= '".$enddate."' 
			OR  stock_issuance_ref.createddate >= '".$startdate."' AND stock_issuance_ref.createddate <= '".$enddate."' "); 
			while($orow = $getrefqry->fetch_assoc()){

				$initialopeningstock1[] = $orow["initialopeningstock"]; 
			$openingquantity1[]  	= $orow["openingquantity"];
			$openunitprice1[]    	= $orow["purchaseprice"];
			$purchasequantity1[]   	= $orow["purchasestock"];
			$receivedquantity1[]    = $orow["receivedquantity"];
			$receivedunitprice1[]   = $orow["receivedunitprice"];
			$damagetype1[]     		= $orow["damagetype"];
			$quantity1[]     		= $orow["quantity"];
			$exp_quantity1[]     	= $orow["exp_quantity"]; 
			$unitprice1[]     		= $orow["unitprice"];
			$subquantity1[]     	= $orow["subquantity"]; 
			$subprice1[]     	    = $orow["subprice"]; 
			}
		}
	}


	$Saccount1id         = $account1id; 
	$Spartnumber         = $partnumber1;
	$Sitemname           = $itemname1;
	$Sopeningquantity    = $openingquantity1;
	$Sopenunitprice      = $openunitprice1;
	$Spurchasequantity   = $purchasequantity1;
	$Sreceivedquantity   = $receivedquantity1;
	$Sreceivedunitprice  = $receivedunitprice1;
	$Sdamagetype         = $damagetype1;  
	$Squantity           = $quantity1;
	$Sexp_quantity       = $exp_quantity1;    
	$Sunitprice          = $unitprice1;
	$Sinitialopeningstock= $initialopeningstock1;
	$Ssubquantity = $subquantity1;
	$Ssubprice = $subprice1;
	

if(sizeof($account1id)>0){		
	for($i=0;$i<=sizeof($account1id)-1;$i++){ ?>
<tbody>
			<td><?php echo $Spartnumber[$i]; ?></td>
			<td><?php echo $Sitemname[$i]; ?></td>

			<td><?php echo $Sinitialopeningstock[$i]; ?></td>
			
			<?php if($Sopenunitprice[$i]>0){ ?>
				<td><?php echo $Sopenunitprice[$i]; ?></td>
			<?php  }else{ ?>
				<td><?php echo 0; ?></td>
			<?php } ?>

			<td><?php $Sopeningval = $Sinitialopeningstock[$i] * $Sopenunitprice[$i]; echo $Sopeningval;  ?></td>

			<!-- grn -->
			<?php if($Sreceivedquantity[$i]>0){ ?>
            	<td><?php echo $Sreceivedquantity[$i]; ?></td>
           <?php  }else{ ?>
                <td><?php echo 0; ?></td>
            <?php } ?>

			<?php if($Sreceivedquantity[$i]>0){ ?>
				<td><?php echo $Sreceivedunitprice[$i]; ?></td>
			<?php  }else{ ?>
				<td><?php echo 0; ?></td>
			<?php } ?>
			
			<td><?php $Sgrnvalue = $Sreceivedquantity[$i]*$Sreceivedunitprice[$i]; echo $Sgrnvalue; ?></td>

			<!-- Sales -->
			<?php if($Ssubquantity[$i]>0){ ?>
            	<td><?php echo $Ssubquantity[$i]; ?></td>
           <?php  }else{ ?>
                <td><?php echo 0; ?></td>
            <?php } ?>

			<?php if($Ssubquantity[$i]>0){ ?>
				<td><?php echo $Ssubprice[$i]; ?></td>
			<?php  }else{ ?>
				<td><?php echo 0; ?></td>
			<?php } ?>

			<td><?php  $Sselledvalue = $Ssubquantity[$i]*$Ssubprice[$i]; echo $Sselledvalue; ?></td>


			 <!-- Damage and expiry -->
			 <?php if($Squantity[$i]>0){ ?>
            	<td><?php echo $Squantity[$i]; ?></td>
           <?php  }else{ ?>
                <td><?php echo 0; ?></td>
            <?php } ?>

			<?php if($Sexp_quantity[$i]>0){ ?> 
            	<td><?php echo $Sexp_quantity[$i]; ?></td>
           <?php  }else{ ?>
                <td><?php echo 0; ?></td>
            <?php } ?>

			<?php if($Sunitprice[$i]>0){ ?>
				<td><?php echo $Sunitprice[$i]; ?></td>
			<?php } else { ?>
				<td><?php echo 0; ?></td>
			<?php } ?>

			<td><?php $Sdevalue = ($Squantity[$i] + $Sexp_quantity[$i]) * $Sunitprice[$i]; echo $Sdevalue;  ?></td> 

			<?php 
			// $closingquantity = $Sopeningquantity[$i] + $Spurchasequantity[$i]  - $Stransferredstock[$i] - $Sselledquantity[$i] - $Sdamagecount[$i] - $Sexpirycount[$i];
			$closingup       = $Sopenunitprice[$i]; 
			$closingvalue    = $Sopeningquantity[$i] * $Sopenunitprice[$i]; 
			?>

			<td><?php echo $Sopeningquantity[$i] ; ?></td>
			<?php if($Sopeningquantity[$i]>0){ ?>
            	<td><?php echo abs($closingup); ?></td>
           <?php  }else{ ?>
                <td><?php echo 0; ?></td>
            <?php } ?>
			<td><?php echo abs($closingvalue); ?></td>
		</tbody>
		<?php } } else {
		$notavl="No Records Found"; ?>
		<label class="text-danger"><?php echo $notavl; ?></label>
		<?php } ?>
</table>
</div>
</div>
</div>

<script type="text/javascript">
	function ExportToExcel(type, fn, dl) {
	   var today = new Date();
       var dd = String(today.getDate()).padStart(2, '0');
       var mm = String(today.getMonth() + 1).padStart(2, '0');
       var yyyy = today.getFullYear();
       today = mm + '-' + dd + '-' + yyyy;

       var elt = document.getElementById('sstable1');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
       XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
       XLSX.writeFile(wb, fn || ("Stock"+today+'.' + (type || 'xlsx')));
    }
</script>