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
            <?php echo $recipe->getText() ?>
        </div>
        <aside>
            Quelle: <a href="<?php echo $recipe->getSource() ?>" target="_blank" rel="noopener"><?php echo $recipe->getSource() ?></a>
        </aside>
        <ul class="list">
            <?php foreach($recipe->getCategories() as $category): ?>
                <li class="list__item">
                    <?php echo trim($category) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
