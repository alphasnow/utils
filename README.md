SleepCat/Utils
===========
[![Latest Stable Version](https://poser.pugx.org/sleep-cat/utils/v/stable)](https://packagist.org/packages/sleep-cat/utils)
[![Total Downloads](https://poser.pugx.org/sleep-cat/utils/downloads)](https://packagist.org/packages/sleep-cat/utils)
[![License](https://poser.pugx.org/sleep-cat/utils/license)](https://packagist.org/packages/sleep-cat/utils)
[![Build Status](https://travis-ci.org/sleep-cat/utils.svg?branch=master)](https://travis-ci.org/sleep-cat/utils)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sleep-cat/utils/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sleep-cat/utils/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/sleep-cat/utils/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/sleep-cat/utils/?branch=master)
## Requirement
- PHP >= 7.0

## Install
```bash
composer require sleep-cat/utils
```

## Example
```php
use SleepCat\Utils\ListTree;
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
MIT License. See the [LICENSE](LICENSE.txt) file.