<style>
table, td{
    border: 1px solid black;
    border-spacing: 0;

}
.main{
    display: flex;
  align-items: stretch;

}
.box-1{
    width: 30%;
}
.box-2{
    width: 50%;
    text-align: center;
}
.box-3{
    width: 20%;
    text-align: center;
}
.box-1 img{
    height: 200px;
    width: 400px;
    margin-left:0px ;
}
.box-2 img{
    height: 130px;
    width: 200px; 
}
.extra{
    height: 25px;
}
.extra-1{
  height: 118px;  
}
.extra-2{
  height: 70px;  
}
.color{
    background-color: rgb(228, 228, 228);
}
.diff{
    padding-top: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid black;
}

</style>
    <?php include 'db_connect.php';
?>
   <div class="main">
    <?php   
        $id = $_GET['traking_number'];
        $parcels = "SELECT * FROM `parcels` WHERE traking_number = $id";
          $query = mysqli_query($conn,$parcels);
          while ($row = mysqli_fetch_array($query)) {
?>
 
    <table class="box-1">
        <tr>
            <td ><img src="./PIC/logo.png" alt=""></td>
        </tr>
        <tr>
            <td class="color">From (Sender)</td>
        </tr>
        <tr>
            <td><?php echo $row['sender_name']?> <br>
                <?php echo $row['sender_address']?> <br>
                <?php echo $row['sender_contact']?>
            </td>
        </tr>
        <tr>
            <td class="color">To(Recipent)</td>
        </tr>
        <tr>
            <td><?php echo $row['recipient_name']?> <br>
                <?php echo $row['recipient_address']?> <br>
                <?php echo $row['recipient_contact']?>
            </td>
        </tr>
        <tr>
            <td class="color">Sender's Authentication</td>

        </tr>
        <tr>
            <td>
                <!-- Lorem ipsum dolor sit amet  consectetur adipisicing elit. Nostrum sunt asperiores adipisci? Eveniet praesentium quam ad unde? Modi, nam quisquam! <br> -->
             <b> SIGNATURE </b></td>
            
        </tr>
    </table>
   
   
    <table class="box-2">
        <tr>
            <td colspan=4 class="color">consignment Number</td>
        </tr>
        <tr>
            <td colspan=4><img src="./PIC/barcode-5c81647c46e0fb00011365f0.jpg" alt=""></td>
        </tr>
        <tr>
            <td class="color">Pieces</td>
            <td><?php echo $row['quantity']?></td>
            <td class="color">Weight</td>
            <td><?php echo $row['weight']?></td>
        </tr>
        <tr>
            <td class="color">Service Type</td>
            <td><?php echo $row['service']?></td>
            <td class="color">Made OF Payment</td>
            <td><?php echo $row['price']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Content</td>
            <td colspan="2" class="color">Special Industries</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['content']?></td>
            <td colspan="2"><?php echo $row['recipient_city']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Customer Cnic</td>
            <td colspan="2" class="color">Recipient Cnic</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['sender_cnic']?></td>
            <td colspan="2"><?php echo $row['recipient_cnic']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Customer Value</td>
            <td colspan="2" class="color">Dimension of shipment</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['price']?></td>
            <td colspan="2">0x0x0</td>
        </tr>
        <tr>
            <td colspan="4" class="color">Booking Details</td>
        </tr>
        <tr>
            <td>From Branch</td>
            <td colspan="3"><?php echo $row['from_branch_id']?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?php echo $row['date_created']?></td>
           <!--  <td>Time</td>
            <td><?php echo $row['price']?></td> -->
        </tr>
        <tr>
            <td colspan="4" class="extra"></td>
        </tr>
    </table>
   <table class="box-3">
       <tr>
        <td colspan="2" class="color">Easy Shipping</td>

       </tr>
       <tr>
        <td colspan="2" class="color">Destination</td>
       </tr>
       <tr>
        <td colspan="2" class="extra-1"><?php echo $row['to_branch_id']?></td>
       </tr>
       <tr>
        <td colspan="2">ON SHIPPER RISK</td>
       </tr>
       <!-- <tr>
        <td colspan="2" class="extra
        "></td>
       </tr> -->
      
       <tr>
        <td class="color">Charges</td>
        <td class="color">PAK RUPEES</td>
       </tr>
       <tr>
        <td class="extra-2">Services</td>
        <td class="extra-2"><?php echo $row['price']?></td>
       </tr>
       <tr>
        <td>Width</td>
        <td><?php echo $row['width']?></td>
       </tr>
       <tr>
        <td>Height</td>
        <td><?php echo $row['height']?></td>
       </tr>
       <tr>
        <td>Lenght</td>
        <td><?php echo $row['length']?></td>
       </tr>
       <tr>
        <td>Weight</td>
        <td><?php echo $row['weight']?></td>
       </tr>
       <tr>
        <td class="extra-2">TOTAL</td>
        <td class="extra-2"><?php echo $row['price']?></td>
       </tr>
       <tr>
        <td colspan="2" class="color">Shipper Copy</td>
       </tr>
   </table>

   </div>
     <div class="diff"><hr></div>

<?php }?>

