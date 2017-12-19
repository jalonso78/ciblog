<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
	<div class="panel panel-default" >	
		<div class="col-md-3">
			<br><br>
			<img style=" width:100px; height:100px; ";class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<h4 class="">Posteado en la fecha: <?php echo $post['created_at']; ?> Categoria: <strong><?php echo $post['name']; ?></strong></h4><br>
		<?php echo word_limiter($post['body'], 60); ?>
		<br><br>
		<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Ver mas</a></p>
		</div>
	</div>
	</div>
<?php endforeach; ?>
<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>