<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title><?php echo $recipe->getTitle() ?> — Chef</title>
    </head>
    <body class="body">
        <h1 class="headline">
            <?php echo $recipe->getTitle() ?>
        </h1>
        <div class="rich-text">
            <?php echo $recipe->text ?>
        </div>
        <aside>
            Quelle: <a href="<?php echo $recipe->source ?>" target="_blank" rel="noopener"><?php echo $recipe->source ?></a>
        </aside>
        <ul class="list">
            <?php foreach($recipe->categories as $category): ?>
                <li class="list__item">
                    <?php echo trim($category) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
