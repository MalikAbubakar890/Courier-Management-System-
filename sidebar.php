  <style type="text/css">
    [class*=sidebar-dark] .brand-link{
      border: none;
    }
    [class*=sidebar-dark-] .sidebar a{
      color: white;
    }
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link{
      color: white;
    }
  </style>
  <aside class="main-sidebar sidebar-dark-warning elevation-4" style="background-color: #22aae2">
    <div class="dropdown" style="background-color: #22aae2">
   	<a href="./" class="brand-link" style="background-color: #119ed8">
        <?php if($_SESSION['login_type'] == 1): ?>
          <img src="images/logo-light.png">
        <?php else: ?>
        <h3 class="text-center p-0 m-0"><b>STAFF</b></h3>
        <?php endif; ?>

    </a>
      
    </div>
    <div  class="sidebar pb-4 mb-4" style="background-color: #22aae2">
      <nav class="mt-2">
        <ul style=" margin-top: 50px; "  class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="dashboard.php" class="nav-link nav-home">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>     
          <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_branch">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Branch
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard.php?page=new_branch" class="nav-link nav-new_branch tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard.php?page=branch_list" class="nav-link nav-branch_list tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_staff">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Branch Staff
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard.php?page=new_staff" class="nav-link nav-new_staff tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard.php?page=staff_list" class="nav-link nav-staff_list tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link nav-edit_parcel">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Parcels
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard.php?page=new_parcel" class="nav-link nav-new_parcel tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./dashboard.php?page=parcel_list" class="nav-link nav-parcel_list nav-sall tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p>List All</p>
                </a>
              </li>
              <?php 
              $status_arr = array("Item Accepted<br/>by Courier","Collected","Shipped","In-Transit","Arrived At<br/>Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull<br/>Delivery Attempt");
              foreach($status_arr as $k =>$v):
              ?>
              <li class="nav-item">
                <a href="./dashboard.php?page=parcel_list&s=<?php echo $k ?>" class="nav-link nav-parcel_list_<?php echo $k ?> tree-item">
                  <i class="fa fa-angle-right nav-icon"></i>
                  <p><?php echo $v ?></p>
                </a>
              </li>
            <?php endforeach; ?>
            </ul>
          </li>
           <li class="nav-item dropdown">
            <a href="./dashboard.php?page=track" class="nav-link nav-track">
              <i class="nav-icon fa fa-search"></i>
              <p>
                Track Parcel
              </p>
            </a>
          </li>  
           <li class="nav-item dropdown">
            <a href="./dashboard.php?page=reports" class="nav-link nav-reports">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Reports
              </p>
            </a>
          </li>   
           <!-- <li class="nav-item dropdown">
            <a href="./dashboard.php?page=payment-detail" class="nav-link nav-reports">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Payments
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>