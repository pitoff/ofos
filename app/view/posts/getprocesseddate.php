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
				<ul class="nav nav-tabs">
					<li><a href="<?php echo URLROOT;?>/posts/restorder/<?php echo $_SESSION['user_id'];?>">All order</a></li>
					<li><a href="<?php echo URLROOT;?>/posts/processed">processed</a></li>
          <li class="active"><a href="">Search processed</a></li>
				</ul>
			</div>
		</div>
                 <div class="row">
                 	<div class="col-lg-12" style="margin-top: 5px;">
                 		 <section class="panel">
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
                              <?php foreach($data['get'] as $get):?>
                          		<?php if(($get->rest_id) == ($_SESSION['user_id'])):?>
                              <tbody>
                                <tr>
                                  <td><?php echo $get->food;?></td>
                                  <td><?php echo $get->quantity;?></td>
                                  <td><?php echo $get->price;?></td>
                                  <td><?php echo $get->pdate;?></td>
  							
                                </tr>
                              </tbody>
                              <?php  $total = $total += ($get->quantity * $get->price); ?>
                            <?php endif;?>
                           	<?php endforeach;?>
                            </table>
                        	  <div>
                              	<strong>Total amount generated from sales between <?php echo $data['from'];?> and <?php echo $data['to'];?>: <span>&#8358;</span><?php echo number_format($total, 2);?></strong>
                              </div>
                          </div>

                      </section>
                 	</div>
                 </div>
 

	</section>
	</section>
	<script type="text/javascript">
			document.getElementById('btnfromto').onclick = function(e){
        e.preventDefault();
				document.getElementById('fromto').style.display = 'block';
			}
		  
	</script>
<?php require APPROOT .'/view/include/adminfooter.php';?>