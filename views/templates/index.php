<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time() ?>">
        <title>Chef — allerlei Rezepte</title>
    </head>
    <body class="body">
        <?php require dirname(__DIR__) . '/partials/search.php' ?>
        <main class="main">
            <h1 class="headline">Rezepte</h1>
            <ul class="list">
                <?php foreach($recipes as $recipe): ?>
                    <li class="list__item">
                        <a class="link" href="<?php echo $recipe->getSlug() ?>">
                            <?php echo $recipe->getTitle() ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </main>
        <footer class="footer">
            <?php echo count($recipes); ?> Rezepte <?php echo (isset($query) ? 'für Suchbegriff »' . $query . '«' : 'im Bestand') ?>
        </footer class="footer">
        <?php require dirname(__DIR__) . '/partials/navigation.php' ?>
    </body>
</html>
