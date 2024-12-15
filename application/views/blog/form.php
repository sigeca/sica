<h1>Crear artículo</h1>
<?php echo validation_errors(); ?>
<form action="<?php echo site_url('blog/create'); ?>" method="post">
    <label for="title">Título</label>
    <input type="text" name="title" id="title">
    <br>
    <label for="content">Contenido</label>
    <textarea name="content" id="content"></textarea>
    <br>
    <button type="submit">Guardar</button>
</form>
<a href="<?php echo site_url('blog'); ?>">Cancelar</a>

