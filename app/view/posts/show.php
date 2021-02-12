<?php require APPROOT .'/view/include/header.php';?>
<a href="<?php echo URLROOT;?>/posts" class="btn btn-light"><span class="fa fa-backward">Back</span></a>
<h1><?php echo $data['posts']->title;?></h1>
<div class="bg-secondary text-white p-2 mb-3">
	written by <?php echo $data['users']->name . ' on '. $data['posts']->post_created_at;?>
</div>
<p><?php echo $data['posts']->body;?></p>
<?php if($data['posts']->user_id == $_SESSION['user_id']):?>
	<hr>
	<a href="<?php echo URLROOT;?>/posts/edit/<?php echo $data['posts']->id;?>" class="btn btn-light">Edit</a>
	
	<form class="pull-right" action="<?php echo URLROOT;?>/posts/delete/<?php echo $data['posts']->id;?>" method="POST">
		<input type="submit" class="btn btn-danger" value="remove">
	</form>
<?php endif; ?>
<?php require APPROOT .'/view/include/footer.php';?>