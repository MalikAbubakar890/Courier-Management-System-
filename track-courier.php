

<!DOCTYPE html>
<html lang="en">
  <?php include 'home-header.php'?>



    <style type="text/css">
        .toast {
            opacity: 1 !important;
            width: 449px;
            height: 20px;
            height: auto;
            position: absolute;
            right: 408px;
            z-index: 1;
            margin-left: 1px;
            bottom: -98px;
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
        .single-input-inner input {
            width: 100%;
            height: 60px;
            border: 0;
            border-radius: 0px;
            padding: 0 40px;
            font-size: 14px;
            background: rgb(255 255 255);
            color: var(--paragraph-color);
        }
        .breadcrumb-area {
          padding: 156px 0 0;
        }
    </style>

  <body class=" index browserunknown win  nojs lang-en">
  <?php include 'headtwo.php'?>
      <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assetstwo/img/banner/breadcrumb.png')">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <div class="breadcrumb-inner">
                            <div class="section-title mb-0">
                                <h2 class="page-title mb-5">Track Your Shipment</h2>
                                <form method="POST" id="track_form" class="default">
                                  <div class="single-input-inner">
                                      <label><i class="fa fa-search"></i> </label>
                                      <input type="text" id="track_no" name="track_id" placeholder="Track Parcel" required>
                                      <button class="btn btn-base" name="submit"  > Track Shipment
                                      </button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact-area mt-3 mb-120">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-12 tracking_number" id="track_data">
                         
                    </div>
                </div>
            </div>
        </div>
       <?php include 'home-footer.php';?>
       <script type="text/javascript" src="js/track.js"></script>
    </div>
  
    

</body>
</html>
