<?php if(!isset($conn)){ include 'db_connect.php'; } ?>
<style>
  input{
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
			<form action="" id="manage-branch">
        <input type="hidden" name="id" value="<?php if(isset($qry)){ echo $qry['id']; }?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>
            <div class="row">
              <div class="col-sm-12 form-group ">
                <label for="" class="control-label">Branch Name</label>
                <input name="branch_name" id="" value="<?php if(isset($qry)){ echo $qry['branch_name']; }?>" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Street/Building</label>
                <input name="street" value="<?php if(isset($qry)){ echo $qry['street']; }?>" id="" class="form-control"><?php echo isset($street) ? $street : '' ?>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">City</label>
                <input name="city" id="" value="<?php if(isset($qry)){ echo $qry['city']; }?>" class="form-control"><?php echo isset($city) ? $city : '' ?>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">State</label>
                <input name="state" value="<?php if(isset($qry)){ echo $qry['state']; }?>" id="" class="form-control"><?php echo isset($state) ? $state : '' ?>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Zip Code/ Postal Code</label>
                <input value="<?php if(isset($qry)){ echo $qry['zip_code']; }?>" name="zip_code" id="" class="form-control"><?php echo isset($zip_code) ? $zip_code : '' ?>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Country</label>
                <input value="<?php if(isset($qry)){ echo $qry['country']; }?>" name="country" id="" class="form-control"><?php echo isset($country) ? $country : '' ?>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Contact #</label>
                <input value="<?php if(isset($qry)){ echo $qry['contact']; }?>" name="contact" id="" class="form-control"><?php echo isset($contact) ? $contact : '' ?>
              </div>
            </div>

          </div>
        </div>
      </form>
  	</div>
  	<div class="card-footer border-top">
  		<div class="d-flex w-100 justify-content-end align-items-center">
  			<button class="btn save-btn mx-2" form="manage-branch">Save</button>
  			<a class="btn bg-secondary mx-2" href="./index.php?page=branch_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<script>
	$('#manage-branch').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_branch',
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
              location.href = 'dashboard.php?page=branch_list'
					},2000)
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