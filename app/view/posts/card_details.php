<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->

		<div class="row">
			<div class="col-lg-12" style="margin-bottom: 5px;">
			<h3 class="page-header"><i class="fa fa-credit-card"></i> Billing Details</h3>
				<ul class="nav nav-tabs">
					<li class="active"><a href="">Billing</a></li>
				</ul>
			</div>

			<form class="form-horizontal" action="<?php echo URLROOT;?>/posts/card_details" method="POST">
            	  <div class="form-group">
                    <label class="col-sm-3 control-label">Card Name:</label>
                    <div class="col-sm-6">
                      <input type="text" required class="form-control" required value="" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cvv:</label>
                    <div class="col-sm-6">
                      <input type="text" required class="form-control" required value="" name="cvv">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Card Number:</label>
                    <div class="col-sm-6">
                      <input type="text" required class="form-control" required value="" name="card_number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Expiry:</label>
                    <div class="col-sm-6">
                      <input type="text" required class="form-control" required value="" name="card_expiry">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Pin:</label>
                    <div class="col-sm-6">
                      <input type="text" required class="form-control" required value="" name="pin">
                    </div>
                </div>

                <div class="form-group">
                <label class="control-label col-lg-3"><button type="submit" class="btn btn-primary" name="submit">Process</button></label>
                </div>
            </form>

		</div>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>