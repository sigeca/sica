<h1>Blog</h1>
<ul>
    <?php foreach ($articles as $article): ?>
        <li>
            <a href="<?php echo site_url('blog/view/' . $article['id']); ?>">
                <?php echo $article['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="<?php echo site_url('blog/create'); ?>">Crear nuevo artículo</a>

