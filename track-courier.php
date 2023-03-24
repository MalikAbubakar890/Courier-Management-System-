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
      <main class="content clearfix">
         <div class="row">
            <div class="col">
               <h1>Track Your Parcel</h1>
            </div>
         </div>
         <div class="row hr">
            <div class="col-md-12">
               <p class="headline-s">
                  QUICK TRACKING
               </p>
               <form method="POST" id="track_form" class="default">
                  <fieldset>
                     <label>Track Parcel</label>
                     <input type="text" id="track_no" name="track_id" placeholder="Track Parcel" class="form-control" required>
                     <span class="throw_error"></span>
                     <span id="success"></span>
                     <button class="submit" type="submit" name="submit" class="button">Track Parcel</button>
                  </fieldset>
               </form>
            </div>
            <div class="col-md-12 tracking_number" id="track_data" >
               
            </div>
         </div>
      </main>
      <?php include 'home-footer.php';?>
      </div>
      <script type="text/javascript" src="js/track.js"></script>
   </body>
</html>