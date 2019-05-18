<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time() ?>">
        <title>Chef</title>
    </head>
    <body class="body">
        <form class="form" action="/">
            <input type="hidden" name="action" value="search">
            <label class="form__label form__label--hidden">Suchbegriff</label>
            <input class="form__input" type="search" name="query" placeholder="Suche…" value="<?php echo $query ?? '' ?>">
        </form>
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
