<?php

namespace SleepCat\Utils;


class ListTree
{
    /**
     * @param $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     */
    public static function listToTree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
    {
        $tree = array();
        if (is_array($list)) {
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * @param $tree
     * @param string $child
     * @param string $order
     * @param array $list
     * @return array
     */
    public static function TreeToList($tree, $child = '_child', $order = 'id', &$list = array())
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
     * @param $list
     * @param $field
     * @param string $sortBy
     * @return array
     */
    public static function listSortBy($list, $field, $sortBy = 'asc')
    {
        $refer = $resultSet = array();
        foreach ($list as $i => $data)
            $refer[$i] = &$data[$field];
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
        foreach ($refer as $key => $val)
            $resultSet[] = &$list[$key];
        return $resultSet;
    }
}