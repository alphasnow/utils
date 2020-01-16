<?php

/*
 * This file is part of the sleep-cat/utils.
 * (c) sleep-cat <wind91@foxmail.com>
 * This source file is subject to the MIT license that is bundled.
 */

namespace SleepCat\Utils;

/**
 * List array convert to tree array.
 *
 * Class ListTree
 */
class ListTree
{
    /**
     * list to tree.
     *
     * @param array  $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int    $root
     *
     * @return array
     */
    public static function listToTree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
    {
        $tree = [];
        if (is_array($list)) {
            $refer = [];
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] = &$list[$key];
            }
            foreach ($list as $key => $data) {
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] = &$list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = &$refer[$parentId];
                        $parent[$child][] = &$list[$key];
                    }
                }
            }
        }

        return $tree;
    }

    /**
     * tree to list.
     *
     * @param array  $tree
     * @param string $child
     * @param string $order
     * @param array  $list
     *
     * @return array
     */
    public static function TreeToList($tree, $child = '_child', $order = 'id', &$list = [])
    {
        if (is_array($tree)) {
            foreach ($tree as $key => $value) {
                $buffer = $value;
                if (isset($buffer[$child])) {
                    unset($buffer[$child]);
                    self::TreeToList($value[$child], $child, $order, $list);
                }
                $list[] = $buffer;
            }
            $list = self::listSortBy($list, $order, $sortBy = 'asc');
        }

        return $list;
    }

    /**
     * array sort.
     *
     * @param array $list
     * @param string $field
     * @param string $sortBy
     *
     * @return array
     */
    public static function listSortBy($list, $field, $sortBy = 'asc')
    {
        $refer = $resultSet = [];
        foreach ($list as $i => $data) {
            $refer[$i] = &$data[$field];
        }
        switch ($sortBy) {
            case 'asc':
                asort($refer);
                break;
            case 'desc':
                arsort($refer);
                break;
            case 'nat':
                natcasesort($refer);
                break;
        }
        foreach ($refer as $key => $val) {
            $resultSet[] = &$list[$key];
        }

        return $resultSet;
    }
}
