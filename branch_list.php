<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-tool d-flex">
		          <h3 class="m-0"><?php echo $title ?></h3>
				<a class="btn btn-sm btn-default" href="./dashboard.php?page=new_branch"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-striped" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Branch Name</th>
						<th>Street/Building/Brgy.</th>
						<th>City/State/Zip</th>
						<th>Country</th>
						<th>Contact #</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM branches order by street asc,city asc, state asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td class=""><b><?php echo $row['branch_name'] ?></b></td>
						<td><b><?php echo ucwords($row['street']) ?></b></td>
						<td><b><?php echo ucwords($row['city'].', '.$row['state'].', '.$row['zip_code']) ?></b></td>
						<td><b><?php echo ucwords($row['country']) ?></b></td>
						<td><b><?php echo $row['contact'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="dashboard.php?page=edit_branch&id=<?php echo $row['id'] ?>" class="btn ">
		                          <i class="fa fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn delete_branch" data-id="<?php echo $row['id'] ?>">
		                          <i class="fa fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_branch').click(function(){
			uni_modal("branch's Details","view_branch.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_branch').click(function(){
	_conf("Are you sure to delete this branch?","delete_branch",[$(this).attr('data-id')])
	})
	})
	function delete_branch($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_branch',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>