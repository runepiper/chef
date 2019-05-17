<?php

require_once '../vendor/autoload.php';

if(filter_input(INPUT_GET, 'action') === 'recipe') {
    $recipe = new \Chef\Recipe;

    foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
        if(md5($file) === filter_input(INPUT_GET, 'recipe')) {
            $recipe->filename = $file;
            $content = file_get_contents('../recipes/' . $file);

            foreach (explode(PHP_EOL, $content) as $line) {
                if(strpos($line, 'categories') !== false) {
                    $recipe->categories = explode(',',
                        preg_replace('/^(\s*categories\:?\s?)\s?/', '', $line)
                    );
                }

                if(strpos($line, 'source') !== false) {
                    $recipe->source = preg_replace('/^(\s*source\:?\s?)/', '', $line);
                }
            }

            $recipe->text = (new \Parsedown())->text($content);

            echo $recipe->text;
            die();
        }
    }
}

$recipes = [];

foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
    if($file !== '.' && $file !== '..') {
        $recipe = new \Chef\Recipe;
        $recipe->filename = $file;

        $recipes[] = $recipe;
    }
}

?>
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
