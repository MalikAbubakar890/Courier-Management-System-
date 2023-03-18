<?php 

    include 'db_connect.php';
	
?>
<div class="container-fluid">
		<?php
		$sql = "SELECT * FROM `parcels` where `date_created`  BETWEEN "2022-09-23 13:41:57" AND "2022-09-24 23:59:59") ";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
		?>
		<table class="table table-striped">
			<tr>
				<th class="col-8">Sender Name</th>
				<th class="col-4">Price</th>
			</tr>
			<tr>
				<td><?php echo $row['sender_name']?></td>
				<td><?php echo $row['price']?></td>
			</tr>
			<!-- <tr>
				<th></th>
			</tr> -->
		</table>


		<?php
		 }
		}else{
			?>
			<table class="table table-striped text-center">
				<tr class="text-center">
					<th>No Record Found !</th>
				</tr>
			</table>
			<?php
		}
		?>
	</div>
