<style type="text/css">

	.style_category{
		font-size: 18px;
		font-family: times roman;
	}
</style>
<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $data['eachrestaurant']->rest_name;?> </h3>
				</div>
			</div>

		<div class="row" style="margin-bottom: 5px;">
			<div class="col-lg-12" style="margin-bottom: 2px;">
				<ul class="nav nav-tabs">
					<li class="active"><a href="">All Menu</a></li>
					<li><a href="<?php echo URLROOT;?>/posts/cart">Food-<span class="fa fa-shopping-cart" style="font-size: 15px;"></span></a></li>
				</ul>
			</div>
		</div>

		<!-- <div class="row">
				<div class="well well-lg col-lg-12">
					<div class="style_category">Food categories we offer: 	
				    <?php foreach($data['allcat'] as $getallcat):?>				      
				        			
				        	<button class="btn btn-primary" style="border:none; background:#fff; margin-right: 5px;"><a href="<?php echo URLROOT;?>/posts/eachrestaurantCat/<?php echo $getallcat->food_category;?>&<?php echo $data['eachrestaurant']->rest_name;?>" style="color:#394a59;"><?php echo $getallcat->food_category;?></a></button>

				    <?php endforeach;?>
				     </div>   
			    </div>
		</div> -->

		<div class="row">
			<div class="col-lg-12">
				<?php foreach($data['getallrestaurantmenu'] as $getallrestaurantmenu):?>
					<?php if(($data['eachrestaurant']->id) == ($getallrestaurantmenu->user_id)):?>
					<div class="col-md-3" style="height:500px;">
					<!-- <div id="image"> -->
			          <div class="thumbnail" style="font-family: Comic sans Ms;">
			          
			            <img id="myphoto" data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px;" src="<?php echo URLROOT;?>/image/<?php echo $getallrestaurantmenu->food_image?>" alt="..."/>
			            	<form method="POST" action="<?php echo URLROOT;?>/posts/add_cart/<?php echo $getallrestaurantmenu->id;?>">
				            <div class="caption">
					            <h4><?php echo $getallrestaurantmenu->food;?></h4>  
					            <h5 style="color:#14614f;"><span>&#8358;</span><?php echo $getallrestaurantmenu->price;?></h5>
					            <input type="number" min = "0" max="5" class="" style="width: 40px;" name="food_quantity" value="1"/>
					            <input type="hidden" name="food_id" value="<?php echo $getallrestaurantmenu->id; ?>"/>
					            <input type="hidden" name="hidden_food_name" value="<?php echo $getallrestaurantmenu->food; ?>"/>
					         	<input type="hidden" name="hidden_rest_id" value="<?php echo $getallrestaurantmenu->user_id; ?>"/>
					         	<input type="hidden" name="hidden_rest_name" value="<?php echo $getallrestaurantmenu->rest_name; ?>"/>
					            <input type="hidden" name="hidden_food_price" value="<?php echo $getallrestaurantmenu->price; ?>"/>
				            </div>
				            <div class="cart">
		                    	<button class="btn btn-primary add_cart" type ="submit" style="border:none; background:#394a59;">Add to cart</button>
	                        </div>
	                        </form>
			          </div>
			          <!-- </div> -->
     				 </div>
     				<?php endif;?>
				<?php endforeach;?>
			</div>
		</div>

	</section>
	</section>

	<script type="text/javascript">
	
	</script>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>