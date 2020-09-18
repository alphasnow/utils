<?php

/*
 * This file is part of the alphasnow/utils.
 * (c) alphasnow <wind91@foxmail.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests;

use PHPUnit\Framework\TestCase;

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
