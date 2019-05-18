<?php

namespace Chef;

use Chef\Models\Recipe;
use Parsedown;

class RecipeBook
{
    public function boot()
    {
        switch (filter_input(INPUT_GET, 'action')) {
            case 'recipe':
                $this->recipe();
                break;
            case 'search':
                $this->search();
                break;
            default:
                $this->index();
                break;
        }
    }

    public function index()
    {
        $recipes = [];

        foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
            if(substr($file, 0, 1) !== '.') {
                $recipe = new Recipe;
                $recipe->setTitle($file);

                $recipes[] = $recipe;
            }
        }

        require_once '../views/templates/index.php';
    }

    protected function recipe()
    {
        $recipe = new Recipe;
        $categories = [];
        $source = '';
        $title = '';

        foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
            if(md5($file) === filter_input(INPUT_GET, 'recipe')) {
                $content = file_get_contents('../recipes/' . $file);

                foreach (explode(PHP_EOL, $content) as $line) {
                    if(preg_match('/^#{1}\s?\b/', $line)) {
                        $title = preg_replace('/^#{1}\s?\b/', '', $line);
                    }

                    if(strpos($line, 'categories') !== false) {
                        $categories = explode(',',
                            preg_replace('/^(\s*categories\:?\s?)\s?/', '', $line)
                        );
                    }

                    if(strpos($line, 'source') !== false) {
                        $source = preg_replace('/^(\s*source\:?\s?)/', '', $line);
                    }
                }

                $recipe->setTitle($title);
                $recipe->setFilename($file);
                $recipe->setCategories($categories);
                $recipe->setSource($source);
                $recipe->setText(
                    (new Parsedown())->text($content)
                );

                require_once '../views/templates/show.php';
            }
        }
    }

    public function search()
    {
        $recipes = [];
        $query = filter_input(INPUT_GET, 'query');

        if(empty($query)) {
            header('Location: /');
        }

        foreach (scandir(dirname(__DIR__) . '/recipes/') as $file) {
            if(substr($file, 0, 1) !== '.' && stripos($file, $query) !== false) {
                $recipe = new Recipe;
                $recipe->setTitle($file);

                $recipes[] = $recipe;
            }
        }

        require_once '../views/templates/index.php';
    }
}