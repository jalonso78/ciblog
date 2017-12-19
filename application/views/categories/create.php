<h2><?= $title ;?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
	<div class="col-md-6" >
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" class="form-control" name="name" placeholder="Escriba el nombre">
		</div>
		<button type="submit" class="btn btn-default">Enviar</button>
	</div>
</form>

