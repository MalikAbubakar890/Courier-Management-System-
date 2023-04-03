<!DOCTYPE html>
<html lang="en">
   <?php include 'home-header.php'?>
   <body class=" index browserunknown win  nojs lang-en">
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQ24PZJ"
         height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <input type="checkbox" id="navi-toggled">
      <?php include 'headtwo.php';?>
      <style type="text/css">
         @media (min-width: 50em){
         .slider-container:before {
            background: transparent;
            }
         }
         @media (min-width: 75em){
            .slider-container #claim {
                padding-top: 3.75rem;
                width: 32.1875rem;
                max-width: 100%;
                margin: auto;
            }
            .slider-container {
                height: 18.0625rem;
            }
         }
         .slider-container .slider{
            opacity: 0.5;
         }
         .headline-s{
            color: #063294;
         }
      </style>
      <main class="content clearfix">
         <div class="slider-container">
                <div class="row">
                    <div class="col">
                        <div id="claim">
                            <blockquote>
                                <div class="col-md-12">
                                    <p class="headline-s">
                                       QUICK TRACKING
                                    </p>
                                    <form method="POST" id="track_form" class="default">
                                       <fieldset>
                                          <input type="text" id="track_no" name="track_id" placeholder="Track Parcel" class="form-control" required>
                                          <span class="throw_error"></span>
                                          <span id="success"></span>
                                          <button class="submit" type="submit" name="submit" class="button">Track Shipments</button>
                                       </fieldset>
                                    </form>
                                 </div>
                            </blockquote>
                        </div><!-- //.claim -->
                    </div>
                </div>
                <div class="slider">
                    <div class="slide" id="first-slide"></div><!-- //.slide -->
                    <div class="slide" id="second-slide"></div><!-- //.slide -->
                    <div class="slide" id="third-slide"></div><!-- //.slide -->
                    <div class="slide" id="fourth-slide"></div><!-- //.slide -->
                </div> <!-- //.slider -->
            </div> <!-- //.slider-container -->
         <div class="row">
            <!-- <div class="col">
               <h1>Track Your Shipments</h1>
            </div> -->
         </div>
         <div class="row hr">
            <div class="col-md-12 tracking_number" id="track_data" >
               
            </div>
         </div>
      </main>
      <?php include 'home-footer.php';?>
      </div>
      <script type="text/javascript" src="js/track.js"></script>
   </body>
</html>