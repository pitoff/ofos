<?php require APPROOT .'/view/include/header.php';?>
<div class="row">
	<div id="create" class="col-md-6 mx-auto mt-3 bg-light">
	<a class="btn btn-light" href="<?php  echo URLROOT;?>/posts"><span class="fa fa-backward">Back</span></a>
	<h4>Edit post</h4><hr>
		<form action="<?php echo URLROOT;?>/posts/edit/<?php echo $data['id']; ?>" method="POST">
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'];?>" name="title">
				<span class="invalid-feedback"><?php echo $data['title_err'];?></span>
			</div>
			<div class="form-group">
				<label for="title">Body:</label>
				<textarea class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" name="body"><?php echo $data['body'];?></textarea>
				<span class="invalid-feedback"><?php echo $data['body_err'];?></span>
			</div>
			<input type="submit" class="btn btn-primary" value="Post">
		</form>
	</div>
</div>
<?php require APPROOT .'/view/include/footer.php';?>