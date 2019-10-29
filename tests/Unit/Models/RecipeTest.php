<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use Tests\BaseTest;
use Chef\Models\Recipe;

class RecipeTest extends BaseTest
{
    /** @test */
    public function testCorrectSlugGeneration()
    {
        $recipe = new Recipe;
        $recipe->setFileName('gelbes_curry.md');

        $this->assertSame(
            '/95639e4d9973f367b5b7aacb735db656',
            $recipe->getSlug()
        );
    }
}