<?php

namespace Chef;

class RecipeBook
{
    public function boot()
    {
        if(filter_input(INPUT_GET, 'action') === 'recipe') {
            $recipe = new \Chef\Models\Recipe;
            $categories = [];
            $source = '';

            foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
                if(md5($file) === filter_input(INPUT_GET, 'recipe')) {
                    $content = file_get_contents('../recipes/' . $file);

                    foreach (explode(PHP_EOL, $content) as $line) {
                        if(strpos($line, 'categories') !== false) {
                            $categories = explode(',',
                                preg_replace('/^(\s*categories\:?\s?)\s?/', '', $line)
                            );
                        }

                        if(strpos($line, 'source') !== false) {
                            $source = preg_replace('/^(\s*source\:?\s?)/', '', $line);
                        }
                    }

                    $recipe->setFilename($file);
                    $recipe->setCategories($categories);
                    $recipe->setSource($source);
                    $recipe->setText(
                        (new \Parsedown())->text($content)
                    );

                    require_once '../views/templates/show.php';
                }
            }
        } else {
            $recipes = [];

            foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
                if(substr($file, 0, 1) !== '.') {
                    $recipe = new \Chef\Models\Recipe;
                    $recipe->setFilename($file);

                    $recipes[] = $recipe;
                }
            }

            require_once '../views/templates/index.php';
        }
    }
}