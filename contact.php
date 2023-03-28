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
        $title = $_POST['title'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $privacypolicy = $_POST['privacypolicy'];

        $sql = "INSERT INTO contact_us (id, first_name, last_name, title, email, phone, message, privacypolicy) VALUES (NULL, '$firstname', '$lastname', '$title', '$email', '$phone', '$message', '$privacypolicy')";
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
                                <td><strong>Title</strong></td>
                                <td>' . $title .'</td>
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
        header("Location: contact.php");
    }
?>

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
                    <h1>Contact Us</h1>
    
                </div>
            </div>
           
        <form class="default" data-ajax="false" data-validate="true" id="Kontaktformular1" method="post" action="contact.php" enctype="multipart/form-data" novalidate="novalidate" data-zi-mapped-form="">
            <input type="hidden" name="recipients" value="info@apexglobe.com">
            <input type="hidden" name="good_url" value="/contact/contact-thankyou.html">   
            <input type="hidden" name="bad_url" value="/contact/contact-formfailure.html">  
        
            <div class="row">
                <div class="col medium-6">
                    <fieldset>
                        <label for="First-name">First name <small>(required)</small></label>
                        <input type="text" id="First-name" name="firstname" required="" placeholder="First Name" data-msg-required="Please enter your First name" aria-required="true">

                        <label for="Last-name">Last name <small>(required)</small></label>
                        <input type="text" id="Last-name" name="lastname" required="" placeholder="Last Name" data-msg-required="Please enter your Last name" aria-required="true">

                        <label for="Title">Title</label>
                        <input type="text" id="Title" name="title">

                        <label for="Email">Business Email <small>(required)</small></label>
                        <input type="email" id="Email" name="email" required="" placeholder="Business Email" data-msg-email="The email address is invalid" data-msg-required="Please enter a valid email address" data-rule-email="true" aria-required="true">

                        <label for="Phone"> Business Phone </label>
                        <input type="tel" id="Phone" name="phone" placeholder="Business Phone number">
                    </fieldset>
                </div>

                <div class="col medium-6">
                    <fieldset>
                        <label for="Message">How can we support your business goals? <small>(required)</small></label>
                        <textarea id="Message" name="message" rows="10" cols="10" required placeholder="Message" data-msg-required="Please leave a message" aria-required="true"></textarea>

                        <label for="privacy-policy">
                            I have read and agree to the <a href="../privacy-policy.html" target="_blank" title="Privacy Policy | Apex Logistics">privacy policy</a>.
                            <small>(required)</small>
                        </label>
                        <input type="checkbox" id="privacy-policy" name="privacypolicy" value="accept" data-msg-required="please agree to privacy-policy" required aria-required="true">


                        <button type="submit" name="submit" class="button">Submit</button>
                    </fieldset>
                </div>

                <div class="col">
                    <hr>
                </div>
            </div>
        </form>

            <div class="row"> <strong> With a presence in 70 countries across six continents, 42 offices, 2,500+ dedicated employees, and consistent, dependable services, Apex continues to grow rapidly and deliver passion worldwide.</strong></div>

               <div class="row"> <img src="images\where-we-are-en.jfif "></div>




            <div class="subPageServices">
                <div class="services">
                    <div class="row">
                        <div class="col">
                            <strong class="headline-services animate">Explore Our Services </strong>
                            <div class="teasers">
                                <div class="row">
                                    <div class="col small-6 medium-4 teaser animate">
                                        <a href="../what-we-do/transportation/air.html" class="teaser-content" title="Air Freight">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-plane" aria-hidden="true"></i>
                                                <span>Air <span class="d-block">Freight</span></span></p>
                                            <p>Reduce shipping times and costs with Apex group’s right-sized air freight solutions.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate bl br">
                                        <a href="../what-we-do/transportation/ocean.html" class="teaser-content" title="Ocean Freight">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-anchor" aria-hidden="true"></i>
                                                <span>Ocean <span class="d-block">Freight</span></span></p>
                                            <p>Accelerate shipping timeframes and maximize value while Apex manages your largest shipments.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate">
                                        <a href="../what-we-do/supply-chain/supply-chain-solutions.html" class="teaser-content" title="Global Supply Chain Management">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-cogs" aria-hidden="true"></i>
                                                <span>Global Supply Chain Management</span></p>
                                            <p>Unlock a competitive edge with objective insights and guidance from our experienced supply chain management consultants.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate">
                                        <a href="../what-we-do/warehousing-distribution/index.html" class="teaser-content" title="Warehousing and Distribution">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-sitemap" aria-hidden="true"></i>
                                                <span>Warehousing and Distribution</span></p>
                                            <p>Rest assured with Apex International managing products of every size with precision, security, and professional handling—every step of the way.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate bl br">
                                        <a href="../what-we-do/transportation/surface.html" class="teaser-content" title="Inland Trucking">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-truck" aria-hidden="true"></i>
                                                <span>Inland <span class="d-block">Trucking</span></span></p>
                                            <p>Tap into our vast trucking network for reliable inland transportation—anywhere.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate">
                                        <a href="../what-we-do/warehousing-distribution/e-commerce-solutions.html" class="teaser-content" title="e-Commerce Soultions ">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-desktop" aria-hidden="true"></i>
                                                <span>Cross-Border <span class="d-block">E-Commerce</span></span></p>
                                            <p>Meet compliance and consumer expectations with our end-to-end, global E-Commerce solutions.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-4 teaser animate">
                                        <a href="../what-we-do/customs/customs-brokerage.html" class="teaser-content" title="Customs Brokerage">
                                            <p class="teaserHeadline">
                                                <i class="circle fa-default fa-globe" aria-hidden="true"></i>
                                                <span>Customs <span class="d-block">Brokerage</span></span></p>
                                            <p>Eliminate unnecessary delays of your clearances with Apex’s trusted brokerage service.</p>
                                        </a>
                                    </div>
                                    <div class="col small-6 medium-8 teaser animate bl-l">
                                        <p class="teaserHeadline">
                                            Deliver a Powerful Customer Experience</p>
                                        <div class="teaser-content">
                                            <p>Maintaining customer loyalty and momentum in an on-demand, delivery culture starts with the subject matter experts. Learn how we can support your international freight shipments and business goals.</p>
                                            <a href="contact.php" title="Contact us" class="btn">Let’s Talk</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- //.services -->
            </div>
        </main>
       <?php include 'home-footer.php';?>
    </div>
  
    

</body>
</html>
