<?php
declare(strict_types=1);

namespace Chef;

class Recipe
{
    /**
     * @var string
     */
    public $filename = '';

    /**
     * @var array
     */
    public $categories = [];

    /**
     * @var string
     */
    public $source = '';

    /**
     * @var string
     */
    public $text = '';

    public function getTitle(): string
    {
        return trim(str_replace(['.md', '-'], ['', ' '], $this->filename));
    }

    public function getSlug(): string
    {
        return '/' . md5($this->filename);
    }
}