<div class="main">
    <?php   
        $id = $_GET['traking_number'];
        $parcels = "SELECT * FROM `parcels` WHERE traking_number = $id";
          $query = mysqli_query($conn,$parcels);
          while ($row = mysqli_fetch_array($query)) {
?>
 
    <table class="box-1">
        <tr>
            <td ><img src="./PIC/logo.png" alt=""></td>
        </tr>
        <tr>
            <td class="color">From (Sender)</td>
        </tr>
        <tr>
            <td><?php echo $row['sender_name']?> <br>
                <?php echo $row['sender_address']?> <br>
                <?php echo $row['sender_contact']?>
            </td>
        </tr>
        <tr>
            <td class="color">To(Recipent)</td>
        </tr>
        <tr>
            <td><?php echo $row['recipient_name']?> <br>
                <?php echo $row['recipient_address']?> <br>
                <?php echo $row['recipient_contact']?>
            </td>
        </tr>
        <tr>
            <td class="color">Sender's Authentication</td>

        </tr>
        <tr>
            <td>
                <!-- Lorem ipsum dolor sit amet  consectetur adipisicing elit. Nostrum sunt asperiores adipisci? Eveniet praesentium quam ad unde? Modi, nam quisquam! <br> -->
             <b> SIGNATURE </b></td>
            
        </tr>
    </table>
   
   
    <table class="box-2">
        <tr>
            <td colspan=4 class="color">consignment Number</td>
        </tr>
        <tr>
            <td colspan=4><img src="./PIC/barcode-5c81647c46e0fb00011365f0.jpg" alt=""></td>
        </tr>
        <tr>
            <td class="color">Pieces</td>
            <td><?php echo $row['quantity']?></td>
            <td class="color">Weight</td>
            <td><?php echo $row['weight']?></td>
        </tr>
        <tr>
            <td class="color">Service Type</td>
            <td><?php echo $row['service']?></td>
            <td class="color">Made OF Payment</td>
            <td><?php echo $row['price']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Content</td>
            <td colspan="2" class="color">Special Industries</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['content']?></td>
            <td colspan="2"><?php echo $row['recipient_city']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Customer Cnic</td>
            <td colspan="2" class="color">Recipient Cnic</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['sender_cnic']?></td>
            <td colspan="2"><?php echo $row['recipient_cnic']?></td>
        </tr>
        <tr>
            <td colspan="2" class="color">Customer Value</td>
            <td colspan="2" class="color">Dimension of shipment</td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $row['price']?></td>
            <td colspan="2">0x0x0</td>
        </tr>
        <tr>
            <td colspan="4" class="color">Booking Details</td>
        </tr>
        <tr>
            <td>From Branch</td>
            <td colspan="3"><?php echo $row['from_branch_id']?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?php echo $row['date_created']?></td>
           <!--  <td>Time</td>
            <td><?php echo $row['price']?></td> -->
        </tr>
        <tr>
            <td colspan="4" class="extra"></td>
        </tr>
    </table>
   <table class="box-3">
       <tr>
        <td colspan="2" class="color">Easy Shipping</td>

       </tr>
       <tr>
        <td colspan="2" class="color">Destination</td>
       </tr>
       <tr>
        <td colspan="2" class="extra-1"><?php echo $row['to_branch_id']?></td>
       </tr>
       <tr>
        <td colspan="2">ON SHIPPER RISK</td>
       </tr>
       <!-- <tr>
        <td colspan="2" class="extra
        "></td>
       </tr> -->
      
       <tr>
        <td class="color">Charges</td>
        <td class="color">PAK RUPEES</td>
       </tr>
       <tr>
        <td class="extra-2">Services</td>
        <td class="extra-2"><?php echo $row['price']?></td>
       </tr>
       <tr>
        <td>Width</td>
        <td><?php echo $row['width']?></td>
       </tr>
       <tr>
        <td>Height</td>
        <td><?php echo $row['height']?></td>
       </tr>
       <tr>
        <td>Lenght</td>
        <td><?php echo $row['length']?></td>
       </tr>
       <tr>
        <td>Weight</td>
        <td><?php echo $row['weight']?></td>
       </tr>
       <tr>
        <td class="extra-2">TOTAL</td>
        <td class="extra-2"><?php echo $row['price']?></td>
       </tr>
       <tr>
        <td colspan="2" class="color">Company Copy</td>
       </tr>
   </table>

   </div>

<?php }?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
function printDiv() 
{

window.print();

}


$( document ).ready(function() {
    printDiv() 

});
</script>








