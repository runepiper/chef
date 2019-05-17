<?php
declare(strict_types=1);

namespace Chef\Models;

class Recipe
{
    /**
     * @var string
     */
    protected $filename = '';

    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var string
     */
    protected $source = '';

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param string $category
     */
    public function addCategory(string $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return trim(str_replace(['.md', '-'], ['', ' '], $this->filename));
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return '/' . md5($this->filename);
    }
}
