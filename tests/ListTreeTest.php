<?php

/*
 * This file is part of the alphasnow/utils.
 * (c) alphasnow <wind91@foxmail.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests;

use PHPUnit\Framework\TestCase;
use AlphaSnow\Utils\ListTree;

class ListTreeTest extends TestCase
{
    protected $tree;

    protected $list;

    protected function setUp(): void
    {
        $this->list = [
            ['id' => 1, 'pid' => 0, 'name' => 'node1'],
            ['id' => 2, 'pid' => 1, 'name' => 'node2'],
            ['id' => 3, 'pid' => 2, 'name' => 'node3'],
        ];
        $this->tree = [
            ['id' => 1, 'pid' => 0, 'name' => 'node1', '_child' => [
                ['id' => 2, 'pid' => 1, 'name' => 'node2', '_child' => [
                    ['id' => 3, 'pid' => 2, 'name' => 'node3'],
                ]],
            ]],
        ];
    }

    public function testListToTree()
    {
        $this->assertSame($this->tree, ListTree::listToTree($this->list));
    }

    public function testTreeToList()
    {
        $this->assertSame($this->list, ListTree::TreeToList($this->tree));
    }

    public function testListBySort()
    {
        $this->assertSame(
            [
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
            ],
            ListTree::listSortBy($this->list, 'id', 'desc')
        );

        $this->assertSame(
            [
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
            ],
            ListTree::listSortBy($this->list, 'id', 'asc')
        );

        $this->assertSame(
            [
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
            ],
            ListTree::listSortBy($this->list, 'name', 'nat')
        );
    }
}
