

<!DOCTYPE html>
<html lang="en">
  <?php include 'home-header.php'?>


    <style type="text/css">
        .toast {
            opacity: 1 !important;
            width: 100%;
            height: 20px;
            height: auto;
            /*position: absolute;*/
            right: 345px;
            z-index: 1;
            /*margin-left: -55px;*/
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

  <body class=" index browserunknown win  nojs lang-en">
  <?php include 'headtwo.php'?>
      <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assetstwo/img/banner/breadcrumb.png')">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-inner">
                            <div class="section-title mb-0">
                                <h2 class="page-title">Get Qoute</h2>
                                <ul class="page-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Get Qoute</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact-area mg-top-120 mb-120">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-7">
                        <form class="contact-form text-center" method="POST" action="getqoute.php">
                            <h3>Get a Qoute</h3>
                            <?php
                                include 'db_connect.php';
                                use PHPMailer\PHPMailer\PHPMailer;
                                use PHPMailer\PHPMailer\Exception;
                            
                                require 'PHPMailer-master/src/Exception.php';
                                require 'PHPMailer-master/src/PHPMailer.php';
                                require 'PHPMailer-master/src/SMTP.php';

                                if (isset($_POST['submit'])) {
                                    $origin = $_POST['origin'];
                                    $destination = $_POST['destination'];
                                    $weight = $_POST['weight'];
                                    $date = $_POST['date'];

                                    $sql = "INSERT INTO qoutes (id, origin, destination, weight, date) VALUES (NULL, '$origin', '$destination', '$weight', '$date')";
                                    $result = mysqli_query($conn, $sql);

                                    $mail = new PHPMailer;
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'saadkhawaja045@gmail.com';
                                    $mail->Password = 'nhyuojivefnuikoy'; 
                                    $mail->SMTPSecure = 'ssl';
                                    $mail->Port = 465;
                                    //Recipients
                                    $mail->setfrom('saadkhawaja045@gmail.com', 'Saad');
                                    $mail->addaddress('abubakar19417malik@gmail.com');     // Add a recipient 
                                    $mail->addreplyto('saadkhawaja045@gmail.com');

                                    $mail->isHTML(true);
                                    $mail->Subject = 'Get Qoute' ;
                                    $message = '<h4 style="display:inline-block;">Origin : </h4> '. $origin .'<br>
                                    <h4 style="display:inline-block;">destination : </h4>   ' . $destination .'   <br> 
                                    <h4 style="display:inline-block;">weight : </h4>   ' . $weight .'<br>  
                                    <h4 style="display:inline-block;">date : </h4>   ' . $date .' <br>';
                                    $mail->Body    = $message;
                                    $mail->send();
                                    // header("Location: getqoute.php"); 
                                        ?>
                                        <div class="toast mb-3">
                                            From Submitted Successfully
                                        </div>
                                        <?php

                                         }else{
                                            echo "";
                                         }
                                         ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><i class="fa fa-location-arrow"></i> </label>
                                        <input type="text" name="origin" placeholder="Your origin" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><i class="fa fa-location-arrow"></i></label>
                                        <input type="text" name="destination" placeholder="Your Destination" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><i class="fa fa-weight"></i> </label>
                                        <input type="text" name="weight" placeholder="Weight (KG)" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><i class="fas fa-calendar-alt"></i></label>
                                        <input type="date" name="date" placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-base" name="submit" href="#"> Get Qoute
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-information-wrap">
                            <h3>CONTACT INFORMATION</h3>
                            <div class="single-contact-info-wrap">
                                <h6>Contact Number:</h6>
                                <div class="media">
                                    <div class="icon">
                                        <svg class="svg-inline--fa fa-phone-alt fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg><!-- <i class="fa fa-phone-alt"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <div class="media-body">
                                        <p>+92 3032740775 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-contact-info-wrap">
                                <h6>Mail Address:</h6>
                                <div class="media">
                                    <div class="icon" style="background: #080C24;">
                                        <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <i class="fa fa-envelope"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <div class="media-body">
                                        <p>info@apexlogistics.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-contact-info-wrap mb-0">
                                <h6>Office Location:</h6>
                                <div class="media">
                                    <div class="icon" style="background: #565969;">
                                        <svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fa fa-map-marker-alt"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <div class="media-body">
                                        <p>shop, 5, Negin City Center, Kirani Rd, Hazara Town, Quetta, Balochistan 87300</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include 'home-footer.php';?>
    </div>
  
    

</body>
</html>
