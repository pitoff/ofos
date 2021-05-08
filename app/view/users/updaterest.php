<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->

		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="">Update Restaurant</a></li>
				</ul>
			</div>
			<div class="panel-body">
	            <form class="form-horizontal" action="<?php echo URLROOT;?>/users/updaterest/<?php echo $data['id'];?>" method="POST" enctype="multipart/form-data">
	            	<div class="form-group">
	                    <label class="col-sm-3 control-label">Surname</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" value="<?php echo $data['surname'];?>" name="surname">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Firstname</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" value="<?php echo $data['firstname'];?>" name="firstname">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Email</label>
	                    <div class="col-sm-6">
	                      <input type="email" class="form-control" value="<?php echo $data['email'];?>" name="email">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Phonenumber</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" required value="<?php echo $data['phonenumber'];?>" name="phonenumber">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Landmark</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" required value="<?php echo $data['landmark'];?>" name="landmark">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Address</label>
	                    <div class="col-sm-6">
	                      <input type="text" class="form-control" required value="<?php echo $data['addr'];?>" name="addr">
	                    </div>
	                </div>
	                 <div class="form-group">
	                    <label class="col-sm-3 control-label">Description</label>
	                    <div class="col-sm-6">
	                      <textarea class="form-control" required value="<?php echo $data['desc'];?>" name="desc"></textarea>
	                    </div> 
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-lg-3" for="exampleInputFile">Restaurant image</label>
	                    <input type="file" id="exampleInputFile3" value="<?php echo $data['rest_img'];?>" required name="rest_img">
	                </div>
	                <div class="form-group">
	                <label class="control-label col-lg-3"><button type="submit" class="btn btn-primary" name="submit">Update</button></label>
	                </div>
	            </form>
	        </div>
	        <div class="col-lg-6"><a href="<?php echo URLROOT;?>/posts/allrestaurants"><button class="btn btn-primary">Back</button></a></div>
	    </div>
	</section>
</section>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>