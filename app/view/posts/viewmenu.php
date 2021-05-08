<?php require APPROOT .'/view/include/adminheader'. '.php';?>
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
					<li><a href="<?php echo URLROOT;?>/posts/addmenu/<?php echo $_SESSION['user_id'];?>">Add menu</a></li>
					<li class="active"><a href="">view menu</a></li>
				</ul>
			</div>
			
			                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Our menu table
                          </header>
                          <div class="table-responsive">                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>food_category</th>
                                  <th>food</th>
                                  <!-- <th>description</th> -->
                                  <th>price</th>
                                  <th>update</th>
                                  <th>remove</th>
                                  
                                </tr>
                              </thead>
                              <?php foreach($data['getallmenu'] as $getallmenu):?>
                          		<?php if(($getallmenu->user_id) == ($_SESSION['user_id'])):?>
                              <tbody>
                                <tr>
                                  <td><?php echo $getallmenu->food_category;?></td>
                                  <td><?php echo $getallmenu->food;?></td>
                                  <td><?php echo $getallmenu->price;?></td>
                                  <td>
                                    <a class="btn btn-success" href="<?php echo URLROOT;?>/posts/updatemenu/<?php echo $getallmenu->id;?>"><i class="arrow_up"></i></a>
                                  </td>
                                  <td>
                                  	<form action="<?php echo URLROOT;?>/posts/removefood/<?php echo $getallmenu->id;?>" method="POST">
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
  <?php elseif($_SESSION['role'] == 1):?>
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="">Restaurant menu</a></li>
        </ul>
      </div>
      
                        <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Our menu table
                          </header>
                          <div class="table-responsive">                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>food_category</th>
                                  <th>food</th>
                                  <th>price</th>
                                  <th>restaurant</th>
                                  
                                </tr>
                              </thead>
                              <?php foreach($data['restmenu'] as $getrestmenu):?>
                             
                              <tbody>
                                <tr>
                                  <td><?php echo $getrestmenu->food_category;?></td>
                                  <td><?php echo $getrestmenu->food;?></td>
                                  <td><?php echo $getrestmenu->price;?></td>
                                  <td><?php echo $getrestmenu->rest_name?></td>
                
                                </tr>
                              </tbody>
                           
                            <?php endforeach;?>
                            </table>
                        
                          </div>

                      </section>
                      <div><a href="<?php echo URLROOT;?>/posts/allrestaurants"><button class="btn btn-primary">Ok</button></a></div>
                  </div>
        </div>
   <?php endif;?> 
	</section>
</section>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>