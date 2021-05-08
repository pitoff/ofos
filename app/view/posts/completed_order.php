<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-link"></i> Order Status</h3>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              My completed order
                          </header>
                          <div class="table-responsive">
                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Food</th>
                                  <th>Quantity</th>
                                  <th>From</th>
                                  <th>Price</th>
                                  <th>Status</th>
                                  <th>Processed</th>
                                </tr>
                              </thead>
                              <?php foreach($data['userOrder'] as $userOrder):?>
                              <tbody>
                                <tr>
                                  <td><?php echo $userOrder->food;?></td>
                                  <td><?php echo $userOrder->quantity;?></td>
                                  <td><?php echo $userOrder->rest_name;?></td>
                                  <td><?php echo $userOrder->price;?></td>
                                  <td><?php echo $userOrder->status;?></td>
                                  <td><?php echo $userOrder->pdate;?></td>
                                </tr>
                              </tbody>
                              <?php endforeach;?>
                            </table>
                           
                          </div>

                      </section>
                      <div><a href="<?php echo URLROOT;?>/users/dashboard"><button class="btn btn-primary">Back</button></a></div>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <script type="text/javascript">
        $('.updated').delay(2500).fadeOut(300);
      </script>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>