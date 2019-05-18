<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Chef</title>
    </head>
    <body class="body">
        <?php require_once dirname(__DIR__) . '/partials/search.php' ?>
        <main class="main">
            <h1 class="headline">
                <?php echo $recipe->getTitle() ?>
            </h1>
            <article class="article">
                <?php echo $recipe->getText() ?>
            </article>
            <ul class="list">
                <?php foreach($recipe->getCategories() as $category): ?>
                    <li class="list__item">
                        <?php echo trim($category) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </main>
        <footer class="footer">
            Quelle: <a class="link" href="<?php echo $recipe->getSource() ?>" target="_blank" rel="noopener"><?php echo $recipe->getSource() ?></a>
        </footer>
    </body>
</html>
