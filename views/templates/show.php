<!DOCTYPE html>
<html class="html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time() ?>">
        <title><?php echo $recipe->getTitle() ?> — Chef — allerlei Rezepte</title>
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
            <ul class="list list--small">
                <?php foreach($recipe->getCategories() as $category): ?>
                    <li class="list__item">
                        <a class="list__link" href="/?action=search&query=<?php echo trim($category) ?>">
                            <?php echo trim($category) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </main>
        <footer class="footer">
            Quelle: <a class="link" href="<?php echo $recipe->getSource() ?>" target="_blank" rel="noopener"><?php echo $recipe->getSource() ?></a>
        </footer>
        <?php require dirname(__DIR__) . '/partials/navigation.php' ?>
    </body>
</html>
