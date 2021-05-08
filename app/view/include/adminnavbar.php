 <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <?php if($_SESSION['role'] == 1):?>
            <a href="<?php echo URLROOT;?>" class="logo"><?php echo SITENAME;?><span class="lite"> Admin</span></a>
            <?php elseif($_SESSION['role'] == 2):?>
                <a href="<?php echo URLROOT;?>" class="logo">Manage your restaurant with <?php echo SITENAME;?></a>
            <?php elseif($_SESSION['role'] == 3):?>
                <a href="<?php echo URLROOT;?>" class="logo">order food with <?php echo SITENAME;?></a>
            <?php endif; ?>
            <!--logo end-->


            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                        <?php if($_SESSION['role'] == 1):?>
                            <span class="username"><?php echo $_SESSION['firstname'] .' '. $_SESSION['surname'];?></span>
                        <?php elseif($_SESSION['role'] == 2):?>
                            <span class="username"><?php echo $_SESSION['firstname'] .' '. $_SESSION['surname'];?></span>
                        <?php elseif($_SESSION['role'] == 3):?>
                            <span class="username"><?php echo $_SESSION['firstname'] .' '. $_SESSION['surname'];?></span>
                        <?php endif;?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT;?>/users/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->