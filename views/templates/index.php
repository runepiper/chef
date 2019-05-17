<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Chef</title>
    </head>
    <body class="body">
        <h1 class="headline"><?php echo count($recipes); ?> Rezepte im Bestand</h1>
        <form action="suche">
            <input type="search" name="query">
            <button>Suchen</button>
        </form>
        <ul class="list">
            <?php foreach($recipes as $recipe): ?>
                <li class="list__item">
                    <a class="list__link" href="<?php echo $recipe->getSlug() ?>">
                        <?php echo $recipe->getTitle() ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
