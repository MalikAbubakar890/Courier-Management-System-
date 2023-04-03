<?php 
include 'db_connect.php';
if (isset($_POST['track_id'])) {

$trackid = $_POST['track_id'];


    $query = "SELECT * From parcels Where traking_number = '".$trackid."'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       echo '<div class="dilivery_number">
                  <p>Consignment No. :  '.$row["traking_number"].'</p>
               </div>
               <div class="col-md-12">
                  <div id="bar-progress">
                     <div class="step">
                        <span class="number-container">
                        <span class="number">1</span>
                        </span>
                        Shipment picked
                     </div>
                     <div class="seperator"></div>
                     <div class="step">
                        <span class="number-container">
                        <span class="number">2</span>
                        </span>
                        Dispatched
                     </div>
                     <div class="seperator"></div>
                     <div class="step">
                        <span class="number-container">
                        <span class="number">3</span>
                        </span>
                        Arrived
                     </div>
                     <div class="seperator"></div>
                     <div class="step">
                        <span class="number-container">
                        <span class="number">4</span>
                        </span>
                        Out for Delivery
                     </div>
                     <div class="seperator"></div>
                     <div class="step">
                        <span class="number-container">
                        <span class="number">5</span>
                        </span>
                        Pending
                     </div>
                     <div class="seperator"></div>
                     <div class="step step-active">
                        <span class="number-container">
                        <span class="number">6</span>
                        </span>
                        Delivered                                                                           
                     </div>
                  </div>
               </div>
               <div class="col-md-12" style="margin-top: 20px;">
                  <table class="table table-striped table-bordered">
                     <tbody>
                        <tr>
                           <th colspan="4" style="text-align: center;font-weight: 700;color:#fff;background: linear-gradient(to bottom, #364e8f, #063294);" class="we_font_size">
                             '.$row['status_field'].'
                           </th>
                        </tr>
                        <tr>
                           <td class="we_font_size"><b>
                              Signed for by :</b>
                           </td>
                           <td class="we_font_size">
                              &nbsp;( '.$row["recipient_name"].' )                                                   
                           </td>
                           <td class="we_font_size"><b>Dated:</b></td>
                           <td class="we_font_size"> '.$row["date_created"].'</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="col-md-12" style="margin-top: 20px;">
                  <table class="table table-striped table-bordered">
                     <tbody>
                        <tr>
                           <th colspan="4" style="text-align: left;font-weight: 700;color:#fff;background: linear-gradient(to bottom, #d6193a, #d6193a);" class="we_font_size">
                              Shipment Detail
                           </th>
                        </tr>
                        <tr>
                           <td class="we_font_size"><b>Origin :</b></td>
                           <td class="we_font_size"> '.$row["city"].'</td>
                           <td class="we_font_size"><b>Destination :</b></td>
                           <td class="we_font_size"><span id="gvTrackingCheck_ctl02_lblDestinationTrack"> '.$row["recipient_city"].'</span></td>
                        </tr>
                        <tr>
                           <td class="we_font_size"><b>Shipper :</b></td>
                           <td class="we_font_size">'.$row["sender_name"].'</td>
                           <td class="we_font_size"><b>Reciever :</b></td>
                           <td class="we_font_size"> '.$row["recipient_name"].'</td>
                        </tr>
                        <tr>
                           <td class="we_font_size"><b>Consignment No. :</b></td>
                           <td class="we_font_size"> '.$row["traking_number"].'</td>
                           <td class="we_font_size"><b>Parcel Status :</b></td>
                           <td class="we_font_size"> '.$row["status_field"].'</td>
                        </tr>
                        <tr>
                           <td class="we_font_size"><b>Pieces :</b></td>
                           <td class="we_font_size"> '.$row["quantity"].'</td>
                           <td class="we_font_size"><b>Weight : </b></td>
                           <td class="we_font_size"> '.$row["weight"].'</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="col-md-12" style="margin-top: 20px;">
                  <table class="table table-striped table-bordered">
                     <tbody>
                        <tr>
                           <th colspan="4" style="text-align: left;font-weight: 700;color:#fff;background: linear-gradient(to bottom, #364e8f, #063294);" class="we_font_size">
                              Shipment Information
                           </th>
                        </tr>
                        <tr>
                           <td class="we_font_size" style="width:100%;">
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-outfordelivery ">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">13 March, 2023<span>(17:59)</span></div>
                                    <div class="tracking-content">Delivered to <br>&nbsp;(  '.$row["recipient_name"].')</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">13 March, 2023<span>(09:50)</span></div>
                                    <div class="tracking-content">Out for Delivery in  '.$row["from_branch_id"].' - Facility Center</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">13 March, 2023<span>(02:52)</span></div>
                                    <div class="tracking-content">Arrived in  '.$row["from_branch_id"].' - Facility Center</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">12 March, 2023<span>(22:53)</span></div>
                                    <div class="tracking-content">Forwarded to  '.$row["from_branch_id"].'</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">12 March, 2023<span>(21:30)</span></div>
                                    <div class="tracking-content">Arrived in  '.$row['to_branch_id'].' - Facility Center</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">11 March, 2023<span>(17:17)</span></div>
                                    <div class="tracking-content">Forwarded to  '.$row["from_branch_id"].'</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">11 March, 2023<span>(15:02)</span></div>
                                    <div class="tracking-content">Arrived in  '.$row["to_branch_id"].' HUB - Facility Center</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">10 March, 2023<span>(20:14)</span></div>
                                    <div class="tracking-content">Dispatched to  '.$row['from_branch_id'].' at  '.$row["to_branch_id"].' - Facility Center</div>
                                 </div>
                              </div>
                              <div class="tracking-list">
                                 <div class="tracking-item">
                                    <div class="tracking-icon status-intransit">
                                       <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                       </svg>
                                       <!-- <i class="fas fa-shipping-fast"></i> -->
                                    </div>
                                    <div class="tracking-date">10 March, 2023<span>(20:14)</span></div>
                                    <div class="tracking-content">Arrived in  '.$row["to_branch_id"].' - Facility Center</div>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>';

}
               } else {
                ?>
                <div class='toast'>Record Not Found</div>
                   <?php
             }
             }
             else{
                echo "<div class='track_error'>Record Not Found</div>";
             }
?>
<style type="text/css">
  
.toast {
    width: 515px;
    height: 20px;
    height: auto;
    position: absolute;
    right: 345px;
    z-index: 1;
    margin-left: -55px;
    bottom: 183px;
    background-color: #35bc7a;
    color: #F0F0F0;
    font-family: Calibri;
    font-size: 20px;
    padding: 10px;
    text-align: center;
    border-radius: 7px;
    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
}
</style>