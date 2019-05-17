<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chef</title>
    </head>
    <body>
        <strong><?php echo count($recipes); ?> Rezepte im Bestand</strong>
        <ul>
            <?php foreach($recipes as $recipe): ?>
                <li>
                    <a href="<?php echo $recipe->getSlug() ?>"><?php echo $recipe->getTitle() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
