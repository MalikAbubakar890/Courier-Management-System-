

<!DOCTYPE html>
<html lang="en">
  <?php include 'home-header.php'?>


    <style type="text/css">
        .toast {
            opacity: 1 !important;
            width: 515px;
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
                                <h2 class="page-title">CONTACT US</h2>
                                <ul class="page-list">
                                    <li><a href="home.html">Home</a></li>
                                    <li>Contact Us</li>
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
                        <form class="contact-form text-center" method="POST" action="contact.php">
                            <h3>Contact US</h3>
                            <input type="hidden" name="recipients" value="info@apexglobe.com">
                            <input type="hidden" name="good_url" value="/contact/contact-thankyou.html">   
                            <input type="hidden" name="bad_url" value="/contact/contact-formfailure.html">  
                        <?php
                            include 'db_connect.php';

                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;

                            require 'PHPMailer-master/src/Exception.php';
                            require 'PHPMailer-master/src/PHPMailer.php';
                            require 'PHPMailer-master/src/SMTP.php';

                            if (isset($_POST['submit'])) {
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $message = $_POST['message'];

                                $sql = "INSERT INTO contact_us (id, first_name, last_name, email, phone, message) VALUES (NULL, '$firstname', '$lastname', '$email', '$phone', '$message')";
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
                                $mail->setfrom($email, $firstname);
                                $mail->addaddress('info@apexlogistics.com');     // Add a recipient 
                                $mail->addreplyto($email);

                                $mail->isHTML(true);
                                $mail->Subject = 'Get Qoute' ;
                                $mailContent =
                                '<div class="container">
                                    <div class="card card-primary rounded-0">
                                        <div class="card-body">
                                            <table class="table" border="1" cellspacing="0" cellpadding="15px" style="background-color:#f5f5f5;">
                                                <thead>
                                                    <th class="text-center" colspan="2"><h2>Apex Logistics</h2></th>
                                                </thead>
                                                <tbody> 
                                                    <tr>
                                                        <td><strong>Name</strong></td>
                                                        <td>'. $firstname . " " . $lastname . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email<strong></td>
                                                        <td>' . $email .'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phone</strong></td>
                                                        <td>' . $phone .'</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Message</strong></td>
                                                        <td>' . $message .'</td>
                                                    </tr>   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>';
                                $mail->Body    = $mailContent;
                                $mail->send();
                                // header("Location: contact.php");
                            ?>
                            <div class="toast">
                                Contact From Submitted Successfully
                            </div>
                            <?php

                             }else{
                                echo "";
                             }
                             ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fa fa-user"></i> Font Awesome fontawesome.com --></label>
                                        <input type="text" name="firstname" placeholder="Your First name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><!-- <i class="fa fa-user"></i> Font Awesome fontawesome.com --></label>
                                        <input type="text" name="lastname" placeholder="Your Last name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg><!-- <i class="fa fa-envelope"></i> Font Awesome fontawesome.com --></label>
                                        <input type="text" name="email" placeholder="Your email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-inner">
                                        <label><svg class="svg-inline--fa fa-calculator fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calculator" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 0H48C22.4 0 0 22.4 0 48v416c0 25.6 22.4 48 48 48h352c25.6 0 48-22.4 48-48V48c0-25.6-22.4-48-48-48zM128 435.2c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm128 128c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8V268.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v166.4zm0-256c0 6.4-6.4 12.8-12.8 12.8H76.8c-6.4 0-12.8-6.4-12.8-12.8V76.8C64 70.4 70.4 64 76.8 64h294.4c6.4 0 12.8 6.4 12.8 12.8v102.4z"></path></svg><!-- <i class="fas fa-calculator"></i> Font Awesome fontawesome.com --></label>
                                        <input type="text" name="phone" placeholder=" Phone number" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-input-inner">
                                        <label><svg class="svg-inline--fa fa-pencil-alt fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg><!-- <i class="fas fa-pencil-alt"></i> Font Awesome fontawesome.com --></label>
                                        <textarea name="message" placeholder="Write massage"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-base" name="submit" href="#"> SEND MESSAGE
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
