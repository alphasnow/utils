<?php

/*
 * This file is part of the alphasnow/utils.
 * (c) alphasnow <wind91@foxmail.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace AlphaSnow\Utils\Test;

use PHPUnit\Framework\TestCase;

/**
 * Class HelpersTest
 * @package AlphaSnow\Utils\Test
 */
class HelpersTest extends TestCase
{
    public function testSnakeName()
    {
        $this->assertSame('article_category', snake_name('ArticleCategory'));
    }

    public function testStudlyName()
    {
        $this->assertSame('ArticleCategory', studly_name('article_category'));
    }
}
