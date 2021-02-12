<script>
  function showhiddenform() {
    if (document.getElementById('owner').checked) {
        document.getElementById('hiddenform').style.display='block';
    }else{
      document.getElementById('hiddenform').style.display='none';
    }
  }
</script>
<style type="text/css">
	.form-group{
		border: none;
		border-color: none;
		border-bottom: 1px solid #b4b4b4;
		
	}
	.form-control{
		background: inherit !important;
	}
</style>
<?php require APPROOT .'/view/include/header.php';?>
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../ofoshome/images/bg-title-page-03.jpg);">
		<h2 class="tit6 t-center">
			Get started as Regular User
		</h2>
	</section>
	<div class="col-md-6 mx-auto" id="background;">
		<div class="card card-body bg-light mt-5 regopacity" id="signup">
			<div class="signup" style="text-align: center;">
				<h2>Sign up</h2>
				<p><span class="fa fa-pencil"></span> register as a new user </p><hr>
			</div>
			<form action = "<?php echo URLROOT;?>/users/regularsignup" method="POST">
				<div class="form-group">
					<label for="name">SurName: <sup>*</sup></label>
					<input type="text" name="sn" class="form-control form-control-lg <?php echo (!empty($data['sn_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['sn'];?>"><span class="invalid-feedback"><?php echo $data['sn_err'];?></span>
				</div>
				<div class="form-group">
					<label for="fn">FirstName: <sup>*</sup></label>
					<input type="text" name="fn" class="form-control form-control-lg <?php echo (!empty($data['fn_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fn'];?>"><span class="invalid-feedback"><?php echo $data['fn_err'];?></span>
				</div>
				<div class="form-group">
					<label for="email">Email: <sup>*</sup></label>
					<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'];?>"><span class="invalid-feedback"><?php echo $data['email_err'];?></span>
				</div>
				<div class="form-group">
					<label for="password">Password: <sup>*</sup></label>
					<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password'];?>"><span class="invalid-feedback"><?php echo $data['password_err'];?></span>
				</div>
				<div class="form-group">
					<label for="confirm_password">Confirm_password: <sup>*</sup></label>
					<input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password'];?>"><span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
				</div>
				<div class="form-group">
					<label for="phonenumer">PhoneNumber: <sup>*</sup></label>
					<input type="text" name="phonenumber" class="form-control form-control-lg <?php echo (!empty($data['phonenumber_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phonenumber'];?>"><span class="invalid-feedback"><?php echo $data['phonenumber_err'];?></span>
				</div>
				
          		<div class="row">
					<div class="col">
						<input type = "submit" id="btnstyle" value = "Sign Up" class="btn btn-success btn-block">
					</div>
					<div class="col">
						<a href="<?php echo URLROOT;?>/users/login" class = "btn btn-light btn-block">Have an account? Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php require APPROOT .'/view/include/footer.php';?>