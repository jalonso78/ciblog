<div class="col-md-6">
	<h2><?php echo $post['title']; ?></h2>
	<h4 style="background-color: #CCBB93;" class="post-date">Posteado en la fecha: <?php echo $post['created_at']; ?></h4><br>
	<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>"><br><br>
	<div class="post-body">
		<?php echo $post['body']; ?>
	</div>

	<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
		<hr>
		<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Editar</a>
		<?php echo form_open('/posts/delete/'.$post['id']); ?>
			<input type="submit" value="Borrar" class="btn btn-danger">
		</form>
	<?php endif; ?>
	<hr>
	<h3>Comentarios</h3>
	<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="well">
				<h5><?php echo $comment['body']; ?> [escrito por: <strong><?php echo $comment['name']; ?></strong>]</h5>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No hay comentarios que mostrar</p>
	<?php endif; ?>
	<hr>
	<h3>Añadir Commentario</h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open('comments/create/'.$post['id']); ?>
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Mensaje</label>
			<textarea name="body" class="form-control"></textarea>
		</div>
		<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
		<button class="btn btn-primary" type="submit">Enviar</button>
	</form>
</div>