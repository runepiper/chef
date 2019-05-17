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

            require_once '../views/templates/show.php';
        }
    }
} else {
    $recipes = [];

    foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
        if(substr($file, 0, 1) !== '.') {
            $recipe = new \Chef\Recipe;
            $recipe->filename = $file;

            $recipes[] = $recipe;
        }
    }

    require_once '../views/templates/index.php';
}
