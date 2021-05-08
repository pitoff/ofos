<style type="text/css">
	
</style>
<?php require APPROOT .'/view/include/header.php';?>

<!-- Slide1 -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(../image/img_0647.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Welcome to
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							our <span style="color: #f26522;"><?php echo SITENAME;?></span>
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Look Menu
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(../image/2980765_buffet3491001280_jpegdf3c4807ba4716f283768db2df71dc93.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							All in one
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							<span style="color: #f26522;">Restaurant</span>
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Look Menu
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(../ofoshome/images/master-slides-02.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Manage your
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							Restaurant
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
							<!-- Button1 -->
							<a href="#menu" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Look Menu
							</a>
						</div>
					</div>
				</div>

			</div>

			<div class="wrap-slick1-dots"></div>
		</div>
	</section>

	<!-- Welcome -->
	<section class="section-welcome bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Order meal from
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Our restaurants
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							We offer you the best and varieties of meal from different restaurants registered under <?php echo SITENAME;?>, serving your restaurant customers to satisfaction is our goal.
						</p>

						<a href="<?php echo URLROOT;?>/pages/about" class="txt4">
							Our Story
							<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="../image/ls.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Intro -->
	<section class="section-intro" id="restaurant">
		<div class="header-intro parallax100 t-center p-t-135 p-b-158" style="background-image: url(../image/IMG_9557.jpg);">
			<span class="tit2 p-l-15 p-r-15">
				<span style="color: #f26522;">Discover</span>
			</span>

			<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
				Our re<span style="color: #f26522;">st</span>aurants
			</h3>
		</div>

		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="row">
				<?php foreach ($data['restimg'] as $rest_img):?>
					<?php if(($rest_img->status) == 'active'):?>
					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<a href="#"><img src="../image/<?php echo $rest_img->rest_image;?>" alt="IMG-INTRO"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a href="#"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
									<?php echo $rest_img->rest_name;?>
								</h4></a>

								<p class="m-b-20">
									<?php echo $rest_img->rest_desc;?>
								</p>

								<a href="<?php echo URLROOT;?>/users/login" class="txt4">
									Learn More
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				<?php endif;?>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	</section>

	<!-- Our menu -->
	<section class="section-ourmenu bg2-pattern p-t-115 p-b-120" id="menu">
		<div class="container">
			<div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Discover restaurant menu
				</span>

				<h3 class="tit5 t-center m-t-2">
					what we offer
				</h3>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-6">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="../image/BCSSJHPJWJKAZLMFG2UHVECTBY.jpg" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="#" class="btn2 flex-c-m txt5 ab-c-m size4">
									Breakfast
								</a>
							</div>
						</div>

						<div class="col-sm-6">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="../image/eba1.jpg" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="#" class="btn2 flex-c-m txt5 ab-c-m size5">
									Lunch
								</a>
							</div>
						</div>

						<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="../image/12531-istock-637790866.jpg" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="#" class="btn2 flex-c-m txt5 ab-c-m size6">
									snacks
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="../image/Fried-Rice-Chicken-and-Plantain.jpg" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="#" class="btn2 flex-c-m txt5 ab-c-m size7">
									Dinner
								</a>
							</div>
						</div>

						<div class="col-12">
							<!-- Item our menu -->
							<div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
								<img src="../image/Canned-Soft-Drinks2.jpg" alt="IMG-MENU">

								<!-- Button2 -->
								<a href="#" class="btn2 flex-c-m txt5 ab-c-m size8">
									Drinks
								</a>
							</div>
						</div>

						
					</div>
				</div>
			</div>

		</div>
	</section>


<?php require APPROOT .'/view/include/footer.php';?>