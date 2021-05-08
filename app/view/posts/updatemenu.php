<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->
    	<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $_SESSION['rest_name'];?></h3>
				</div>
			</div>


		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
					<li><a href="<?php echo URLROOT;?>/posts/addmenu/<?php echo $_SESSION['user_id'];?>">Add menu</a></li>
					<li><a href="<?php echo URLROOT;?>/posts/viewmenu/<?php echo $_SESSION['user_id'];?>">view menu</a></li>
					<li class="active"><a href="">Update menu</a></li>
				</ul>
			</div>
			<div class="panel-body">
	            <form class="form-horizontal" action="<?php echo URLROOT;?>/posts/updatemenu/<?php echo $data['id'];?>" method="POST" enctype="multipart/form-data">
	            	<div class="form-group">
	                    <label class="col-sm-3 control-label">restaurant</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" value="<?php echo $_SESSION['rest_name'];?>" readonly name="rest_name">
	                    </div>
	                </div>
	            	<div class="form-group">
	                   <label class="control-label col-lg-3" for="inputSuccess">Category</label>
	                   <div class="col-lg-6">                 
	                       <select name="category" class="form-control" id="category">
	                           <?php foreach ($data['getcategory'] as $getcategory): ?>
	                           		<option><?php echo $getcategory->food_category;?></option>
	                            <?php endforeach;?>
	                        </select>   
	                   </div>
	               	</div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">food</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" required value="<?php echo $data['food'];?>" name="food">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">price</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" required value="<?php echo $data['price'];?>" name="price">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-lg-3" for="exampleInputFile">food image</label>
	                    <input type="file" id="exampleInputFile3" required name="food_image">
	                </div>
	                <div class="form-group">
	                <label class="control-label col-lg-3"><button type="submit" class="btn btn-primary" name="submit">Update</button></label>
	                </div>
	            </form>
	        </div>
	    </div>
	</section>
</section>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>