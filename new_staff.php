<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card">
    <div class="card-header">
      <div class="c">
          <h3 class="m-0"><?php echo $title ?></h3>
      </div>
    </div>
		<div class="card-body">
			<form action="" id="manage-staff">
        <input type="hidden" name="id" value="<?php if(isset($qry)){ echo $qry['id']; }?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">First Name</label>
                <input type="text" name="firstname" id="" class="form-control " value="<?php if(isset($qry)){ echo $qry['firstname']; }?>" required>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Last Name</label>
                <input type="text" name="lastname" id="" class="form-control " value="<?php if(isset($qry)){ echo $qry['lastname']; }?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Branch</label>
                <select name="branch_id" id="" class="form-control input-sm">
                  <option value="">Select branch</option>
                  <?php
                    $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                    while($row = $branches->fetch_assoc()):
                  ?>
                  <option value="<?php if(isset($row)){ echo $row['id']; }?>"><?php if(isset($row)){ echo $row['branch_name']; }?></option>
                <?php endwhile; ?>
                </select>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Email</label>
                <input type="email" name="email" id="" class="form-control " value="<?php if(isset($qry)){ echo $qry['email']; }?>" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Password</label>
                <input type="password" name="password" id="" class="form-control " value="<?php if(isset($qry)){ echo $qry['password']; }?>">
                <?php if(isset($id)): ?>
                  <small class=""><i>Leave this blank if you dont want to change this</i></small>
                <?php endif; ?>
              </div>
            </div>

            
          </div>
        </div>
      </form>
  	</div>
  	<div class="card-footer border-top">
  		<div class="d-flex w-100 justify-content-end align-items-center">
  			<button class="btn btn-flat  save-btn mx-2" form="manage-staff">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=staff_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<script>
	$('#manage-staff').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
              location.href = 'dashboard.php?page=staff_list'
					},2000)
				}else if(resp == 2){
          $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Email already exist.</div>')
          end_load()
        }
			}
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>