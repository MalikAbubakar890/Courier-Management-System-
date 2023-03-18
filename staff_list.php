<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-tool d-flex">
		          <h3 class="m-0"><?php echo $title ?></h3>
				<a class="btn btn-sm btn-default" href="./dashboard.php?page=new_staff"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Staff</th>
						<th>Email</th>
						<th>Branch</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$query="SELECT u.*,concat(u.firstname,', ',u.lastname) as name,concat(b.street,', ',b.city,', ',b.state,', ',b.zip_code,', ',b.country) as baddress FROM users u inner join branches b on b.id = u.branch_id where u.type = 2 order by concat(u.firstname,' ',u.lastname) asc";
         					 while ($row = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo $row['name'] ?></b></td>
						<td><b><?php echo $row['email'] ?></b></td>
						<td><b><?php echo $row['baddress'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="dashboard.php?page=edit_staff&id=<?php echo $row['id'] ?>" class="btn">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn delete_staff" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php } ?>
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
		$('.view_staff').click(function(){
			uni_modal("staff's Details","view_staff.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_staff').click(function(){
	_conf("Are you sure to delete this staff?","delete_staff",[$(this).attr('data-id')])
	})
	})
	function delete_staff($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_staff',
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