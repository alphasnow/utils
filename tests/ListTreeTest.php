<?php
/**
 * Date: 2017/10/11
 * Time: 22:17
 * User: weifeng
 * Mail: xcxxkj@aliyun.com
 */

use Xcxxkj\Util\ListTree;

class ListTreeTest extends PHPUnit_Framework_TestCase
{
    protected $tree;
    protected $list;
    protected function setUp()
    {
        $this->list = [
            ['id'=>1,'pid'=>0,'name'=>'node1'],
            ['id'=>2,'pid'=>1,'name'=>'node2'],
            ['id'=>3,'pid'=>2,'name'=>'node3'],
        ];
        $this->tree = [
            ['id'=>1,'pid'=>0,'name'=>'node1','_child'=>[
                ['id'=>2,'pid'=>1,'name'=>'node2','_child'=>[
                    ['id'=>3,'pid'=>2,'name'=>'node3']
                ]]
            ]],
        ];
        parent::setUp();
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
        $listSort = [
            ['id'=>3,'pid'=>2,'name'=>'node3'],
            ['id'=>2,'pid'=>1,'name'=>'node2'],
            ['id'=>1,'pid'=>0,'name'=>'node1'],
        ];
        $this->assertEquals($listSort, ListTree::listSortBy($this->list,'id','desc'));
    }
}