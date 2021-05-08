<?php require APPROOT .'/view/include/adminheader'. '.php';?>

	<!--main content start-->
	<?php if($_SESSION['role'] == 1):?>
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
            	<a href="<?php echo URLROOT;?>/posts/allrestaurants">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-cutlery"></i>
						<div class="count"><?php echo $data['count'];?></div>
						<div class="title">Restaurants</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>
				
				<a href="<?php echo URLROOT;?>/users/allusers">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-user"></i>
						<div class="count"><?php echo $data['usercount'];?></div>
						<div class="title">Users</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>
				
				<a href="<?php echo URLROOT;?>/posts/processed">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count"><?php echo $data['processedcount'];?></div>
						<div class="title">orders</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>
				
			</div><!--/.row-->
		 
		  <!-- Today status end -->

		  <?php elseif($_SESSION['role'] == 2):?>

		  <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
            <a href="<?php echo URLROOT;?>/users/profile/<?php echo $_SESSION['user_id'];?>">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-user"></i>
						<div class="count">My</div>
						<div class="title">Profile</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>	

			<a href="<?php echo URLROOT;?>/posts/category/<?php echo $_SESSION['user_id'];?>">	
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">All</div>
						<div class="title">category</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>	
				
			<a href="<?php echo URLROOT;?>/posts/addmenu">	
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-list"></i>
						<?php if(($data['getuserbyid']->id) == $_SESSION['user_id']):?>
						<div class="count"><?php echo $data['restmenucount'];?></div>
						<div class="title">menu</div>
						<?php endif;?>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>

			<a href="<?php echo URLROOT;?>/posts/restorder/<?php echo $_SESSION['user_id'];?>">	
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-shopping-cart"></i>
						<?php if(($data['getuserbyid']->id) == $_SESSION['user_id']):?>
						<div class="count"><?php echo $data['restprocessedcount'];?></div>
						<div class="title">order</div>
						<?php endif;?>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>
				
			</div><!--/.row-->
		


          <?php elseif($_SESSION['role'] == 3):?>

		  <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-home"></i> ALL Restaurants</h3>
					<ol class="breadcrumb">
						<li><i class=""></i>Click on a restaurant to order food</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">

            <?php foreach($data['allrestaurants'] as $getrestaurants):?>
            	<a href="<?php echo URLROOT;?>/posts/eachrestaurant/<?php echo $getrestaurants->id;?>">
            	<div class="inactive"><?php flash('inactive');?></div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<img src="<?php echo URLROOT;?>/image/title.png">
						<div class="title" style="font-weight: bold; font-size: 15px; padding-top: 7px; text-align: center; color:#fed140;"><?php echo $getrestaurants->rest_name?></div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>
			<?php endforeach;?>
				
			</div><!--/.row-->
		
       <?php endif;?>

       <script type="text/javascript">
			$(".inactive").delay(2000).fadeOut(300);
		</script>
			
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>