<?php require APPROOT .'/view/include/adminheader.php';?>
<div class="container">

	<div class="row" style="margin-top: 60px;">
	<div class="col-md-3"></div>
		<div class="col-md-6" id="printorder">
			 
			 <table class="table table-condensed table-striped table-responsive table-bordered" style="text-align: center">
			 <div class="well well-sm" style="text-align: center"><h2>SUCCESSFUL ORDER</h2></div>
			 <tr>
			 <th style="text-align: center">FOOD ITEM</th>
			 <th>QUANTITY </th>
			 <th> AMOUNT</th>
			 <th> RESTAURANT </th>
			 </tr>
			 <?php $total = 0;?>
			<?php foreach($data['getorder'] as $getorder) :?>
			<?php if(($getorder->user_id) == $data['id']):?>
			<tr>
				<td><?php echo $getorder->food;?></td>
				<td><?php echo $getorder->quantity;?></td>
				<td><?php echo '<span>&#8358;</span>' .$getorder->price;?></td>
				<td><?php echo $getorder->rest_name;?></td>
				
			</tr>
			<p>
				<?php $t1 = $getorder->quantity * $getorder->price;
			
            		$t2 = $total += $t1;  
            ?>
			</p>
		<?php endif;?>
			<?php endforeach;?>
			</table>
        <div class="well well-lg" style="font-weight: bold;">
          <p>Dear valued customer</p>
          <?php foreach($data['getdelivery'] as $getdelivery) :?>
          	<?php if((($getdelivery->user_id) == $data['id']) && (($getdelivery->payment_type) == 'cash on delivery')):?>
      			<p><span style="color: #346fe3;"><?php echo ucwords($getdelivery->surname) .' '. $getdelivery->firstname;?></span>, the total amount of all your food order is <span style="color: #346fe3;"><?php echo '<span>&#8358;</span>'.number_format($t2, 2);?></span> and will be delivered by <span style="color: #346fe3;"><?php echo $getdelivery->delivery_time;?></span> to your location @ <span style="color: #346fe3;"><?php echo $getdelivery->delivery_addr;?></span></p>
      		<p>Your payment will be done by <span style="color: #346fe3;"><?php echo $getdelivery->payment_type;?></span></p>
      		<h4 style="text-align: center; font-weight: bold; font-family: comic Sans MS;">Thanks for your patronage</h4>
          <!-- <a href="index.php"><span class="btn btn-success">Done</span></a> -->
	      <?php elseif((($getdelivery->user_id) == $data['id']) && (($getdelivery->payment_type) == 'credit_card')):?>
	      	<p><span style="color: #346fe3;"><?php echo ucwords($getdelivery->surname) .' '. $getdelivery->firstname;?></span>, We confirmed your payment and your order was successful. Your order will be delivered by <span style="color: #346fe3;"><?php echo $getdelivery->delivery_time;?></span> to your location @ <span style="color: #346fe3;"><?php echo $getdelivery->delivery_addr;?></span></p>
      		<h4 style="text-align: center; font-weight: bold; font-family: comic Sans MS;">Thanks for your patronage</h4>
	      <?php endif;?>
			<?php endforeach;?>
        </div>
		
	</div>
	<div class="col-md-3">
    
  	</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<button class="btn btn-primary" onclick="printContent('printorder')">Save</button>
			<button class="btn btn-success pull-right"><a href="<?php echo URLROOT;?>/users/dashboard" style="color: #fff;">Home</a></button>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>jhdkk

<script type="text/javascript">
	// $(document).ready(function(){
	// 	window.print();
	// });

	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;

		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>
<?php require APPROOT .'/view/include/adminfooter.php';?>