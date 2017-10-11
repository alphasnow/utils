<?php
/**
 * Date: 2017/10/11
 * Time: 1:35
 * User: weifeng
 * Mail: xcxxkj@aliyun.com
 */

class HelpersTest extends PHPUnit_Framework_TestCase
{
    public function testSnakeName()
    {
        $this->assertEquals('article_category',snake_name('ArticleCategory'));
    }
    public function testStudlyName()
    {
        $this->assertEquals('ArticleCategory',studly_name('article_category'));
    }
}