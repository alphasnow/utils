<?php

use SleepCat\Utils\ListTree;

class ListTreeTest extends PHPUnit_Framework_TestCase
{
    protected $tree;
    protected $list;

    protected function setUp()
    {
        $this->list = [
            ['id' => 1, 'pid' => 0, 'name' => 'node1'],
            ['id' => 2, 'pid' => 1, 'name' => 'node2'],
            ['id' => 3, 'pid' => 2, 'name' => 'node3'],
        ];
        $this->tree = [
            ['id' => 1, 'pid' => 0, 'name' => 'node1', '_child' => [
                ['id' => 2, 'pid' => 1, 'name' => 'node2', '_child' => [
                    ['id' => 3, 'pid' => 2, 'name' => 'node3']
                ]]
            ]],
        ];
    }

    public function testListToTree()
    {
        $this->assertEquals($this->tree, ListTree::listToTree($this->list));
    }

    public function testTreeToList()
    {
        $this->assertEquals($this->list, ListTree::TreeToList($this->tree));
    }

    public function testListBySort()
    {
        $this->assertEquals(
            [
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
            ],
            ListTree::listSortBy($this->list, 'id', 'desc')
        );

        $this->assertEquals(
            [
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
            ],
            ListTree::listSortBy($this->list, 'id', 'asc')
        );

        $this->assertEquals(
            [
                ['id' => 1, 'pid' => 0, 'name' => 'node1'],
                ['id' => 2, 'pid' => 1, 'name' => 'node2'],
                ['id' => 3, 'pid' => 2, 'name' => 'node3'],
            ],
            ListTree::listSortBy($this->list, 'name', 'nat')
        );
    }
}