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
      <form action="" id="manage-parcel">

  <?php  $rand = rand(123456789 , 987654321); ?>  
          
        <input type="hidden" name="traking_number" value="<?php echo $rand; ?>">
          
        
        <input type="hidden" name="id" value="<?php if(isset($qry)){ echo $qry['id']; }?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="dtype" class="text-dark">Type</label>
              <input type="checkbox" name="type" id="dtype" <?php echo isset($type) && $type == 1 ? 'checked' : '' ?> data-bootstrap-switch data-toggle="toggle" data-on="Deliver" data-off="Pickup" class="switch-toggle status_chk" data-size="xs" data-offstyle="info" data-width="5rem" value="<?php if(isset($qry)){ echo $qry['type']; }?>">
              <small class="text-dark">Deliver = Deliver to Consignee Address</small>
              <small class="text-dark">, Pickup = Pickup to nearest Branch</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <b>Sender Information</b>
                </div>
            <?php if($_SESSION['login_branch_id'] <= 0): ?>
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch Processed</label>
              <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                <option value=""></option>
                <?php 
                  $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                    while($row = $branches->fetch_assoc()):
                ?>
                  <option value="<?php if(isset($row)){ echo $row['branch_name']; }?>"><?php if(isset($row)){ echo $row['branch_name']; }?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <?php else: ?>
              <input type="hidden" name="from_branch_id" value="<?php echo $_SESSION['login_branch_id'] ?>">
            <?php endif; ?>  
                <div class="form-group">
                  <label for="" class="control-label">Name</label>
                  <input type="text" name="sender_name" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['sender_name']; }?>" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Address</label>
                  <input type="text" name="sender_address" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['sender_address']; }?>" required>
                </div>
                    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

                <div class="form-group">
                  <label for="" class="control-label">Contact #</label>
                  <input type="text"  data-inputmask="'mask': '0399-99999999'" required=""  maxlength = "12" name="sender_contact" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['sender_contact']; }?>" required placeholder="0399-99999999">
                </div>
                <div class="form-group">
                  <label for="" class="control-label">CNIC Number</label>

                    <input type="text" class="form-control" name="sender_cnic" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"  name="cnic" value="<?php if(isset($qry)){ echo $qry['sender_cnic']; }?>">


                </div>
                <script>
                  $(":input").inputmask();

                 </script>
                <div class="form-group">
                  <label for="" class="control-label">Email</label>
                  <input type="text" name="sender_email" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['sender_email']; }?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <b>Consignee Information</b>
                </div>
                  <div class="form-group" id="tbi-field">
                    <label for="" class="control-label">Pickup Branch</label>
                    <select name="to_branch_id" id="to_branch_id" class="form-control select2">
                      <option value=""></option>
                      <?php 
                        $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                          while($row = $branches->fetch_assoc()):
                      ?>
                  <option value="<?php if(isset($row)){ echo $row['branch_name']; }?>"><?php if(isset($row)){ echo $row['branch_name']; }?></option>

                      <?php endwhile; ?>
                    </select>
                  </div>
              <div class="form-group" id="tbi-fields" style="display: none;">
                <label for="" class="control-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php if(isset($qry)){ echo $qry['city']; }?>">
              </div>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['recipient_name']; }?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="recipient_address" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['recipient_address']; }?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text" name="recipient_contact" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['recipient_contact']; }?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">CNIC Number</label>
                <input type="text" name="recipient_cnic" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['recipient_cnic']; }?>">
              </div>
              <div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="text" name="recipient_email" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['recipient_email']; }?>">
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="card-header">
              <b>Parcel Inforamtion</b>
            </div>
        <table class="table table-striped" id="parcel-items">
          <thead>
            <tr>
              <th>Weight</th>
              <th>Height</th>
              <th>Length</th>
              <th>Width</th>
              <th>Price</th>
              <?php if(!isset($id)): ?>
              <th></th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name='weight[]' class="form-control" value="<?php if(isset($qry)){ echo $qry['weight']; }?>" required></td>
              <td><input type="text" name='height[]' class="form-control" value="<?php if(isset($qry)){ echo $qry['height']; }?>" required></td>
              <td><input type="text" name='length[]' class="form-control" value="<?php if(isset($qry)){ echo $qry['length']; }?>" required></td>
              <td><input type="text" name='width[]' class="form-control" value="<?php if(isset($qry)){ echo $qry['width']; }?>" required></td>
              <td><input type="text" class="text-right number form-control" name='price[]' class="form-control" value="<?php if(isset($qry)){ echo $qry['price']; }?>" required></td>
              <?php if(!isset($id)): ?>
              <td><button class="btn btn-sm " type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
          </tbody>
              <?php if(!isset($id)): ?>
          <tfoot>
            <th colspan="4" class="text-right">Total</th>
            <th class="text-right" id="tAmount">0.00</th>
            <th></th>
          </tfoot>
              <?php endif; ?>
        </table>
              <?php if(!isset($id)): ?>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <button  class="btn btn-sm btn-primary" type="button" id="new_parcel"><i class="fa fa-item"></i> Add Item</button>
          </div>
        </div>
              <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <b>Courier Information</b>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="control-label">Services</label>
                  <input type="text" name="service" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['service']; }?>">
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label">Pieces/quantity</label>
                    <input type="number" name="quantity" id="" class="form-control" value="<?php if(isset($qry)){ echo $qry['quantity']; }?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Content</label>
                <textarea type="text" name="content" cols="100" rows="5" id="" class="form-control"><?php if(isset($qry)){ echo $qry['content']; }?></textarea> 
              </div>
              </div>
                <div class="card-footer">
                  <div class="d-flex w-100 justify-content-end align-items-center">
                    <button class="btn btn-flat  save-btn mx-2" form="manage-parcel">Save</button>
                    <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="ptr_clone" class="d-none">
  <table>
    <tr>
        <td><input type="text" name='weight[]' class="form-control" required></td>
        <td><input type="text" name='height[]' class="form-control" required></td>
        <td><input type="text" name='length[]' class="form-control" required></td>
        <td><input type="text" name='width[]' class="form-control" required></td>
        <td><input type="text" class="text-right number form-control" name='price[]' class="form-control" required></td>
        <td><button class="btn btn-sm" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
      </tr>
  </table>
