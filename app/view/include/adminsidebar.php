      <!--sidebar start-->
      <?php if($_SESSION['role'] == 1):?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo URLROOT;?>/users/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?php echo URLROOT;?>/posts/allrestaurants">
                          <i class="icon_genius"></i>
                          <span>Restaurants</span>
                      </a>
                  </li>
				          <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/users/allusers" class="">
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                  </li>       
                  <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/posts/processed" class="">
                          <i class="icon_desktop"></i>
                          <span>Processed order</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="<?php echo URLROOT;?>/users/logout">
                          <i class="icon_key_alt"></i>
                          <span>Log Out</span>
                      </a>                        
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
    <?php elseif($_SESSION['role'] == 2):?>
            <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo URLROOT;?>/users/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/users/profile/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_profile"></i>
                          <span>Restaurant profile</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/posts/category/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_document_alt"></i>
                          <span>Category</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/posts/addmenu" class="">
                          <i class="icon_document_alt"></i>
                          <span>Menu</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/posts/restorder/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_document_alt"></i>
                          <span>Order</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="<?php echo URLROOT;?>/users/logout">
                          <i class="icon_key_alt"></i>
                          <span>Log Out</span>
                      </a>                        
                  </li>       

                  
<!--                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li> -->
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

    <?php elseif($_SESSION['role'] == 3):?>
            <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo URLROOT;?>/users/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/users/profile/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_profile"></i>
                          <span>My profile</span>
                      </a>
                  </li>     
                  <li class="sub-menu">
                      <a href="<?php URLROOT;?>/posts/completed_order/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_document_alt"></i>
                          <span>Order History</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="<?php echo URLROOT;?>/users/logout">
                          <i class="icon_key_alt"></i>
                          <span>Log Out</span>
                      </a>                        
                  </li>
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
    <?php endif;?>