<style type="text/css">
    .table {
            margin-top: 0px;
        }

        .tbl-row td {
           
            width: 50vw;
        }

        .heading {
            background-color: antiquewhite;
        }

        .qty-table {
            margin: 10px 0px;
        }

        .qty-tbl-row {
            background-color: antiquewhite;
            height: 10px;
        }

        .qty-tbl-row .qnty-td {
            width: 25vw;
           
        }

        .qty-tbl-row .dscrpt-td {
            width: 50vw;
           
        }

        .qty-tbl-row .pcs-td {
            width: 25vw;
           
        }
 
        section{
          font-size: 10px;
        }
    
        .txt-center {
            text-align: center;
        }

       

        .ordr-dtl-tbl-row td {
            width: 20vw;
            
        }

        .ordr-tbl-data {
            height: 20px;
        }

   .ordr-dtl-tbl-row {
           
            background-color: antiquewhite;
        }

        .tbls-wrap {
            padding: 20px 30px;
            border: 1px solid black;
        }

        .tbl-row img {
            height: 50px;
                    width: 70px;
                    margin-left: 45%;
            /* text-align: center; */
        }

        h3 {
            margin: 0;
    text-align: center;
        }

        @media screen and (max-width: 570px) {
            .tbls-wrap {
                padding: 0px;
                padding-bottom: 15px;
                border: none;
            }

            .tbl-row img {
                margin-left: 0%;
            }

            h3 {
                margin-left: 3%;
                margin-bottom: 10px;
            }
        }

        @media screen and (min-width: 571px) and (max-width:750px) {
            h3 {
                margin-left: 3%;
                margin-bottom: 10px;
            }

            .tbl-row img {
                margin-left: 10%;
            }
        }

        @media screen and (min-width: 751px) and (max-width:900px) {
            h3 {
                margin-left: 3%;
                margin-bottom: 10px;
            }

            .tbl-row img {
                margin-left: 17%;
            }
        }

        @media screen and (min-width: 901px) and (max-width:1200px) {
            h3 {
                margin-left: 40%;
                margin-bottom: 10px;
            }

            .tbl-row img {
                margin-left: 17%;
            }
        }
</style>
    <?php include 'db_connect.php';
?>
<div class="container-fluid p-5">
    <div id="calendar">
<?php   
        $id = $_GET['traking_number'];
        $parcels = "SELECT * FROM `parcels` WHERE traking_number = $id";
          $query = mysqli_query($conn,$parcels);
          while ($row = mysqli_fetch_array($query)) {
?>
    
    <caption>
        <h3>Company Copy:</h3>
    </caption>

    <section class="table-section">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <tr class="tbl-row">
                <td rowspan="2">
                    <img src="images/logo-light.png" alt="">
                </td>
                <td>
                    <p>Tracking Number : <span class="ml-3"><?php echo $row['traking_number']?></span></p>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <p>Date :  <span class="ml-3"><?php echo $row['date_created']?></span></p>
                   
                </td>
            </tr>
            <tr class="tbl-row heading">
                <td style="border-right: none;">
                    <label><strong>From (Shipper)</strong></label>
                </td>
                <td style="border-left: none;">
                    <label><strong>To (Consignee)</strong></label>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_name']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_name']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['from_branch_id']?></b>
                </td>
                <td>
                    <b><?php echo $row['to_branch_id']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_address']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_address']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_cnic']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_cnic']?></b>
                </td>
            </tr>

        </table>
    </section>
    <br>
    <section class="table-section">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <tr class="tbl-row">
                <td>
                    <b>Description</b>
                </td>
                <td>
                    <b>Price</b>
                </td>
            </tr>


            <?php
                 $sql = "SELECT * From `parcels` WHERE traking_number = $id";
                  $query = mysqli_query($conn,$parcels);
                  foreach ($query as $rows) {
                    ?>

           <tr class="tbl-row">
                <td>
                    <b>1 Parcel With Weight is [<?php  if (!empty($rows['weight'])) {
                        echo   $rows['weight'];
                    }else{
                        echo "";}?>]
                             
                         </b>
                </td>
                <td>
                    <b>Rs <?php echo $rows['price']?></b>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>
    </section>

    <section class="ordr-dtl-tbl"  style="margin-left:60% ;">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <div class="box">
                <tr class="ordr-dtl-tbl-row">
                  
                    <td class="txt-center">
                        <label><strong>Total Amount</strong></label>
                    </td>
                    <td class="txt-center" >
                        <label><strong>Rs <?php echo $row['price']?></strong></label>
                    </td>
                </tr>
            </div>
        </table>
    </section>
    <br>
    <caption>
        <h3>Customer Copy:</h3>
    </caption>
     <section class="table-section">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <tr class="tbl-row">
                <td rowspan="2">
                    <img src="images/logo-light.png" alt="">
                </td>
                <td>
                    <p>Tracking Number : <span class="ml-3"><?php echo $row['traking_number']?></span></p>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <p>Date :  <span class="ml-3"><?php echo $row['date_created']?></span></p>
                   
                </td>
            </tr>
            <tr class="tbl-row heading">
                <td style="border-right: none;">
                    <label><strong>From (Shipper)</strong></label>
                </td>
                <td style="border-left: none;">
                    <label><strong>To (Consignee)</strong></label>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_name']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_name']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['from_branch_id']?></b>
                </td>
                <td>
                    <b><?php echo $row['to_branch_id']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_address']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_address']?></b>
                </td>
            </tr>
            <tr class="tbl-row">
                <td>
                    <b><?php echo $row['sender_cnic']?></b>
                </td>
                <td>
                    <b><?php echo $row['recipient_cnic']?></b>
                </td>
            </tr>

        </table>
    </section>
    <br>
    <section class="table-section">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <tr class="tbl-row">
                <td>
                    <b>Description</b>
                </td>
                <td>
                    <b>Price</b>
                </td>
            </tr>

  <?php
                 $sql = "SELECT * From `parcels` WHERE traking_number = $id";
                  $query = mysqli_query($conn,$parcels);
                  foreach ($query as $rows) {
                    ?>


            <tr class="tbl-row">
                <td>
                    <b>1 Parcel With Weight is [<?php  if (!empty($rows['weight'])) {
                        echo   $rows['weight'];
                    }else{
                        echo "";}?>]
                         </b>
                </td>
                <td>
                    <b>Rs <?php echo $rows['price']?></b>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>
    </section>

    <section class="ordr-dtl-tbl"  style="margin-left:60% ;">
        <table class="table" border="1" cellspacing="0" cellpadding="10px">
            <div class="box">
                <tr class="ordr-dtl-tbl-row">
                  
                    <td class="txt-center">
                        <label><strong>Total Amount</strong></label>
                    </td>
                    <td class="txt-center" >
                        <label><strong>Rs <?php echo $row['price']?></strong></label>
                    </td>
                </tr>
            </div>
        </table>
    </section>

    </div>

        </div>
    </div>

        
</div>
<?php 
}
?>
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