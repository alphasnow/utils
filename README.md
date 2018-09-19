SleepCat/Utils
===========
![Build Status](https://travis-ci.org/sleep-cat/utils.svg?branch=master)
![Latest Stable Version](https://poser.pugx.org/sleep-cat/utils/v/stable)
![Total Downloads](https://poser.pugx.org/sleep-cat/utils/downloads)
![License](https://poser.pugx.org/sleep-cat/utils/license)

## Requirement
```
PHP >= 5.5.9
```

## Install
```
$ composer require sleep-cat/utils
```

## Example
```
use SleepCat\ListTree;
$list = [
    ['id' => 1, 'pid' => 0, 'name' => 'node1'],
    ['id' => 2, 'pid' => 1, 'name' => 'node2'],
    ['id' => 3, 'pid' => 2, 'name' => 'node3'],
];
$tree = ListTree::listToTree($list);
/*
[
    ['id' => 1, 'pid' => 0, 'name' => 'node1', '_child' => [
        ['id' => 2, 'pid' => 1, 'name' => 'node2', '_child' => [
            ['id' => 3, 'pid' => 2, 'name' => 'node3']
        ]]
    ]],
];
*/

$name = snake_name('ArticleCategory')
// article_category
```

## License
MIT License. See the [LICENSE](LICENSE.txt) file. You can use Hashids in open source projects and commercial products. Don't break the Internet. Kthxbye.