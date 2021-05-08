<?php require APPROOT .'/view/include/adminheader.php';?>
	<section id="main-content">
    <section class="wrapper">            
     <!--overview start-->

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $_SESSION['rest_name'];?></h3>
			</div>
		</div>

<?php if($_SESSION['role'] == 2):?>
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
					<li><a href="<?php echo URLROOT;?>/posts/restorder/<?php echo $_SESSION['user_id'];?>">All order</a></li>
					<li class="active"><a href="">Processed</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
		<div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               Order processed today
                          </header>
                          <div class="table-responsive">                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>food item</th>
                                  <th>Quantity</th>
                                  <th>price</th>  
                                  <th>Processed date</th>
                                  
                                </tr>
                              </thead>
                              <?php $total = 0;?>
                              <?php $currentdate = date('Y-m-d');?>
                              <?php foreach($data['getprocessed'] as $getprocessed):?>
                          		<?php if(($getprocessed->rest_id) == ($_SESSION['user_id']) && ($getprocessed->pdate) == ($currentdate)):?>
                              <tbody>
                                <tr>
                              
                                  <td><?php echo $getprocessed->food;?></td>
                                  <td><?php echo $getprocessed->quantity;?></td>
                                  <td><?php echo $getprocessed->price;?></td>
                                  <td><?php echo $getprocessed->pdate;?></td>
  							
                                </tr>
                              </tbody>
                              <?php  $total = $total += ($getprocessed->quantity * $getprocessed->price); ?>
                            <?php endif;?>
                           	<?php endforeach;?>
                            </table>
                        	  <div>
                              	<strong>Total sales made for today: <span>&#8358;</span><?php echo number_format($total, 2);?></strong>
                              </div>
                          </div>

                      </section>
                  </div>
              </div>

                 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               Search all processed order
                          </header>
                          <form method="GET" action="<?php echo URLROOT;?>/posts/getprocesseddate">
              
	                         <div class="col-lg-6">
		                          <label for="from"> From: </label> 
		                          <input type="date" class="form-control" name="from">
	                          </div>
	                          <div class="col-lg-6">
	                          <label for="to"> To: </label>
	                          	<input type="date" class="form-control" name="to">
	                          </div>
	                          <div class="col-lg-6">
	                          	<button type="submit" class="btn btn-primary" name="submit" style="margin-top: 5px;">Search</button>
	                          </div>
	                		</form>
                      </section>
                  </div>
                 </div>

<?php elseif($_SESSION['role'] == 1):?>
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="">Processed</a></li>
        </ul>
      </div>
    </div>

    <div class="row">
    <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               All restaurant processed orders
                          </header>
                          <div class="table-responsive">                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>food item</th>
                                  <th>Quantity</th>
                                  <th>price</th> 
                                  <th>Restaurant</th> 
                                  <th>Processed date</th>
                                  
                                </tr>
                              </thead>
                              <?php foreach($data['allprocessed'] as $allprocessed):?>
                              <tbody>
                                <tr>
                              
                                  <td><?php echo $allprocessed->food;?></td>
                                  <td><?php echo $allprocessed->quantity;?></td>
                                  <td><?php echo $allprocessed->price;?></td>
                                  <td><?php echo $allprocessed->rest_name;?></td>
                                  <td><?php echo $allprocessed->pdate;?></td>
                
                                </tr>
                              </tbody>
                            <?php endforeach;?>
                            </table>
                          </div>

                      </section>
                      <div class=""><a href="<?php echo URLROOT;?>/posts/allrestaurants"><button class="btn btn-primary">Back</button></a></div>
                  </div>
              </div>
<?php endif;?>

	</section>
	</section>
<?php require APPROOT .'/view/include/adminfooter.php';?>