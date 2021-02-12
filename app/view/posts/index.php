<?php require APPROOT .'/view/include/header.php';?>
<?php flash('return_message');?>
	<div class="row">
		<div class="col-md-6 mb-3">
			<h2>Daily Posts</h2>
		</div>
		<div class="col-md-6">
			<a class ="btn btn-primary pull-right" href="<?php echo URLROOT;?>/posts/create"><i class="fa fa-pencil">Add post</i></a>
		</div>
	</div>

	<?php foreach($data['posts'] as $posts):?>
		<div class="card card-body mb-3">
			<h4><?php echo $posts->title;?></h4>
			<p><?php echo $posts->body;?></p>
		
			<div class="bg-light p-2 mb-3">
				Posted by <?php echo $posts->name .' on '. $posts->post_created_at;?>
			</div>
			<a href="<?php echo URLROOT;?>/posts/show/<?php echo $posts->postsId;?>" class="btn btn-light">More</a>
		</div>
	<?php endforeach;?>
<?php require APPROOT .'/view/include/footer.php';?>