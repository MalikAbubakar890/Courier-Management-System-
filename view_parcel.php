<?php
include 'db_connect.php';
$id = $_GET['id'];
$parcels = "SELECT * FROM `parcels` WHERE traking_number = $id";
$query = mysqli_query($conn,$parcels);
while ($row = mysqli_fetch_array($query)) {

?>
<script>
$('#update_status').click(function(){
	uni_modal("Update Status of: <?php echo $row['traking_number'] ?>","manage_parcel_status.php?id=<?php echo $id ?>&cs=<?php echo $row['status'] ?>","")
})
</script>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b><?php echo $row['traking_number']?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo $row['sender_name'] ?></dd>
						<dt>Address:</dt>
						<dd><?php echo $row['sender_address'] ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo $row['sender_contact'] ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Consignee Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo $row['recipient_name'] ?></dd>
						<dt>Address:</dt>
						<dd><?php echo $row['recipient_address'] ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo $row['recipient_contact'] ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Parcel Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Weight:</dt>
									<dd><?php echo $row['weight'] ?></dd>
									<dt>Height:</dt>
									<dd><?php echo $row['height'] ?></dd>
									<dt>Price:</dt>
									<dd><?php echo $row['price'] ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Width:</dt>
									<dd><?php echo $row['width'] ?></dd>
									<dt>length:</dt>
									<dd><?php echo $row['length'] ?></dd>
									<dt>Type:</dt>
									<dd><?php echo $row['type'] ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
							<dt>Nearest Branch to Consignee for Pickup:</dt>
							<dd><?php echo $row['from_branch_id'] ?></dd>
							<dt>Status:</dt>
						<dd>
							<?php 
							$status = $row['status'];
							switch ($status) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Collected</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
									break;
								case '6':
									echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
									break;
								case '7':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								case '8':
									echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
									break;
								case '9':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;
								case '10':
									echo "<span class='badge badge-pill badge-danger'>".$row['status_field']."</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
									
									break;
							}

							?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
