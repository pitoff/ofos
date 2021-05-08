<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> All Users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-list"></i><a href="index.html">Home</a></li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Users table
                          </header>
                          <div class="table-responsive">
                          
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Surname</th>
                                  <th>Firstname</th>
                                  <th>Email</th>
                                  <th>contact</th>
                                  <th>Remove</th>
                                </tr>
                              </thead>
                              <?php foreach($data['allusers'] as $alluser):?>
                              <tbody>
                                <tr>
                                  <td><?php echo $alluser->surname;?></td>
                                  <td><?php echo $alluser->firstname;?></td>
                                  <td><?php echo $alluser->email;?></td>
                                  <td><?php echo $alluser->phonenumber;?></td>
                                  <td>
                                    <form action="<?php echo URLROOT;?>/users/removeuser/<?php echo $alluser->id;?>" method="POST">
                                      <button class="btn btn-danger" type="submit"><i class="icon_close_alt2"></i></button>
                                    </form>
                                  </td>
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