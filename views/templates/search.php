<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Suche — Chef</title>
    </head>
    <body class="body">
        <h1 class="headline">
            Suche nach <?php echo $query ?>
        </h1>
        <?php if($recipes): ?>
            <ul class="list">
                <?php foreach($recipes as $recipe): ?>
                    <li class="list__item">
                        <a class="list__link" href="<?php echo $recipe->getSlug() ?>">
                            <?php echo $recipe->getTitle() ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Keine Rezepte gefunden</p>
        <?php endif; ?>
    </body>
</html>
