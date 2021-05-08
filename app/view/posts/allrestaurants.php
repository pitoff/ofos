<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> All restaurants</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
              <div class="updated"><?php flash('updated');?></div>
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Responsive tables
                          </header>
                          <div class="table-responsive">
                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Surname</th>
                                  <th>Firstname</th>
                                  <th>Email</th>
                                  <th>Restaurant</th>
                                  <th>contact</th>
                                  <th>status</th>
                                  <th>activate</th>
                                  <th>deactivate</th>
                                  <th>View</th>
                                  <th>Update</th>
                                  <th>Remove</th>
                                </tr>
                              </thead>
                              <?php foreach($data['allrestaurants'] as $getrestaurants):?>
                              <tbody>
                                <tr>
                                  <td><?php echo $getrestaurants->surname;?></td>
                                  <td><?php echo $getrestaurants->firstname;?></td>
                                  <td><?php echo $getrestaurants->email;?></td>
                                  <td><?php echo $getrestaurants->rest_name;?></td>
                                 
                                  <td><?php echo $getrestaurants->phonenumber;?></td>
                                  <td><?php echo $getrestaurants->status;?></td>
                                  <td>
                                  	<form action="<?php echo URLROOT;?>/users/updatereststatus/<?php echo $getrestaurants->id;?>" method="POST">
                                  	<?php  if(($getrestaurants->status) == 'active'):?>
                                      <button class="btn btn-primary" disabled="disabled"><i class="icon_plus"></i></button>
                                      <?php else:?>
  										                <button class="btn btn-primary" value="active" name="status"><i class="icon_plus"></i></button>
  									                   <?php endif;?>
                                    </form>
                                  </td>
                                  <td>
                                    <form action="<?php echo URLROOT;?>/users/deactivaterest/<?php echo $getrestaurants->id;?>" method="POST">
                                    <?php  if(($getrestaurants->status) == ''):?>
                                      <button class="btn btn-primary" disabled="disabled"><i class="fa fa-minus"></i></button>
                                      <?php else:?>
                                      <button class="btn btn-primary" value="" name="deactivate"><i class="fa fa-minus"></i></button>
                                       <?php endif;?>
                                    </form>
                                  </td>
                                  <td>
                                    <a class="btn btn-primary" href="<?php echo URLROOT;?>/users/profile/<?php echo $getrestaurants->id;?>"><i class="fa fa-eye"></i></a>
                                  </td>
                                  <td>
                                    <a class="btn btn-primary" href="<?php echo URLROOT;?>/users/updaterest/<?php echo $getrestaurants->id;?>"><i class="fa fa-arrow-up"></i></a>
                                  </td>
                                  <td>
                                    <form action="<?php echo URLROOT;?>/users/deleterestaurant/<?php echo $getrestaurants->id;?>" method="POST">
                                      <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              </tbody>
                              <?php endforeach;?>
                            </table>
                           
                          </div>

                      </section>
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