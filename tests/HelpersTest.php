<?php


class HelpersTest extends PHPUnit_Framework_TestCase
{
    public function testSnakeName()
    {
        $this->assertEquals('article_category', snake_name('ArticleCategory'));
    }

    public function testStudlyName()
    {
        $this->assertEquals('ArticleCategory', studly_name('article_category'));
    }
}