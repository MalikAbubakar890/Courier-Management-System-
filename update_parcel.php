  <!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 
error_reporting(0);
  include 'header.php' 
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'topbar.php' ?>
  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
    <?php 
    if (isset($_POST['update_parcel'])) {
        $id = $_GET['traking_number'];
      $from_branch_id = $_POST['from_branch_id'];
      $sender_name = $_POST['sender_name'];
      $sender_address = $_POST['sender_address'];
      $sender_contact = $_POST['sender_contact'];
      $sender_cnic = $_POST['sender_cnic'];
      $sender_email = $_POST['sender_email'];
      $to_branch_id = $_POST['to_branch_id'];
      $city = $_POST['city'];
      $recipient_name = $_POST['recipient_name'];
      $recipient_address = $_POST['recipient_address'];
      $recipient_contact = $_POST['recipient_contact'];
      $recipient_cnic = $_POST['recipient_cnic'];
      $recipient_email = $_POST['recipient_email'];
      $weight = $_POST['weight'];
      $height = $_POST['height'];
      $length = $_POST['length'];
      $width = $_POST['width'];
      $price = $_POST['price'];
      $service = $_POST['service'];
      $quantity = $_POST['quantity'];
      $content = $_POST['content'];

      $update = "UPDATE `parcels` SET from_branch_id = '$from_branch_id', sender_name = '".$sender_name."', sender_address = '".$sender_address."', sender_contact = '".$sender_contact."', sender_cnic = '".$sender_cnic."', sender_email = '".$sender_email."', sender_email = '".$sender_email."', to_branch_id = '".$to_branch_id."', city = '".$city."', recipient_name = '".$recipient_name."', recipient_address = '".$recipient_address."', recipient_contact = '".$recipient_contact."', recipient_cnic = '".$recipient_cnic."', recipient_email = '".$recipient_email."', weight = '".$weight."', height = '".$height."', length = '".$length."', width = '".$width."', price = '".$price."', service = '".$service."', quantity = '".$quantity."', content = '".$content."' WHERE traking_number = '".$id."'";
      $query_run= mysqli_query($conn,$update);
     
    }
    ?>
    <div class="card-body">
      <form action="" method="post">
        <?php 
        $id = $_GET['traking_number'];
        $parcels = "SELECT * FROM `parcels` WHERE traking_number = $id";
          $query = mysqli_query($conn,$parcels);
          while ($row = mysqli_fetch_array($query)) {


              $from_branch_id = $row['from_branch_id'];
              $sender_name = $row['sender_name'];
              $sender_address = $row['sender_address'];
              $sender_contact = $row['sender_contact'];
              $sender_cnic = $row['sender_cnic'];
              $sender_email = $row['sender_email'];
              $to_branch_id = $row['to_branch_id'];
              $city = $row['city'];
              $recipient_name = $row['recipient_name'];
              $recipient_address = $row['recipient_address'];
              $recipient_contact = $row['recipient_contact'];
              $recipient_cnic = $row['recipient_cnic'];
              $recipient_email = $row['recipient_email'];
              $service = $row['service'];
              $quantity = $row['quantity'];
              $content = $row['content'];


          }

        ?>
        <?php  $rand = rand(123456789 , 987654321); ?>  
                
              <input type="hidden" name="traking_number" value="<?php echo $rand; ?>">
                
        
        <input type="hidden" name="id" value="<?php if(isset($qry)){ echo $qry['id']; }?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="dtype" class="text-dark">Type</label>
              <input type="checkbox" name="type" id="dtype" <?php echo isset($type) && $type == 1 ? 'checked' : '' ?> data-bootstrap-switch data-toggle="toggle" data-on="Deliver" data-off="Pickup" class="switch-toggle status_chk" data-size="xs" data-offstyle="info" data-width="5rem" value="<?php echo $row['type'];?>">
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
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch Processed</label>
              <select name="from_branch_id" id="branch_name" class="form-control select2" required="">
                <option value="<?php if(isset($row)){ echo $row['from_branch_id']; }?>"></option>
                <?php 
                  $brancehs = "SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches";
                      $querys = mysqli_query($conn,$brancehs);
                      while ($rows = mysqli_fetch_array($querys)) {
                ?>
                  <option <?php if($from_branch_id = $rows['branch_name']){ echo 'selected'; } ?> value="<?php echo $rows['branch_name'] ?>"><?php echo $rows['branch_name'] ?></option>
                <?php 
                  }
               ?>
              </select>
            </div>
              <input type="hidden" name="from_branch_id" value="<?php echo $_SESSION['login_branch_id'] ?>">
                <div class="form-group">
                  <label for="" class="control-label">Name</label>
                  <input type="text" name="sender_name" id="" class="form-control" value="<?php echo $sender_name?>" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Address</label>
                  <input type="text" name="sender_address" id="" class="form-control" value="<?php echo $sender_address?>" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Contact #</label>
                <input type="text"  data-inputmask="'mask': '0399-99999999'" required=""  maxlength = "12" name="sender_contact" id="" class="form-control" value="<?php echo $sender_contact?>" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">CNIC Number</label>
                  <input type="text" name="sender_cnic" id="" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"   class="form-control" value="<?php echo $sender_cnic?>">
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Email</label>
                  <input type="text" name="sender_email" id="" class="form-control" value="<?php echo $sender_email?>">
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
                      <option value="<?php if(isset($row)){ echo $row['to_branch_id']; }?>"></option>
                      <?php 
                        $brancehs = "SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches";
                        $querys = mysqli_query($conn,$brancehs);
                        while ($branch = mysqli_fetch_array($querys)) {
                      ?>
                      <option <?php if($from_branch_id = $branch['branch_name']){ echo 'selected'; } ?> value="<?php echo $branch['branch_name'] ?>"><?php echo $branch['branch_name'] ?></option>
                      <?php
                        }
                        ?>
                    </select>
                  </div>
              <div class="form-group" id="tbi-fields" style="display: none;">
                <label for="" class="control-label">City</label>
                    <input type="text" name="city" id="city" class="form-control" value="<?php echo $city?>">
              </div>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control" value="<?php echo $recipient_name;?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <input type="text" name="recipient_address" id="" class="form-control" value="<?php echo $recipient_address?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact #</label>
                <input type="text"  data-inputmask="'mask': '0399-99999999'" required=""  maxlength = "12" name="recipient_contact" id="" class="form-control" value="<?php echo $recipient_contact?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">CNIC Number</label>
                <input type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X"   name="recipient_cnic" id="" class="form-control" value="<?php echo $recipient_cnic?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="text" name="recipient_email" id="" class="form-control" value="<?php echo $recipient_email;?>">
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
            <?php 
            $track = "SELECT * FROM `parcels` WHERE traking_number = $id";
              $fetch = mysqli_query($conn,$track);
              foreach ($fetch as $tracks) {
            ?>
            <tr>
              <td><input type="text" name='weight' class="form-control" value="<?php echo $tracks['weight'];?>" required></td>
              <td><input type="text" name='height' class="form-control" value="<?php echo $tracks['height'];?>"required></td>
              <td><input type="text" name='length' class="form-control" value="<?php echo $tracks['length'];?>" required></td>
              <td><input type="text" name='width' class="form-control" value="<?php echo $tracks['width'];  ?>" required></td>
              <td><input type="text" class="text-right number form-control" name='price' class="form-control" value="<?php echo $tracks['price']?>" required></td>
              <?php if(!isset($id)): ?>
              <td><button class="btn btn-sm " type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
            <?php
                          }
            ?>
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
                  <input type="text" name="service" id="" class="form-control" value="<?php echo $service?>">
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label">Pieces/quantity</label>
                    <input type="number" name="quantity" id="" class="form-control" value="<?php echo $quantity?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Content</label>
                <textarea type="text" name="content" cols="100" rows="5" id="" class="form-control"><?php echo $content?></textarea> 
              </div>
              </div>
                <div class="card-footer">
                  <div class="d-flex w-100 justify-content-end align-items-center">
                    <button class="btn btn-flat  save-btn mx-2" name="update_parcel">Save</button>
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
         $('#parcel-items [name="price"]').each(function(){
          var p = $(this).val();
              p =  p.replace(/,/g,'')
              p = p > 0 ? p : 0;
            total = parseFloat(p) + parseFloat(total)
         })
         if($('#tAmount').length > 0)
         $('#tAmount').text(parseFloat(total).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
  }
</script>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
  
                <script>
                  $(":input").inputmask();

                 </script>