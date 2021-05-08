<?php require APPROOT .'/view/include/adminheader.php';?>
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
				<ul class="nav nav-tabs" style="color: #e6e6e6 !important;">
					<li class="active"><a href="">All order <span class="badge bg-important" id="ordercount">
						<?php echo $data['ordercount'];?></span></a>
					</li>
					<li><a href="<?php echo URLROOT;?>/posts/processed/<?php echo $_SESSION['user_id'];?>">Processed</a></li>
				</ul>
			</div>
			        <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              List of ordered food item
                          </header>
                          <div class="table-responsive">                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>food item</th>
                                  <th>Quantity</th>
                                  <th>price</th>
                                  <th>Restaurant</th>
                                  <th>Name</th>
                                  <th>Phonenumber</th>
                                  <th>Order time</th>
                                  <th>Delivery@</th>
                                  <th>Landmark</th>
                                  <th>Address</th>
                                  <th>Payment</th>
                                  <th>Process</th>
                                  
                                </tr>
                              </thead>
                              <?php foreach($data['getorder'] as $getorder):?>
                          		<?php if(($getorder->rest_id) == ($_SESSION['user_id']) && ($getorder->food_orderUserId) == ($getorder->deliveryUserId)):?>
                              <tbody>
                                <tr>
                                <form action="<?php echo URLROOT;?>/posts/processfood/<?php echo $getorder->order_id;?>" method="POST"> <!--process and remove -->
                                  <td><input type="hidden" name="food" value="<?php echo $getorder->food;?>"><?php echo $getorder->food;?></td>
                                  <td> <input type="hidden" name="quantity" value="<?php echo $getorder->quantity;?>"><?php echo $getorder->quantity;?></td>
                                  <td><input type="hidden" name="price" value="<?php echo $getorder->price;?>"><?php echo $getorder->price;?></td>
                                  <input type="hidden" value="<?php echo $getorder->user_id;?>" name="user_id">
                                  <td><?php echo $getorder->rest_name;?></td>
                                  <td><?php echo $getorder->user_name;?></td>
                                  <td><?php echo $getorder->phone_number;?></td>
                                  <td><?php echo $getorder->ordertime;?></td>
                                  <td><?php echo $getorder->delivery_time;?></td>
                                  <td><?php echo $getorder->delivery_landmark;?></td>
                                  <td><?php echo $getorder->delivery_addr;?></td>
                                  <td><?php echo $getorder->payment_type;?></td>
                                  
                                  <!-- <td>
                                    <a class="btn btn-success" href="<?php echo URLROOT;?>/posts/updatemenu/<?php echo $getallmenu->id;?>"><i class="arrow_up"></i></a>
                                  </td> -->
                                  <td>
                                  	
                                  	<?php  if(($getorder->status) == 'processed'):?>
                                      <button class="btn btn-primary" disabled="disabled" type="submit">processed</button>
                                    <?php else:?>
  										                <button class="btn btn-primary" value="processed" name="status">process</button>
  									                <?php endif;?>
                                    </form>
                                  </td>

                                  <td>
                                  	<form action="<?php echo URLROOT;?>/posts/removeprocessedfood/<?php echo $getorder->order_id;?>" method="POST"> <!--process and remove -->
                                      <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                    </form>
                                  </td>
  							
                                </tr>
                              </tbody>
                            <?php endif;?>
                           	<?php endforeach;?>
                            </table>
                        
                          </div>

                      </section>
                  </div>
        </div>
	</section>
</section>
<script type="text/javascript">
	function loadDoc(){

		setInterval(function(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('ordercount').innerHTML = this.responseText;
				}
			};
			xhttp.open('GET', URLROOT +'/view/posts/restorder.php', true);
			xhttp.send();
		}, 3000);

	}
	loadDoc();
	// setInterval(function(){ alert("Hello"); }, 3000);
</script>
<?php require APPROOT .'/view/include/adminfooter.php';?>