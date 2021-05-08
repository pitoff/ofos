<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->

		<div class="row">
			<div class="col-lg-12" style="margin-bottom: 5px;">
			<h3 class="page-header"><i class="fa fa-table"></i> Complete your order</h3>
			<p>Estimated time of delivery is 30 minutes</p>
				<ul class="nav nav-tabs">
					<li class="active"><a href="">Checkout</a></li>
					<li><a href=""></a></li>
				</ul>
			</div>

			<form class="form-horizontal" action="<?php echo URLROOT;?>/posts/checkout1/<?php echo $data['user_id'];?>" method="POST">
            	<div class="form-group">
                    <label class="col-sm-3 control-label">Delivery_landmark</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" required value="<?php echo $data['lm'];?>" name="lm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Delivery_address</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" required value="<?php echo $data['addr'];?>" name="addr">
                    </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-lg-3" for="inputSuccess">Delivery_time</label>
                   <div class="col-lg-6">                 
                       <select name="time" class="form-control" id="category">
                           	<option value="10:00 am">10:00 AM</option>
                           	<option value="12:00 pm">12:00 PM</option>
                           	<option value="03:00 pm">3:00 PM</option>
                           	<option value="06:00 pm">6:00 PM</option>
                           	<option value="09:00 pm">9:00 PM</option>
                        </select> 
                   </div>
               	</div>
               	<div class="form-group">
                    <label class="col-sm-3 control-label">Phone_number</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" required value="<?php echo $data['phone_number'];?>" name="phone_number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Payment_type</label>
                    <div class="col-sm-6">
                      <select name="payment_type" class="form-control" id="payment_type">
                           	<option value="cash on delivery">Cash on delivery</option>
                           	<option value="credit_card">Credit card</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-lg-3"><button type="submit" class="btn btn-primary" name="submit">Submit</button></label>
                </div>
            </form>

		</div>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>