<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chef</title>
    </head>
    <body>
        <?php echo $recipe->text ?>
        Quelle: <a href="<?php echo $recipe->source ?>" target="_blank" rel="noopener"><?php echo $recipe->source ?></a>
        <ul>
            <?php foreach($recipe->categories as $category): ?>
                <li>#<?php echo trim($category) ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
