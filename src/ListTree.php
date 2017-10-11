<?php
/**
 * Date: 2017/10/11
 * Time: 22:14
 * User: weifeng
 * Mail: xcxxkj@aliyun.com
 */

namespace Xcxxkj\Util;


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
    public static function listToTree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = array();
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
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
    public static function TreeToList($tree, $child = '_child', $order='id', &$list = array()){
        if(is_array($tree)) {
            foreach ($tree as $key => $value) {
                $reffer = $value;
                if(isset($reffer[$child])){
                    unset($reffer[$child]);
                    self::TreeToList($value[$child], $child, $order, $list);
                }
                $list[] = $reffer;
            }
            $list = self::listSortBy($list, $order, $sortBy='asc');
        }
        return $list;
    }

    /**
     * @param $list
     * @param $field
     * @param string $sortBy
     * @return array
     */
    public static function listSortBy($list,$field, $sortBy='asc') {
        $refer = $resultSet = array();
        foreach ($list as $i => $data)
            $refer[$i] = &$data[$field];
        switch ($sortBy) {
            case 'asc': // 正向排序
                asort($refer);
                break;
            case 'desc':// 逆向排序
                arsort($refer);
                break;
            case 'nat': // 自然排序
                natcasesort($refer);
                break;
        }
        foreach ( $refer as $key=> $val)
            $resultSet[] = &$list[$key];
        return $resultSet;
    }
}