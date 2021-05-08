<?php require APPROOT .'/view/include/adminheader'. '.php';?>
	<section id="main-content">
    <section class="wrapper">
        <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" id="rest_name"><i class="fa fa-cutlery"></i><?php echo $_SESSION['rest_name'];?></h3>
        </div>
      </div>
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">category</h3>
                </div>
            </div>

      <div class="row">

        <div class="col-md-6">
			<section class="panel">
                          <header class="panel-heading">
                              Existing category
                          </header> 
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>category</th>
                                  <th>Restaurant</th>
                              </tr>
                              </thead>
                              <?php foreach($data['getcategory'] as $getcategory):?>
                              <tbody>
                              <tr>
                                  <td><?php echo $getcategory->food_category?></td>
                                  <td><?php echo $getcategory->rest_name?></td>
                              </tr>
                              </tbody>
                              <?php endforeach;?>
                          </table>
                      </section>        	
        </div>

        <div class="col-md-6">
          <section class="panel">
            <header class="panel-heading">
                Add category
            </header>
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo URLROOT;?>/posts/category/<?php echo $data['getuser']->id;?>" method="POST">
              	<div class="form-group">
                  <label class="col-sm-2 control-label">Restaurant</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="rest_name" readonly="" value="<?php echo $data['getuser']->rest_name;?>">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="food_category" value="<?php echo $data['food_category'];?>" required placeholder="Add food category">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </section>
        </div>

      </div>

    </section>
  </section>
<?php require APPROOT .'/view/include/adminfooter'. '.php';?>