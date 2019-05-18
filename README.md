# Chef

Chef is a small PHP web application that acts as a central place for your recipes.

## Installation

- `git clone git@github.com:runepiper/chef.git`
- `cd chef && composer install`

That's all

## Adding recipes

- Add markdown files to the `./recipes/` directory.
- You can enrich your recipes with some meta information:
```markdown
<!--
categories: bread, wild garlic
source: https://www.domain.de/some/recipe.html
-->
```
- Want an image? No problem. Just add it to the `public/uploads/` folder and link it in your markdown recipe.
- You can easily add recipes with the [chef-scraper](https://github.com/janschill/chef-scraper) extension.

## Where is my new recipe?

We utilize some static file cache, which improves load times and makes content search easier. Simply  run `rm public/cache.php`. The file will be generated at the next request.
