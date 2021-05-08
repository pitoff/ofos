<style type="text/css">
.personal-info{
    background-color: #394a59;
    height: 30px;
    border-radius: 18px;
    text-align: center;
    text-transform: uppercase;
    box-shadow: 2px 2px;
    color: #fff;
    padding-top: 4px;
    margin-top: 5px;
    font-weight: bold;
}
.family-info{
	color: #394a59;
	font-weight: bold;
	text-align: center;
	text-transform: uppercase;
	font-size: 25px;
}
.details{
	border:none !important;

	margin-top: 5px;
}

.detailstyle{
	font-weight: bold;
}
</style>
<?php require APPROOT .'/view/include/adminheader.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->
     <?php if($_SESSION['role'] == 1):?>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $data['restprofile']->rest_name;?></h3>
			</div>
		</div>

		<div class="row" style="margin-bottom: 4px;">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="">Profile</a></li>
					<li><a href="<?php echo URLROOT;?>/posts/viewmenu/<?php echo $data['restprofile']->id;?>">Restaurant menu</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
			  	<div class="col-lg-6"> 
			  		<div class="studentcircle"><img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px; border-radius: 10px;" src="<?php echo URLROOT;?>/image/<?php echo $data['restprofile']->rest_image?>" alt="No image..."/></div>
			  	</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 family-info">Restaurant Details</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Restaurant owner: <span class="detailstyle"><?php echo $data['restprofile']->surname .' '.$data['restprofile']->firstname;?></span></p>
			  			<p>Restaurant mail: <span class="detailstyle"><?php echo $data['restprofile']->email;?></span></p>
			  			<p>Registration date: <span class="detailstyle"><?php echo $data['restprofile']->date;?></span></p>
			  			<p>Contact num: <span class="detailstyle"><?php echo $data['restprofile']->phonenumber;?></span></p>
			  			<p>Restaurant landmark: <span class="detailstyle"><?php echo $data['restprofile']->landmark;?></span></p>
			  			<p>Restaurant address: <span class="detailstyle"><?php echo $data['restprofile']->addr;?></span></p>
			  			<p>Restaurant status: <span class="detailstyle"><?php echo $data['restprofile']->status;?></span></p>
			  		</div>
			  		<!-- <div class="col-lg-6"><a href="<?php echo URLROOT;?>/posts/viewmenu/<?php echo $data['restprofile']->id;?>"><button class="btn btn-primary">Restaurant Menu</button></a></div> -->
					<div class="pull-right"><a href="<?php echo URLROOT;?>/posts/allrestaurants"><button class="btn btn-primary">Back</button></a></div>
			  	</div>
		</div>

     <?php elseif($_SESSION['role'] == 2 ):?>
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $_SESSION['rest_name'];?></h3>
			</div>
		</div>

		<div class="row">
			  	<div class="col-lg-6"> 
			  		<div class="studentcircle"><img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px; border-radius: 10px;" src="<?php echo URLROOT;?>/image/<?php echo $data['restprofile']->rest_image?>" alt="No image..."/></div>
			  	</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 family-info">Restaurant Details</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Restaurant owner: <span class="detailstyle"><?php echo $data['restprofile']->surname .' '.$data['restprofile']->firstname;?></span></p>
			  			<p>Restaurant mail: <span class="detailstyle"><?php echo $data['restprofile']->email;?></span></p>
			  			<p>Registration date: <span class="detailstyle"><?php echo $data['restprofile']->date;?></span></p>
			  			<p>Contact num: <span class="detailstyle"><?php echo $data['restprofile']->phonenumber;?></span></p>
			  			<p>Restaurant landmark: <span class="detailstyle"><?php echo $data['restprofile']->landmark;?></span></p>
			  			<p>Restaurant address: <span class="detailstyle"><?php echo $data['restprofile']->addr;?></span></p>
			  			<p>Restaurant status: <span class="detailstyle"><?php echo $data['restprofile']->status;?></span></p>
			  		</div>
			  	</div>
		</div>
	<?php elseif($_SESSION['role'] == 3):?>

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" id="rest_name"><i class="fa fa-user"></i><?php echo $_SESSION['surname']. ' '. $_SESSION['firstname'];?></h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 family-info">personal Details</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Restaurant owner: <span class="detailstyle"><?php echo $data['restprofile']->surname .' '.$data['restprofile']->firstname;?></span></p>
			  			<p>Restaurant mail: <span class="detailstyle"><?php echo $data['restprofile']->email;?></span></p>
			  			<p>Registration date: <span class="detailstyle"><?php echo $data['restprofile']->date;?></span></p>
			  			<p>Contact num: <span class="detailstyle"><?php echo $data['restprofile']->phonenumber;?></span></p>
			  		</div>
			  	</div>
		</div>
	<?php endif;?>
	</section>
	</section>
<?php require APPROOT .'/view/include/adminfooter.php';?>
