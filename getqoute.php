<!DOCTYPE html>
<html lang="en">
<?php include 'db_connect.php'; ?>
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
                    <h1>Get a Qoute</h1>
    
                </div>
            </div>
           
    <form class="default" method="POST" action="#">
        <div class="row">
            <div class="col medium-6">
                <fieldset>
                    <label for="Phone"> Origin</label>
                    <select class="form-control">
                        <option>Select Your Origin</option>
                        <?php 
                    $records = mysqli_query($conn ,'SELECT * from cities_pk') or die("Query fail: " . mysqli_error());

                                foreach ($records as $row) {   
                                ?>
                               <option><?php echo $row['name'];?></option>
                              <?php
                          }
                        ?>
                    </select>
                    <label for="Phone"> Destination</label>
                    <select class="form-control" name="origin" required>
                        <option>Select Your Origin</option>
                        <?php 
                    $records = mysqli_query($conn ,'SELECT * from cities_pk') or die("Query fail: " . mysqli_error());

                                foreach ($records as $row) {   
                                ?>
                               <option><?php echo $row['name'];?></option>
                              <?php
                          }
                        ?>
                    </select>
                    <label>Weight (KG)</label>
                    <input type="number" name="weight" placeholder="Enter Your Parcel Weight" class="form-control" required>
                    <label>Date</label>
                    <input type="date" name="date" placeholder="Enter Departure Date" class="form-control" required>
                     <button type="submit" name="submit" class="button">Submit</button>
                </fieldset>
            </div>
            <div class="col medium-6">
                <img src="images\where-we-are-en.jfif">
            </div>

            <div class="col">
                <hr>
            </div>
        </div>
    </form>

            <div class="row"> <strong> With a presence in 70 countries across six continents, 42 offices, 2,500+ dedicated employees, and consistent, dependable services, Apex continues to grow rapidly and deliver passion worldwide.</strong></div>





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
