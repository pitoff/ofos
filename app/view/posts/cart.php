<?php require APPROOT .'/view/include/adminheader.php';?>
<section id="main-content">
    <section class="wrapper">            
    
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-shopping-cart"></i> your food cart </h3>
        </div>
      </div>


        <div class="row">
          <div class="col-lg-12">
            <ul class="nav nav-tabs">
              <li><a href="<?php echo URLROOT;?>/users/dashboard">Restaurants</a></li>
              <li class="active"><a href=""><span class="fa fa-shopping-cart" style="font-size: 20px;"> <span class="badge" style="font-size:12px;"><?php echo array_sum(array_column($_SESSION['food_cart'], 'food_quantity'));?></span></span></a></li>
            </ul>
          </div>
                 
      
          <div class="col-lg-12">
            <section class="panel">
                <!-- <header class="panel-heading">
                  Food Cart
                </header> -->
                <div class="table-responsive">                          
            <table class="table table-striped table-bordered table-condensed">
            <div id="cart_msg"> <?php flash('already_incart');?> </div>
            <div id="item_removed"> <?php flash('removed');?> </div>
              <thead>
                <tr>
                  <th>food</th>
                  <th>quantity</th>
                  <th>Price</th>
                  <th>Restaurant</th>
                  <th>Subtotal</th>
                  <th>remove</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if (!empty($_SESSION['food_cart'])):
                  $total = 0;
                    foreach ($_SESSION['food_cart'] as $keys => $values):
              ?>
                    <tr>
                      <td><?php echo $values['food_name'];?></td>
                      <td><?php echo $values['food_quantity'];?></td>
                      <td><span>&#8358;</span><?php echo $values['food_price'];?></td>
                      <td><?php echo $values['rest_name'];?></td>
                      <td><span>&#8358;</span><?php echo number_format($values['food_quantity'] * $values['food_price'], 2)?></td>
                      <td>
                        <form action="<?php echo URLROOT;?>/posts/removefromcart/<?php echo $values['food_id'];?>" method="POST">
                            <button type="submit" class="btn btn-danger" <?php echo isset($_POST['request']) ? 'disabled' : '';?> ><span class="icon_close_alt2"></span></button>
                        </form>
                      </td>
                    </tr>
                    <?php
                      $total = $total + ($values['food_quantity'] * $values['food_price']);
                      endforeach;
                    ?>
                    <tr>
                      <td colspan="4" align="right">Total</td>
                      <td align="right"><span>&#8358;</span><?php echo number_format($total, 2);?></td>

                      <form method="POST" action="<?php echo URLROOT;?>/posts/cart">
                      <td align="right"><span class=""><button type="submit" name="request" id="myform" class="btn btn-primary" style="background:#394a59; border: none;" id="upload-btn" <?php echo isset($_POST['request']) ? 'disabled' : '';?>>Request Order</button></span></td>
                      </form>

                      <form method="POST" action="<?php echo URLROOT;?>/posts/unset">
                      <td align="right"><span class=""><button type="submit" class="btn btn-primary" style="background:#394a59; border: none;" id="upload-btn">check out</button></span></td>
                      </form>
                    </tr>
                    <div class="pull-right"><button type="submit" class="btn btn-primary" style="margin-top: 5px; margin-bottom: 5px; background:#394a59; border: none;" id="upload-btn" <?php echo isset($_POST['request']) ? 'disabled' : '';?>><a href="<?php echo URLROOT;?>/posts/eachrestaurant/<?php echo $values['rest_id'];?>" style="color: #fff;">order more</a></button></div>
                    <?php
                        endif;
                    ?>
              </tbody>
           </table>
                    

                </div>
                
            </section>
          </div>

        </div>
    </section>
</section>
<script type="text/javascript">

  $('#cart_msg').delay(3000).fadeOut(300);
  $('#item_removed').delay(3000).fadeOut(300);

</script>
<?php require APPROOT .'/view/include/adminfooter.php';?>