</div>
<script>
  $('#dtype').change(function(){
      if($(this).prop('checked') == true){
        $('#tbi-field').hide()
        $('#tbi-fields').show()
      }else{
        $('#tbi-field').show()
        $('#tbi-fields').hide()
      }
  })
    $('[name="price[]"]').keyup(function(){
      calc()
    })
  $('#new_parcel').click(function(){
    var tr = $('#ptr_clone tr').clone()
    $('#parcel-items tbody').append(tr)
    $('[name="price[]"]').keyup(function(){
      calc()
    })
    $('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })

  })
  $('#manage-parcel').submit(function(e){
    e.preventDefault()
    start_load()
    if($('#parcel-items tbody tr').length <= 0){
      alert_toast("Please add atleast 1 parcel information.","error")
      end_load()
      return false;
    }
    $.ajax({
      url:'ajax.php?action=save_parcel',
      data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
      success:function(resp){
      // if(resp){
      //       resp = JSON.parse(resp)
      //       if(resp.status == 1){
      //         alert_toast('Data successfully saved',"success");
      //         end_load()
      //         var nw = window.open('print_pdets.php?ids='+resp.ids,"_blank","height=700,width=900")
      //       }
      // }
        if(resp == 1){
            alert_toast('Data successfully saved',"success");
            setTimeout(function(){
              location.href = 'dashboard.php?page=parcel_list';
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
  function calc(){

        var total = 0 ;
         $('#parcel-items [name="price[]"]').each(function(){
          var p = $(this).val();
              p =  p.replace(/,/g,'')
              p = p > 0 ? p : 0;
            total = parseFloat(p) + parseFloat(total)
         })
         if($('#tAmount').length > 0)
         $('#tAmount').text(parseFloat(total).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
  }
</script>