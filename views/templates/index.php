<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time() ?>">
        <title>Chef</title>
    </head>
    <body class="body">
        <?php require_once dirname(__DIR__) . '/partials/search.php' ?>
        <main class="main">
            <h1 class="headline">Chef</h1>
            <ul class="list">
                <?php foreach($recipes as $recipe): ?>
                    <li class="list__item">
                        <a class="list__link" href="<?php echo $recipe->getSlug() ?>">
                            <?php echo $recipe->getTitle() ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </main>
        <footer class="footer">
            <?php echo count($recipes); ?> Rezepte im Bestand
        </footer class="footer">
    </body>
</html>
